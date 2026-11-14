<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SubscriptionWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_sent_to_login_before_accessing_services_to_subscribe(): void
    {
        $this->get(route('subscriptions.create'))
            ->assertRedirect(route('login'));
    }

    public function test_dashboard_requires_authentication(): void
    {
        $this->get(route('dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_subscription_create_route_without_a_service_redirects_to_the_product_page(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('subscriptions.create'))
            ->assertRedirect(route('product'));
    }

    public function test_authenticated_customer_can_open_the_payment_page_for_a_service(): void
    {
        $user = User::factory()->create();
        $service = Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);

        $this->actingAs($user)
            ->get(route('subscriptions.create', ['service_id' => $service->id]))
            ->assertOk()
            ->assertSee('Metode Pembayaran')
            ->assertSee('Alamat Pemasangan')
            ->assertSee('Internet Bisnis');
    }

    public function test_registration_redirects_to_the_dashboard(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Amanda',
            'email' => 'amanda@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'is_admin' => true,
        ]);

        $response->assertRedirect(route('dashboard'));
        $user = User::where('email', 'amanda@example.com')->firstOrFail();

        $this->assertFalse($user->is_admin);
        $this->assertAuthenticatedAs($user, 'web');
        $this->assertGuest('admin');
    }

    public function test_login_redirects_to_the_dashboard(): void
    {
        $user = User::factory()->create(['password' => 'password']);

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
        $this->assertGuest('admin');
    }

    public function test_website_login_rejects_admin_accounts(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $this->post(route('login.store'), [
            'email' => $admin->email,
            'password' => 'password',
        ])->assertSessionHasErrors('email');

        $this->assertGuest('web');
        $this->assertGuest('admin');
    }

    public function test_website_authentication_does_not_replace_admin_authentication(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $customer = User::factory()->create(['password' => 'password']);

        $this->actingAs($admin, 'admin')
            ->get(route('register'))
            ->assertOk();

        $this->post(route('login.store'), [
            'email' => $customer->email,
            'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($admin, 'admin');
        $this->assertAuthenticatedAs($customer, 'web');
    }

    public function test_website_logout_does_not_log_out_admin(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $customer = User::factory()->create();

        $this->actingAs($admin, 'admin')
            ->actingAs($customer, 'web')
            ->post(route('logout'))
            ->assertRedirect(route('home'));

        $this->assertGuest('web');
        $this->assertAuthenticatedAs($admin, 'admin');
    }

    public function test_admin_logout_does_not_log_out_website_user(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $customer = User::factory()->create();

        $this->actingAs($customer, 'web')
            ->actingAs($admin, 'admin')
            ->post('/admin/logout')
            ->assertRedirect('/admin/login');

        $this->assertAuthenticatedAs($customer, 'web');
        $this->assertGuest('admin');
    }

    public function test_admin_login_page_is_available_and_admin_can_access_panel(): void
    {
        $this->get('/admin')
            ->assertRedirect('/admin/login');
        $this->get('/admin/login')->assertOk();

        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin, 'admin')
            ->get(route('home'))
            ->assertOk();

        $this->actingAs($admin, 'admin')
            ->get('/admin')
            ->assertOk();
    }

    public function test_customer_cannot_access_admin_panel(): void
    {
        $customer = User::factory()->create(['is_admin' => false]);

        $this->actingAs($customer, 'admin')
            ->get('/admin')
            ->assertForbidden();
    }

    public function test_dashboard_greets_user_and_lists_their_subscriptions(): void
    {
        $user = User::factory()->create(['name' => 'Amanda']);
        $service = Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);
        Subscription::create([
            'user_id' => $user->id,
            'service_id' => $service->id,
            'status' => 'Pending',
        ]);

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Selamat datang, Amanda!')
            ->assertSee('Internet Bisnis')
            ->assertSee('Pending')
            ->assertSee(route('product'), false)
            ->assertSee('Kontak & Lokasi');
    }

    public function test_login_and_registration_pages_offer_each_other(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee(route('register'), false);

        $this->get(route('register'))
            ->assertOk()
            ->assertSee(route('login'), false);
    }

    public function test_public_page_subscription_button_leads_to_subscription_flow(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee(route('login'), false)
            ->assertSee('Langganan Sekarang')
            ->assertDontSee('Daftar')
            ->assertDontSee('Dashboard');
    }

    public function test_authenticated_public_page_shows_account_menu_with_dashboard_link(): void
    {
        $user = User::factory()->create(['name' => 'Amanda']);

        $this->actingAs($user)
            ->get(route('home'))
            ->assertOk()
            ->assertSee('Amanda')
            ->assertSee(route('dashboard'), false)
            ->assertSee(route('product'), false)
            ->assertSee('Keluar');
    }

    public function test_product_subscription_buttons_send_guests_to_login(): void
    {
        Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);

        $this->get(route('product'))
            ->assertOk()
            ->assertSee(route('login'), false)
            ->assertSee('Langganan');
    }

    public function test_product_subscription_buttons_open_the_payment_page_for_authenticated_users(): void
    {
        $user = User::factory()->create();
        $service = Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);

        $this->actingAs($user)
            ->get(route('product'))
            ->assertOk()
            ->assertSee(route('subscriptions.create', ['service_id' => $service->id]), false);
    }

    public function test_subscription_request_saves_payment_details_and_shows_dashboard_confirmation(): void
    {
        $user = User::factory()->create();
        $service = Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);
        Storage::fake('local');

        $this->actingAs($user)
            ->post(route('subscriptions.store'), [
                'service_id' => $service->id,
                'payment_method' => 'Transfer Bank',
                'installation_address' => 'Jl. Merdeka No. 10, Kota Bogor',
                'bukti' => UploadedFile::fake()->image('bukti-pembayaran.jpg'),
            ])
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('success');

        $this->actingAs($user)
            ->get(route('dashboard'))
            ->assertOk()
            ->assertSee('Pengajuan langganan berhasil dikirim.')
            ->assertSee('Transfer Bank')
            ->assertSee('Jl. Merdeka No. 10, Kota Bogor');

        $subscription = Subscription::query()->where('user_id', $user->id)->firstOrFail();
        $this->assertNotNull($subscription->bukti);
        Storage::disk('local')->assertExists($subscription->bukti);
    }

    public function test_bank_transfer_requires_payment_proof(): void
    {
        $user = User::factory()->create();
        $service = Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);

        $this->actingAs($user)
            ->post(route('subscriptions.store'), [
                'service_id' => $service->id,
                'payment_method' => 'Transfer Bank',
                'installation_address' => 'Jl. Merdeka No. 10, Kota Bogor',
            ])
            ->assertSessionHasErrors('bukti');
    }

    public function test_cash_at_installation_does_not_require_payment_proof(): void
    {
        $user = User::factory()->create();
        $service = Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);

        $this->actingAs($user)
            ->post(route('subscriptions.store'), [
                'service_id' => $service->id,
                'payment_method' => 'Tunai saat pemasangan',
                'installation_address' => 'Jl. Merdeka No. 10, Kota Bogor',
            ])
            ->assertRedirect(route('dashboard'));

        $this->assertNull(Subscription::query()->where('user_id', $user->id)->firstOrFail()->bukti);
    }

    public function test_cash_at_installation_rejects_payment_proof(): void
    {
        $user = User::factory()->create();
        $service = Service::create([
            'nama_layanan' => 'Internet Bisnis',
            'deskripsi' => 'Koneksi bisnis yang stabil.',
            'harga' => 1250000,
        ]);

        $this->actingAs($user)
            ->post(route('subscriptions.store'), [
                'service_id' => $service->id,
                'payment_method' => 'Tunai saat pemasangan',
                'installation_address' => 'Jl. Merdeka No. 10, Kota Bogor',
                'bukti' => UploadedFile::fake()->image('bukti-pembayaran.jpg'),
            ])
            ->assertSessionHasErrors('bukti');

        $this->assertDatabaseMissing('subscriptions', [
            'user_id' => $user->id,
            'service_id' => $service->id,
        ]);
    }
}

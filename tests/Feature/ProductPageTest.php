<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    public function test_product_page_displays_service_data_and_image(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('services/dedicated-internet.jpg', 'image');

        $service = new Service([
            'nama_layanan' => 'Dedicated Internet',
            'deskripsi' => 'Internet bisnis berkecepatan tinggi.',
            'harga' => 1250000,
            'gambar' => 'services/dedicated-internet.jpg',
        ]);
        $service->id = 12;
        $service->setRelation('category', new Category([
            'nama_kategori' => 'Internet Korporat',
        ]));

        $this->view('product', ['services' => collect([$service])])
            ->assertSee('Dedicated Internet')
            ->assertSee('Internet bisnis berkecepatan tinggi.')
            ->assertSee('Internet Korporat')
            ->assertSee('Rp 1.250.000')
            ->assertSee(route('product.detail', 12), false)
            ->assertSee(asset('storage/services/dedicated-internet.jpg'), false);
    }

    public function test_product_page_shows_an_empty_state_when_no_services_exist(): void
    {
        $this->view('product', ['services' => collect()])
            ->assertSee('Belum ada produk atau layanan yang tersedia.');
    }
}

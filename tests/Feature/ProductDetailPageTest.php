<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductDetailPageTest extends TestCase
{
    public function test_detail_view_displays_the_selected_service_and_its_category(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('services/dedicated-internet.jpg', 'image');
        $product = new Service([
            'nama_layanan' => 'Dedicated Internet',
            'deskripsi' => 'Internet bisnis berkecepatan tinggi.',
            'harga' => 1250000,
            'gambar' => 'services/dedicated-internet.jpg',
        ]);
        $product->id = 12;
        $product->setRelation('category', new Category([
            'nama_kategori' => 'Internet Korporat',
        ]));

        $this->view('detail', ['product' => $product])
            ->assertSee('Dedicated Internet')
            ->assertSee('Internet Korporat')
            ->assertSee('Internet bisnis berkecepatan tinggi.')
            ->assertSee('Rp 1.250.000')
            ->assertSee(asset('storage/services/dedicated-internet.jpg'), false)
            ->assertSee(route('contact'), false)
            ->assertSee(route('login'), false)
            ->assertSee('Langganan');
    }
}

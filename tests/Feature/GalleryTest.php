<?php

namespace Tests\Feature;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryTest extends TestCase
{
    public function test_gallery_page_displays_photos_managed_in_admin(): void
    {
        Storage::fake('public');
        Storage::disk('public')->put('galleries/network-installation.jpg', 'photo');

        $gallery = new Gallery([
            'judul' => 'Instalasi Jaringan',
            'foto' => 'galleries/network-installation.jpg',
        ]);

        $this->view('gallery', ['galleries' => collect([$gallery])])
            ->assertSee('Instalasi Jaringan')
            ->assertSee(asset('storage/galleries/network-installation.jpg'), false);
    }

    public function test_gallery_page_shows_a_message_when_no_photos_exist(): void
    {
        $this->view('gallery', ['galleries' => collect()])
            ->assertSee('Belum ada foto galeri kegiatan yang diunggah.');
    }
}

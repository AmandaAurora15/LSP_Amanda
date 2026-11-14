<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_displays_text_from_the_editable_profile_record(): void
    {
        $profile = Profile::query()->firstOrFail();
        $profile->update([
            'history_title' => 'Judul profil yang diperbarui',
            'mission_one' => 'Misi yang diperbarui',
        ]);

        $this->get(route('profile'))
            ->assertOk()
            ->assertSee('Judul profil yang diperbarui')
            ->assertSee('Misi yang diperbarui');
    }
}

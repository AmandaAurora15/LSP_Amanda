<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactSubmissionTest extends TestCase
{
    public function test_contact_form_posts_to_the_admin_managed_contact_endpoint(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee(route('contact.store'), false)
            ->assertSee('name="nama"', false)
            ->assertSee('name="email"', false)
            ->assertSee('name="telepon"', false)
            ->assertSee('name="kebutuhan"', false)
            ->assertSee('name="subjek"', false)
            ->assertSee('name="pesan"', false)
            ->assertSee('name="_token"', false);
    }

    public function test_contact_submission_requires_valid_form_fields(): void
    {
        $this->from(route('contact'))
            ->post(route('contact.store'), [])
            ->assertRedirect(route('contact'))
            ->assertSessionHasErrors(['nama', 'email', 'kebutuhan', 'subjek', 'pesan']);
    }
}

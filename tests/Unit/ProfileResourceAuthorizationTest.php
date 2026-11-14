<?php

namespace Tests\Unit;

use App\Filament\Resources\Profiles\ProfileResource;
use App\Models\Profile;
use Tests\TestCase;

class ProfileResourceAuthorizationTest extends TestCase
{
    public function test_profiles_can_be_edited_but_not_created_or_deleted(): void
    {
        $profile = new Profile();

        $this->assertFalse(ProfileResource::canCreate());
        $this->assertFalse(ProfileResource::canDelete($profile));
        $this->assertFalse(ProfileResource::canDeleteAny());
        $this->assertFalse(ProfileResource::canForceDelete($profile));
        $this->assertFalse(ProfileResource::canForceDeleteAny());
        $this->assertArrayHasKey('edit', ProfileResource::getPages());
        $this->assertArrayNotHasKey('create', ProfileResource::getPages());
        $this->assertFalse(ProfileResource::getDeleteAuthorizationResponse($profile)->allowed());
        $this->assertFalse(ProfileResource::getDeleteAnyAuthorizationResponse()->allowed());
        $this->assertFalse(ProfileResource::getForceDeleteAuthorizationResponse($profile)->allowed());
        $this->assertFalse(ProfileResource::getForceDeleteAnyAuthorizationResponse()->allowed());
    }
}

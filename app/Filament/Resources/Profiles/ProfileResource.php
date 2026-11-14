<?php

namespace App\Filament\Resources\Profiles;

use App\Filament\Resources\Profiles\Pages\EditProfile;
use App\Filament\Resources\Profiles\Pages\ListProfiles;
use App\Filament\Resources\Profiles\Schemas\ProfileForm;
use App\Filament\Resources\Profiles\Tables\ProfilesTable;
use App\Models\Profile;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Model;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProfileForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProfilesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getDeleteAuthorizationResponse(Model $record): Response
    {
        return Response::deny();
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function getDeleteAnyAuthorizationResponse(): Response
    {
        return Response::deny();
    }

    public static function canForceDelete(Model $record): bool
    {
        return false;
    }

    public static function getForceDeleteAuthorizationResponse(Model $record): Response
    {
        return Response::deny();
    }

    public static function canForceDeleteAny(): bool
    {
        return false;
    }

    public static function getForceDeleteAnyAuthorizationResponse(): Response
    {
        return Response::deny();
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProfiles::route('/'),
            'edit' => EditProfile::route('/{record}/edit'),
        ];
    }
}

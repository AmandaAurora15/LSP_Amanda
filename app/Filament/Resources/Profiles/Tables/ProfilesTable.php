<?php

namespace App\Filament\Resources\Profiles\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('history_title')
                    ->label('Judul Profil')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('hero_description')
                    ->label('Deskripsi')
                    ->limit(80),
            ])
            ->recordActions([
                EditAction::make(),
            ]);
    }
}

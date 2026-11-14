<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Pengirim')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('telepon')
                    ->label('Telepon')
                    ->searchable(),

                TextColumn::make('kebutuhan')
                    ->label('Kebutuhan Layanan')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('subjek')
                    ->label('Subjek')
                    ->searchable()
                    ->limit(30),

                TextColumn::make('pesan')
                    ->label('Pesan')
                    ->limit(40),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Belum Dibaca' => 'warning',
                        'Sudah Dibaca' => 'success',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal Dikirim')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
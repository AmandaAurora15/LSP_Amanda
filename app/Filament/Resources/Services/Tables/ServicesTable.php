<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->square(),

                TextColumn::make('category.nama_kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
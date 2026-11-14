<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'nama_kategori')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('nama_layanan')
                    ->label('Nama Layanan')
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->rows(4),

                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                FileUpload::make('gambar')
                    ->label('Gambar Layanan')
                    ->image()
                    ->disk('public')
                    ->directory('services')
                    ->imageEditor()
                    ->nullable(),
            ]);
    }
}
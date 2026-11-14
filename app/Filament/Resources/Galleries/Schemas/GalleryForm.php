<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->label('Judul Galeri')
                    ->required(),

                FileUpload::make('foto')
                    ->label('Gambar')
                    ->image()
                    ->disk('public')
                    ->directory('galleries')
                    ->required(),
            ]);
    }
}
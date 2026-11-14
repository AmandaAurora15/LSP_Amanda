<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('hero_description')
                    ->label('Deskripsi Profil')
                    ->required()
                    ->rows(3)
                    ->maxLength(255),

                TextInput::make('history_title')
                    ->label('Judul Sejarah')
                    ->required()
                    ->maxLength(255),

                Textarea::make('history_paragraph_one')
                    ->label('Sejarah - Paragraf Pertama')
                    ->required()
                    ->rows(4),

                Textarea::make('history_paragraph_two')
                    ->label('Sejarah - Paragraf Kedua')
                    ->required()
                    ->rows(4),

                TextInput::make('client_count')
                    ->label('Jumlah Klien')
                    ->required()
                    ->maxLength(30),

                TextInput::make('uptime')
                    ->label('Uptime')
                    ->required()
                    ->maxLength(30),

                Textarea::make('principle')
                    ->label('Prinsip')
                    ->required()
                    ->rows(3),

                Textarea::make('vision')
                    ->label('Visi')
                    ->required()
                    ->rows(3),

                Textarea::make('mission_one')
                    ->label('Misi Pertama')
                    ->required()
                    ->rows(3),

                Textarea::make('mission_two')
                    ->label('Misi Kedua')
                    ->required()
                    ->rows(3),

                Textarea::make('mission_three')
                    ->label('Misi Ketiga')
                    ->required()
                    ->rows(3),
            ]);
    }
}

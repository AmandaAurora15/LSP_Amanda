<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->label('Nama Pengirim')
                    ->required()
                    ->maxLength(255),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('telepon')
                    ->label('Telepon / WhatsApp')
                    ->tel()
                    ->maxLength(30),

                Select::make('kebutuhan')
                    ->label('Kebutuhan Layanan')
                    ->options([
                        'Dedicated Internet Access (DIA)' => 'Dedicated Internet Access (DIA)',
                        'Broadband SOHO / Perkantoran' => 'Broadband SOHO / Perkantoran',
                        'Instalasi & Maintenance Jaringan' => 'Instalasi & Maintenance Jaringan',
                        'Lainnya / Pertanyaan Umum' => 'Lainnya / Pertanyaan Umum',
                    ]),

                TextInput::make('subjek')
                    ->label('Subjek')
                    ->required()
                    ->maxLength(255),

                Textarea::make('pesan')
                    ->label('Isi Pesan')
                    ->required()
                    ->rows(5)
                    ->columnSpanFull(),

                Select::make('status')
                    ->label('Status Pesan')
                    ->options([
                        'Belum Dibaca' => 'Belum Dibaca',
                        'Sudah Dibaca' => 'Sudah Dibaca',
                    ])
                    ->default('Belum Dibaca')
                    ->required(),
            ]);
    }
}
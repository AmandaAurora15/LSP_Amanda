<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use App\Models\Subscription;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required()
                    ->label('Nama Pelanggan'),

                Select::make('service_id')
                    ->relationship('service', 'nama_layanan')
                    ->required()
                    ->label('Layanan Internet'),

                Select::make('status')
                    ->options([
                        'Pending' => 'Pending',
                        'Disetujui' => 'Disetujui',
                        'Ditolak' => 'Ditolak',
                    ])
                    ->default('Pending')
                    ->required(),

                Select::make('payment_method')
                    ->label('Metode Pembayaran')
                    ->options(Subscription::PAYMENT_METHODS)
                    ->disabled(),

                Textarea::make('installation_address')
                    ->label('Alamat Pemasangan')
                    ->rows(3)
                    ->disabled(),

                FileUpload::make('bukti')
                    ->label('Bukti Pembayaran')
                    ->image()
                    ->disk('local')
                    ->visibility('private')
                    ->directory('subscriptions')
                    ->disabled(),
                    
            ]);
    }
}

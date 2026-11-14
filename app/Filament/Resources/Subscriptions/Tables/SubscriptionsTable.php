<?php

namespace App\Filament\Resources\Subscriptions\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class SubscriptionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('service.nama_layanan')
                    ->label('Layanan')
                    ->searchable(),

                TextColumn::make('payment_method')
                    ->label('Metode Pembayaran'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pending' => 'warning',
                        'Disetujui' => 'success',
                        'Ditolak' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal Pengajuan')
                    ->dateTime()
                    ->sortable(),

                ImageColumn::make('bukti')
                    ->label('Bukti Pembayaran')
                    ->disk('local')
                    ->visibility('private'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
            
    }
}

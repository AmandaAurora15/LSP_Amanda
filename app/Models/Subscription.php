<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public const PAYMENT_METHODS = [
        'Transfer Bank' => 'Transfer Bank',
        'Tunai saat pemasangan' => 'Tunai saat pemasangan',
    ];

    protected $fillable = [
        'user_id',
        'service_id',
        'status',
        'payment_method',
        'installation_address',
        'bukti',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
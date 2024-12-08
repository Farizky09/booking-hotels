<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'id_booking',
        'kd_pemesanan',
        'guest',
        'id_kamar',
        'jumlah',
        'tanggal_checkin',
        'tanggal_checkout',
        'id_user',
        'status',
        'metode_pembayaran'

    ];
}

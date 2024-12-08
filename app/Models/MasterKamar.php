<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKamar extends Model
{
    use HasFactory;
    protected $table = 'master_kamar';
    protected $fillable = [
        'id_kamar',
        'nama_kamar',
        'deskripsi_kamar',
        'harga_kamar',
        'fasilitas',
        'stok'

    ];
    protected $primarykey = 'id_kamar';
}

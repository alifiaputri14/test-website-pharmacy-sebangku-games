<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'nama_obat',
        'harga',
        'status',
        'image_url',
        'tanggal_kadaluarsa',
        'deskripsi',
        'stok',
        'produsen',
        'kategori',
        'komposisi',
        'kemasan',
        'lokasi_penyimpanan',
    ];
}

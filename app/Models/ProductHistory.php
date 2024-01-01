<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_histories'; 

    protected $fillable = [
        'name', 'price', 'image_url',
    ];

    protected $dates = ['deleted_at']; // Jika menggunakan soft delete, tambahkan deleted_at

    // Tambahkan atribut yang ingin diubah secara otomatis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($productHistory) {
            // Tambahkan atribut atau manipulasi data yang ingin diubah sebelum disimpan
        });
    }
}

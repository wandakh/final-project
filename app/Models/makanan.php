<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    use HasFactory;

    protected $table ='makanans';
    protected $guarded = ['id'];

    //kode kolom mana yang bisa diisi
    protected $fillable = [
        'nama_makanan', 'asal_makanan', 'bahan_makanan','gambar_makanan'
    ];
  
} 
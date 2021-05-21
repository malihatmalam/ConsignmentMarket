<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $table = 'market';
    protected $dates = ['tgl_ditambahkan'];
    protected $fillable = [
        'produk', 
        'kondisi', 
        'deskripsi',
        'harga',
        'tgl_ditambahkan',
    ];
}

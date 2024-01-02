<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_barang extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "tbl_barang";

    protected $fillable = ['nama_produk', 'harga', 'gambar'];
}


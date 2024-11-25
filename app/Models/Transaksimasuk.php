<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksimasuk extends Model
{
    use HasFactory;

    public $table = "t_masuk";

    protected $fillable = [
        'no_bon',
        'kode_barang',
        'harga',
        'kuantitas',
        'tgl_masuk',
        'created_by', 
        'created_at', 
        'updated_at'
    ];
}

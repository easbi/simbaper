<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksikeluar extends Model
{
    use HasFactory;

    public $table = "t_keluar";

    protected $fillable = [
        'kode_barang',
        'kuantitas',
        'tgl_keluar',
        'pemakai', 
        'created_at', 
        'updated_at'
    ];
}

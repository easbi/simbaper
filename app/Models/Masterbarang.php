<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterbarang extends Model
{
    use HasFactory;

    public $table = "m_barang";
    protected $fillable = [
        'kode_barang',
        'kode_sub_kelompok',
        'nama_barang',
        'satuan',        
        'created_by', 
        'created_at', 
        'updated_at'
    ];
}

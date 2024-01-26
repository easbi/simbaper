<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterbarang extends Model
{
    use HasFactory;

    public $table = "m_barang";
    protected $primaryKey = 'kode_barang';

    protected $fillable = [
        'kode_barang',
        'kode_sub_kelompok',
        'nama_barang',
        'satuan',  
        'featured_image',
        'created_by', 
        'created_at', 
        'updated_at'
    ];
}

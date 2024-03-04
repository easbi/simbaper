<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    public $table = "t_permintaan";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_barang',
        'kuantitas',
        'penyelesaian',
        'keterangan',
        'created_by', 
        'created_at', 
        'updated_at'
    ];
}

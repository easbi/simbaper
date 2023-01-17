<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opname extends Model
{
    use HasFactory;

    public $table = "t_stock";
    protected $primaryKey = 'kode_barang';

    protected $fillable = [
        'kode_barang',
        'quantity',
        'quantity_opname',
        'created_by', 
        'created_at', 
        'updated_at'
    ];
}

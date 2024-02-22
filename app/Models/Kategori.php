<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'serial'; 
    public $incrementing = false;
    protected $fillable = [
        'serial',
        'nama_kategori',
        'deskripsi',
        'parent_category',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
}

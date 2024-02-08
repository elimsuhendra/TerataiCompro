<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'nama',
        'serial_kategori',
        'deskripsi',
        'created_at',
        'image',
        'updated_at'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'serial_kategori', 'serial');
    }

    public $timestamps = false;
}

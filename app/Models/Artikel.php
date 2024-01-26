<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'judul',
        'content',
        'created_at',
        'updated_at'

    ];

    public $timestamps = false;
}

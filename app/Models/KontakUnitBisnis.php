<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakUnitBisnis extends Model
{
    use HasFactory;

    protected $table = 'kontak_unit_bisnis';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'nama',
        'no_tlpn',
        'url_facebook',
        'url_instagram',
        'url_tiktok',
        'created_at',
        'updated_at',
        'status',
        'deleted_at',
        'created_by'
    ];

    public $timestamps = false;
}

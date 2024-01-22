<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'visi',
        'misi'
    ];

    public $timestamps = false;
}

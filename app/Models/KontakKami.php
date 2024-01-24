<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakKami extends Model
{
    use HasFactory;

    protected $table = 'kontak_kami';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'nama',
        'email',
        'subject',
        'pesan',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;

}

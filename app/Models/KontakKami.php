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
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by',
        'is_read'
    ];

    public $timestamps = false;

}

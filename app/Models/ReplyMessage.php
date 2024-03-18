<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyMessage extends Model
{
    use HasFactory;
    protected $table = 'reply_message';
    protected $primaryKey = 'serial'; 
    public $incrementing = false;
    protected $fillable = [
        'serial',
        'serial_kontak_kami',
        'pesan',
        'created_by',
        'created_at',
    ];

    public $timestamps = false;

}
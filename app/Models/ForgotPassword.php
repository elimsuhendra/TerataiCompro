<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPassword extends Model
{
    use HasFactory;
    protected $table = 'forgot_password';
    protected $primaryKey = 'serial'; 
    public $incrementing = false;
    protected $fillable = [
        'serial',
        'token',
        'id_user',
        '_status',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
}

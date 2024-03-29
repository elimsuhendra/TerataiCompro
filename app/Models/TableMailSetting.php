<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableMailSetting extends Model
{
    use HasFactory;
    protected $table = 'table_mail_setting';
    protected $primaryKey = 'serial'; 
    public $incrementing = false;
    protected $fillable = [
        'serial',
        'host',
        'port',
        'username',
        'password',
        '_status',
        'email',
    ];

    public $timestamps = false;

}

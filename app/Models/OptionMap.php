<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionMap extends Model
{
    use HasFactory;

    protected $table = 'option_map';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'key',
        'value',
        'kategori',
        'description',
        'created_at',
        'updated_at'
    ];

    public $timestamps = false;
}

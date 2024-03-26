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
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];

    public function account()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'kategori', 'serial');
    }

    public function optionMaps()
    {
        return $this->belongsTo(OptionMap::class, 'kategori', 'serial');
    }


    public $timestamps = false;
}

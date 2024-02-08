<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'homes';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'name',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'image',
        'status',
        'created_by'
    ];

    public function account()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }


    public $timestamps = false;

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentangKita extends Model
{
    use HasFactory;

    protected $table = 'tentang_kita';
    protected $primaryKey = 'serial';
    public $incrementing = false;

    protected $fillable = [
        'serial',
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
        'image',
        'description',
        'status',
        'created_by'
    ];

    public function account()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }


    public $timestamps = false;

}

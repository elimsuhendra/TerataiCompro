<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'serial'; 
    public $incrementing = false;
    protected $fillable = [
        'serial',
        'nama_kategori',
        'deskripsi',
        'parent_category',
        'status',
        'created_by',
        'created_at',
        'updated_at'
    ];


    public function kategoriParent()
    {
        return $this->belongsTo(Kategori::class, 'parent_category', 'serial');
    }
    
    public static function MappingProduct()
    {
        $data = DB::table('kategori')
                ->join('produk','produk.serial_kategori','kategori.serial')
                ->whereIn('kategori.serial',['123321','123322','123323','123326']) //hardcode
                ->where('produk.status','Active')
                ->where('kategori.status','Active')
                ->whereNull('kategori.deleted_at')
                ->whereNull('produk.deleted_at')
                ->select('kategori.nama_kategori','kategori.serial')
                ->groupBy('kategori.serial')
                ->groupBy('kategori.nama_kategori')
                ->get();    

        return $data;
        
    }



    public $timestamps = false;
}

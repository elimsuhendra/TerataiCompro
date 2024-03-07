<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Kategori;
use App\Models\KontakKami;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
    
            if (!$this->user) {
                return redirect()->route('admin.login'); 
            }
    
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }

        $kategori=Kategori::MappingProduct();
        $record=null;

        foreach ($kategori ?? [] as $key => $value) {

            $produks[$key]= Produk::where('serial_kategori' ,$value->serial)->where('produk.status','Active')->whereNull('produk.deleted_at')->count(); //count parent kategori to product
            $kategori[$key]= Kategori::select('serial')->where('parent_category',$value->serial)->get()->toArray(); //get sub kategori
            $produks2[$key]= Produk::whereIn('serial_kategori' ,$kategori[$key])->where('produk.status','Active')->whereNull('produk.deleted_at')->count(); //count parent sub kategori to product

            $total[$key]=$produks2[$key] +  $produks[$key] ;
            $record[$key]=array('serial'=>$value->serial,'nama_kategori'=>$value->nama_kategori,'jumlah'=>$total[$key]);
        }

        $total_roles = count(Role::select('id')->get());
        $total_roles = count(Role::select('id')->get());
        $notifiacation = count(KontakKami::where('is_read',0)->get());
        $total_admins = count(Admin::select('id')->get());
        $total_produk = count(Produk::select('serial')->where('status','Active')->get());

        return view('backend.pages.dashboard.index', compact('total_admins', 'total_roles', 'total_produk','notifiacation','record'));
    }
}

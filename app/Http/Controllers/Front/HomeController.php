<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->serial_category_hidroponik = '123321';
        $this->serial_category_cafe = '123324';
        $this->serial_category_edufarm = '123326';
    }

    public function redirectAdmin()
    {
        // return redirect()->route('admin.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title="Dashboard";

        $this->set_arr_where('name','Slide');
        $data['slide'] = $this->get_index('homes','');


        $data['top_product_hidroponik'] = DB::table('produk')
                                ->join('kategori','kategori.serial','produk.serial_kategori')
                                ->where([['produk.status','Active'],['kategori.parent_serial',$this->serial_category_hidroponik]])
                                ->select('produk.*','kategori.nama_kategori')
                                ->limit(3)
                                ->get();    

        $data['top_product_cafe'] = DB::table('produk')
                                ->join('kategori','kategori.serial','produk.serial_kategori')
                                ->where([['produk.status','Active'],['kategori.parent_serial',$this->serial_category_cafe]])
                                ->select('produk.*','kategori.nama_kategori')
                                ->limit(3)
                                ->get();

        $data['top_product_edufarm'] = DB::table('produk')
                                ->join('kategori','kategori.serial','produk.serial_kategori')
                                ->where([['produk.status','Active'],['kategori.parent_serial',$this->serial_category_edufarm]])
                                ->select('produk.*','kategori.nama_kategori')
                                ->limit(3)
                                ->get(); 

        // dd($data['top_product_edufarm']);

        $data['page'] = 'home';

        $data['image_url'] = $this->image_url;

        return view('front/home', compact('data','title'));
    }

    public function home()
    {
        // $data['page'] = 'home';
        return view('home');
    }
}

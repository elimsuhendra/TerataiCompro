<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->hidroponik_serial = '123321';
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
    public function hidroponik(Request $request)
    {
        $data['page'] = 'hidroponik';
        // get category hidroponik
        $data['category'] = DB::table('kategori')->where('parent_serial',$this->hidroponik_serial)->get();

        // get product by serial
        
        $serial = $request->input('serial');
        $data['data'] = DB::table('produk')->where([['serial_kategori',$serial]]);
        dd($data['data']);
        return view('front/hidroponik', compact('data'));

    }

    public function cafe()
    {
        return view('front/cafe');
    }

    public function edufarm()
    {
        return view('front/edufarm');
    }
}

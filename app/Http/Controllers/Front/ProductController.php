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
        $this->cafe_serial = '123324';
        $this->edufarm_serial = '123326';
        $this->phone_serial = '2cb3552122a70f095c4113defa640710';
        $this->data['image_url'] = $this->image_url;

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
        // get category
        $data['category'] = DB::table('kategori')->where('parent_serial',$this->hidroponik_serial)->get();

        // get product by serial
        $product = DB::table('produk')->where('status','Active');
        
        // query where serial_kategori
        $serial_kategori = $request->input('serial_kategori');
        if($serial_kategori){
            $product =  $product->where('serial_kategori',$serial_kategori);
        }else{
            $categories = $data['category']->pluck('serial')->toArray();
            $product =  $product->whereIn('serial_kategori',$categories);

        }

        $product = $product->get();
        $data['data'] = $product;
        $data['image_url'] = $this->image_url;
        // dd($data);
        return view('front/hidroponik', compact('data'));

    }

    public function cafe(Request $request)
    {
        $data['page'] = 'cafe';
        // get category
        $data['category'] = DB::table('kategori')->where('parent_serial',$this->cafe_serial)->get();

        // get product by serial
        $product = DB::table('produk')->where('status','Active');
        
        // query where serial_kategori
        $serial_kategori = $request->input('serial_kategori');
        if($serial_kategori){
            $product =  $product->where('serial_kategori',$serial_kategori);
        }else{
            $categories = $data['category']->pluck('serial')->toArray();
            $product =  $product->whereIn('serial_kategori',$categories);

        }

        $product = $product->get();
        $data['data'] = $product;
        $data['image_url'] = $this->image_url;
        // dd($data);
        return view('front/cafe', compact('data'));
    }

    public function edufarm(Request $request)
    {
       $data['page'] = 'edu farm';
        // get category
        $data['category'] = DB::table('kategori')->where('parent_serial',$this->edufarm_serial)->get();

        // get product by serial
        $product = DB::table('produk')->where('status','Active');
        
        // query where serial_kategori
        $serial_kategori = $request->input('serial_kategori');
        if($serial_kategori){
            $product =  $product->where('serial_kategori',$serial_kategori);
        }else{
            $categories = $data['category']->pluck('serial')->toArray();
            $product =  $product->whereIn('serial_kategori',$categories);

        }

        $product = $product->get();
        $data['data'] = $product;
        $data['image_url'] = $this->image_url;
        // dd($data);
        return view('front/edufarm', compact('data'));
    }

    public function phone(Request $request)
    {
       $data['page'] = 'phone';
        // get category
        $data['category'] = DB::table('kategori')->where('parent_serial',$this->phone_serial)->get();

        // get product by serial
        $product = DB::table('produk')->where('status','Active');
        
        // query where serial_kategori
        $serial_kategori = $request->input('serial_kategori');
        if($serial_kategori){
            $product =  $product->where('serial_kategori',$serial_kategori);
        }else{
            $categories = $data['category']->pluck('serial')->toArray();
            $product =  $product->whereIn('serial_kategori',$categories);
        }

        $product = $product->get();
        $data['data'] = $product;
        $data['image_url'] = $this->image_url;
        // dd($data);
        return view('front/phone', compact('data'));
    }
}

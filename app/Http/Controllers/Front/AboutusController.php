<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use DB;

class AboutusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
        $data['visi'] = DB::table('tentang_kita')->where([['status','Active'],['category','visi']])->first();
        $data['misi'] = DB::table('tentang_kita')->where([['status','Active'],['category','misi']])->first();
        $data['tim_kami'] = DB::table('tentang_kita')->where([['status','Active'],['category','Tim Kami']])->get();
        $data['page'] = 'about us';
        $data['image_url'] = $this->image_url;
        return view('front/about_us', compact('data'));
    }
}

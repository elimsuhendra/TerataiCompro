<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

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
    public function hidroponik()
    {
        $data['page'] = 'hidroponik';
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

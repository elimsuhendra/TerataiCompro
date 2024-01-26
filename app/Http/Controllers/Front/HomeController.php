<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

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
        $data['page'] = 'home';
        return view('front/home', compact('data'));
    }

    public function home()
    {
        // $data['page'] = 'home';
        return view('home');
    }
}
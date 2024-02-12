<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class ContactusController extends Controller
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
        $data['page'] = 'contact us';
        return view('front/contact_us', compact('data'));
    }

    public function create(Request $request)
    {
        dd($request);
        $data['page'] = 'contact us';
        return view('front/contact_us', compact('data'));
    }
}

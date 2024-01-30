<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

class ArticleController extends Controller
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
        $data['page'] = 'article';
        dd($this->get_index('article'));
        return view('front/article', compact('data'));
    }

    public function detail()
    {
        $data['page'] = 'article';
        return view('front/article_detail', compact('data'));
    }
}

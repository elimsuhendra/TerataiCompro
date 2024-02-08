<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Models\Artikel;
use DB;

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

        $request = (object) [
            "length" => 9,
            "start" => 0
        ];
        $data['data'] = DB::table('artikel')->paginate(9);
        return view('front/article', compact('data'));  
    }

    public function detail(Request $request)
    {
        $data['page'] = 'article';
        $serial = $request->input('serial');
        $data['data'] = $this->get_detail('artikel',$serial);
        // dd($data['data']);
        return view('front/article_detail', compact('data'));
    }
}

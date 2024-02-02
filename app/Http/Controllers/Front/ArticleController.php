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
        // $data['data'] = $this->get_index('artikel', $request);
        $data['data'] = DB::table('artikel')->paginate(1);
        // dd($data['data']);
        return view('front/article', compact('data'));  
        // return $this->render_view('front/article', $data);
    }

    public function detail()
    {
        $data['page'] = 'article';
        return view('front/article_detail', compact('data'));
    }
}

<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use DB;

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
        $this->table = 'kontak_kami';
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
        $kontak_unit_bisnis_1 = DB::table('option_map')->where('kategori','Kontak Unit Bisnis - 1')->get();
        $kontak_unit_bisnis_2 = DB::table('option_map')->where('kategori','Kontak Unit Bisnis - 2')->get();
        $kontak_unit_bisnis_3 = DB::table('option_map')->where('kategori','Kontak Unit Bisnis - 3')->get();
        $kontak_unit_bisnis_4 = DB::table('option_map')->where('kategori','Kontak Unit Bisnis - 4')->get();
        
        // create array kontak bisnis become 1 row
        $arr_kontak_unit_bisnis_1 = [
            'name' => '',
            'phone' => '',
            'email' => '',
            'facebook' => '',
            'instagram' => '',
            'tiktok' => ''
        ];
        foreach ($kontak_unit_bisnis_1 as $key => $val) {
            if($val->key == 'Name'){
                $arr_kontak_unit_bisnis_1['name'] = $val->value;
            }else if($val->key == 'Phone'){
                $arr_kontak_unit_bisnis_1['phone'] = $val->value;
            }else if($val->key == 'Email'){
                $arr_kontak_unit_bisnis_1['email'] = $val->value;
            }else if($val->key == 'Facebook'){
                $arr_kontak_unit_bisnis_1['facebook'] = $val->value;
            }else if($val->key == 'Instagram'){
                $arr_kontak_unit_bisnis_1['instagram'] = $val->value;
            }else if($val->key == 'Tiktok'){
                $arr_kontak_unit_bisnis_1['tiktok'] = $val->value;
            }
        }

        // create array kontak bisnis become 1 row
        $arr_kontak_unit_bisnis_2 = [
            'name' => '',
            'phone' => '',
            'email' => '',
            'facebook' => '',
            'instagram' => '',
            'tiktok' => ''
        ];
        foreach ($kontak_unit_bisnis_2 as $key => $val) {
            if($val->key == 'Name'){
                $arr_kontak_unit_bisnis_2['name'] = $val->value;
            }else if($val->key == 'Phone'){
                $arr_kontak_unit_bisnis_2['phone'] = $val->value;
            }else if($val->key == 'Email'){
                $arr_kontak_unit_bisnis_2['email'] = $val->value;
            }else if($val->key == 'Facebook'){
                $arr_kontak_unit_bisnis_2['facebook'] = $val->value;
            }else if($val->key == 'Instagram'){
                $arr_kontak_unit_bisnis_2['instagram'] = $val->value;
            }else if($val->key == 'Tiktok'){
                $arr_kontak_unit_bisnis_2['tiktok'] = $val->value;
            }
        }

         // create array kontak bisnis become 1 row
        $arr_kontak_unit_bisnis_3 = [
            'name' => '',
            'phone' => '',
            'email' => '',
            'facebook' => '',
            'instagram' => '',
            'tiktok' => ''
        ];
        foreach ($kontak_unit_bisnis_3 as $key => $val) {
            if($val->key == 'Name'){
                $arr_kontak_unit_bisnis_3['name'] = $val->value;
            }else if($val->key == 'Phone'){
                $arr_kontak_unit_bisnis_3['phone'] = $val->value;
            }else if($val->key == 'Email'){
                $arr_kontak_unit_bisnis_3['email'] = $val->value;
            }else if($val->key == 'Facebook'){
                $arr_kontak_unit_bisnis_3['facebook'] = $val->value;
            }else if($val->key == 'Instagram'){
                $arr_kontak_unit_bisnis_3['instagram'] = $val->value;
            }else if($val->key == 'Tiktok'){
                $arr_kontak_unit_bisnis_3['tiktok'] = $val->value;
            }
        }

         // create array kontak bisnis become 1 row
        $arr_kontak_unit_bisnis_4 = [
            'name' => '',
            'phone' => '',
            'email' => '',
            'facebook' => '',
            'instagram' => '',
            'tiktok' => ''
        ];
        foreach ($kontak_unit_bisnis_4 as $key => $val) {
            if($val->key == 'Name'){
                $arr_kontak_unit_bisnis_4['name'] = $val->value;
            }else if($val->key == 'Phone'){
                $arr_kontak_unit_bisnis_4['phone'] = $val->value;
            }else if($val->key == 'Email'){
                $arr_kontak_unit_bisnis_4['email'] = $val->value;
            }else if($val->key == 'Facebook'){
                $arr_kontak_unit_bisnis_4['facebook'] = $val->value;
            }else if($val->key == 'Instagram'){
                $arr_kontak_unit_bisnis_4['instagram'] = $val->value;
            }else if($val->key == 'Tiktok'){
                $arr_kontak_unit_bisnis_4['tiktok'] = $val->value;
            }
        }

        $data['kontak_unit_bisnis_1'] = $arr_kontak_unit_bisnis_1;
        $data['kontak_unit_bisnis_2'] = $arr_kontak_unit_bisnis_2;
        $data['kontak_unit_bisnis_3'] = $arr_kontak_unit_bisnis_3;
        $data['kontak_unit_bisnis_4'] = $arr_kontak_unit_bisnis_4;
        // dd($data['kontak_unit_bisnis_1']);

        // get google map
        $site_map_source = DB::table('option_map')->where('key','Site Map Source')->first();
        $data['site_map_source'] = $site_map_source;

        $data['page'] = 'contact us';
        return view('front/contact_us', compact('data'));
    }

    public function create(Request $request)
    {
        // Validation Data
        // $request->validate([
        //     'name' => 'required|max:50',
        //     'email' => 'required|max:100|email|unique:admins',
        //     'username' => 'required|max:100|unique:admins',
        //     'password' => 'required|min:6|confirmed',
        // ]);

        // insert data
        $res = $this->insert_data($this->table, $request->all());

        return $res;
    }
}

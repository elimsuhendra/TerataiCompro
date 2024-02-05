<?php

namespace App\Http\Controllers\front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_index($table, $request){
        $data = DB::table($table)->select('*');
        // dd($request->length);
        if($request->length !== "-1"){
            $data = $data->limit($request->length)->offset($request->start);
        }

        $data = $data->get();
        return $data;
    }

    public function get_detail($table, $serial){
        $data = DB::table($table)->select('*')->where('serial',$serial)->join();
       
        $data = $data->first();
        return $data;
    }

    public function render_view($view = ''){
        $data = $this->data;
        // if($view == "pages.pages.cek_alamat"){
        //     return view($this->view_path.'.'.$view, [
        //         'cek_alamat' => $data->appends(Input::except('page'))
        //     ]);
        
        // }else{
        //     return view($this->view_path.'.'.$view,$data);       
        // }
        // dd($data);
        return view($this->view_path.'.'.$view,$data);  
    }

    public function getSetLang($ids = NULL){
        $default = Mslanguage::where('status','y')->first();
        $get_lang = session('lang');

        if($ids != NULL || $get_lang != NULL) {
            if($ids != NULL) {
                session(['lang' => $ids]);
                $lang = $ids;
            } else{
                $lang = $get_lang;
            }
        } else{
            $lang = $default->id;
        }

        $data = Mslanguage::where([['status','y'],['id',$lang]])->first();
        App::setLocale($data->language_name_alias);
        return $lang;   
    }

    public function load_language($lang){
        $default = Mslanguage::where('status','y')->first();
        $get_lang = session('lang_code');
        if($lang != NULL){
            $language   = 'id';
            session(['lang_code' => $language]);
        }elseif($get_lang != NULL){
            $language   = 'id';
            $language = $get_lang;
        }else{
            $language   = $user->language->language_name_alias;
        }

        // $this->data['global_language'] = $this->cache_query('config',Mslanguage::where('status','y'),'get');
        App::setLocale($language);
    }

    public function getOrderStatus(){
        $data = Order_Status::pluck('order_status_name', 'id')->toArray();

        return $data;
    }

    public function formatArrayToTitikKoma($arr){
        $push_data2     = '';
        foreach($arr as $pn){
            $push_data2 .= ';'.$pn;
        }

        if($push_data2 != ''){
            $push_data2     .=  ';';    
        }
        return $push_data2;
    }

    public function formatTitikKomaToArray($data){
        $data = explode(";",$data);
        $push_data2 = [];
        for($i=0; $i< count($data); $i++){
            if($data[$i] != '' && isset($data[$i])){
                $push_data2[] = $data[$i];
            }
        }
        return $push_data2;
    }

    public function decode_rupiah($price){
        if($price != 'Nan'){
            $price = str_replace(',', '', $price);
            $price = substr($price, 0, strpos($price, '.'));
            return $price;
        }else{
                return null;
        }
    }

    public function increase_version(){
        $config                   = Config::where('name', 'product_version')->first();
        $config->value            += 1; 
        $config->save();
    }
}
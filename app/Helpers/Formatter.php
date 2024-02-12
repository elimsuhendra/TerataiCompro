<?php

namespace App\Helpers;

use App\Models\KontakKami;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;


class Formatter
{


    public static function notif()
    {
        $notif = KontakKami::where('is_read',0)->get();


        return count($notif);
    }

    public static function notifData()
    {
        $notif = KontakKami::where('is_read',0)->limit(3)->orderBy('created_at','desc')->get();

        return $notif;
    }


    public static function currency($amount, $id = 'rupiah')
    {   
        if($amount != null || $amount != ''){
            
            $hasil_rupiah = "Rp " . number_format($amount,0,',','.');
            return $hasil_rupiah;

        }else{
            return 'Rp. 0';
        }
    }

    public static function date($date, $format = 'Y-m-d H:i:s')
    {
        return date($format, strtotime($date));
    }

    public static function date2($date, $format = 'Y-m-d H:i')
    {
        if($date == null){
            return "00-00-00 00:00";
        }

        return date($format, strtotime($date));
    }
    
}

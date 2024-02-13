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

    public  static function timeCalculate($startdate,$enddate){

        $timestamp_awal = strtotime($startdate);
        $timestamp_akhir = strtotime($enddate);
        $selisih_detik = $timestamp_akhir - $timestamp_awal;
        // Hitung selisih dalam menit, jam, hari, minggu, bulan, dan tahun
        $selisih_menit = $selisih_detik / 60;
        $selisih_jam = $selisih_detik / (60 * 60);
        $selisih_hari = $selisih_detik / (60 * 60 * 24);
    
        // Mencari kategori yang paling sesuai dengan selisih waktu
        if ($selisih_menit < 60) {
            return floor($selisih_menit) . " Menit Yang lalu";
        } elseif ($selisih_jam < 24) {
            return floor($selisih_jam) . " Jam Yang lalu";
        } elseif ($selisih_hari < 7) {
            return floor($selisih_hari) . " Hari Yang lalu";
        } else {
            $selisih_minggu = $selisih_hari / 7;
            $selisih_bulan = $selisih_hari / 30;
            $selisih_tahun = $selisih_hari / 365;
    
            if ($selisih_minggu < 4) {
                return floor($selisih_minggu) . " Minggu Yang lalu";
            } elseif ($selisih_bulan < 12) {
                return floor($selisih_bulan) . " Bulan Yang lalu";
            } else {
                return floor($selisih_tahun) . " Tahun Yang lalu";
            }
        }

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

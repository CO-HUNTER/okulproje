<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TimeLineController extends Controller
{
    public function get(){


// $query=DB::table('takipler')->select('takip_edilen')->where('takip_eden',session('kullaniciId'))->where('takip_durum',1)->get();

$query=DB::table('kitap_durum')->join('takipler','kitap_durum.kullanici_id','=','takipler.takip_edilen')
->join('uyelers','kitap_durum.kullanici_id','=','uyelers.uyeid')->where('takipler.takip_eden',session('kullaniciId'))
->join('kitaplar','kitap_durum.kitap_id','=','kitaplar.id')
->where('takipler.takip_durum',1)->orWhere('uyelers.uyeid',session('kullaniciId'))->get();





$image=DB::table('uyelers')->select('resim')->where('uyeid',session('kullaniciId'))->first();

        $data=[
            'profilImage' => $image,
            'timeLine' =>$query
        ];
        
         return view('timeline',$data);
    }
}

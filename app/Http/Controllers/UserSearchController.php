<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserSearchController extends Controller
{
    public function search(Request $request){
        $value=$request->searchUser;
        $query=DB::table('uyelers')->select(['uyeid','ad','soyad','klncad','resim'])->where(DB::raw("CONCAT(uyelers.ad, ' ',uyelers.soyad) LIKE '%$value%' "))
        ->orWhere('klncad','like','%'.$value.'%')->get();
        // 
        $data=['data' => $query];
         return view('searchResult',$data );

    }

    public function profileDetails($id=null){
 
        if($id==null||$id==session('kullaniciId')){
           return redirect('profil');
        }else{
            $queryUser=DB::table('uyelers')->where('uyeid',$id)->first();
            $queryBookStatus=DB::table('kitap_durum')->where('kid',$id)->get();
            $data=[
                'user' => $queryUser,
                'bookStatus' => $queryBookStatus
            ];

            return view('otherProfile',$data);
        }
    }
}

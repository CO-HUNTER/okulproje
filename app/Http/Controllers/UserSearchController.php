<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
date_default_timezone_set('Europe/Istanbul');
class UserSearchController extends Controller
{
    public function search(Request $request){
        if($request->searchUser){
        $value=$request->searchUser;
        $query=DB::table('uyelers')->select(['uyeid','ad','soyad','klncad','resim'])->where('ad','like','%'.$value.'%')->orWhere('soyad','like','%'.$value.'%')
        ->orWhere('klncad','like','%'.$value.'%')->get();
        // 
        $data=['data' => $query];
         return view('searchResult',$data );
        }else if($request->data){
            $value=$request->data;
            $query=DB::table('uyelers')->select(['uyeid','ad','soyad','klncad','resim'])->where('ad','like','%'.$value.'%')->orWhere('soyad','like','%'.$value.'%')
            ->orWhere('klncad','like','%'.$value.'%')->get();
            json_encode($query);
        return response()->json($query); 
        }
    }

    public function profileDetails($id=null){
 
        if($id==null||$id==session('kullaniciId')){
           return redirect('profil');
        }else{
            $queryUser=DB::table('uyelers')->where('uyeid',$id)->first();
            $queryBookStatus=DB::table('kitap_durum')->join('kitaplar','kitap_durum.kitap_id','=','kitaplar.id')
            ->where('kitap_durum.kullanici_id',$id)->get();
            $queryFollow=DB::table('takipler')->select('takip_durum')->where('takip_eden',session('kullaniciId'))->where('takip_edilen',$id)->first();
            //yıllık okunan kitap sayısı
            $userId=session('kullaniciId');
            $date = date('Y/m/d H:i:s');
            $queryProfilMounth="";
            $queryOther="";
            $responseDate="";
            for ($i = 0; $i < 12; $i++) {
                $timeOne = strtotime("-$i month", strtotime($date));
                $timeOne = date('Y/m/d H:i:s', $timeOne);
                $a = $i + 1;
                $timeTwo = strtotime("-$a month", strtotime($date));
                $timeTwo = date('Y/m/d H:i:s', $timeTwo);
    
                // $query=DB::table('kitap_durum')->count();
    
                $queryProfilMounth.=DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])->where('kullanici_id',session('kullaniciId'))
                    ->count().",";
                    $queryOther.= DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])->where('kullanici_id',$id)
                    ->count().",";
                    
                $responseDate .="\"".date('Y/m', strtotime($timeOne))."\"".",";
                
            }
            $responseDate=rtrim($responseDate,',');
          $queryProfilMounth= rtrim($queryProfilMounth,',');
          $queryOther= rtrim($queryOther,',');

          //Aylık okunan kitap sayısı 
$queryProfilYears="";
$queryOtherYears="";
$responseDateYears="";
for ($x = 0; $x < 30; $x++) {
    $timeOne = strtotime("-$x day", strtotime($date));
    $timeOne = date('Y/m/d H:i:s', $timeOne);
    $a = $x + 1;
    $timeTwo = strtotime("-$x day", strtotime($date));
    $timeTwo = date('Y/m/d H:i:s', $timeTwo);

    // $query=DB::table('kitap_durum')->count();

    $queryProfilYears.=DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])->where('kullanici_id',session('kullaniciId'))
        ->count().",";
        $queryOtherYears.= DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])->where('kullanici_id',$id)
        ->count().",";
        
    $responseDateYears .="\"".date('m/d', strtotime($timeOne))."\"".",";
    
}
$responseDateYears=rtrim($responseDateYears,',');
$queryProfilYears= rtrim($queryProfilYears,',');
$queryOtherYears= rtrim($queryOtherYears,',');
//Grafik 3


$responseDatePageYears="";
$topla = '';
$toplaOther='';
for ($i = 0; $i < 12; $i++) {
    $timeOne = strtotime("-$i month", strtotime($date));
    $timeOne = date('Y/m/d H:i:s', $timeOne);
    $a = $i + 1;
    $timeTwo = strtotime("-$a month", strtotime($date));
    $timeTwo = date('Y/m/d H:i:s', $timeTwo);

    // $query=DB::table('kitap_durum')->count();

    $queryPageYears = DB::table('kitap_durum')->select(DB::raw("sum(if(kitap_durum <1,max_sayfa,sayfa_kalinan)) as sonuc"))
        ->whereBetween('olusum_zaman', [$timeTwo, $timeOne])

        ->where('kitap_durum', '<=', '1')->where('kullanici_id',$userId)->get();

        $queryOtherPageYears = DB::table('kitap_durum')->select(DB::raw("sum(if(kitap_durum <1,max_sayfa,sayfa_kalinan)) as sonuc"))
        ->whereBetween('olusum_zaman', [$timeTwo, $timeOne])

        ->where('kitap_durum', '<=', '1')->where('kullanici_id',$id)->get();

    $topla .= $queryPageYears[0]->sonuc==null?"0,":$queryPageYears[0]->sonuc.",";
    $toplaOther.=$queryOtherPageYears[0]->sonuc==null?"0,":$queryOtherPageYears[0]->sonuc.",";
    $responseDatePageYears.="\"". date('Y/m', strtotime($timeOne))."\"".",";
    
}
rtrim($topla,",");
rtrim($toplaOther,",");
rtrim($responseDatePageYears,",");
//Grafik4
$responseDatePageMonth="";
$toplaMonth = '';
$toplaOtherMonth='';
for ($i = 0; $i < 30; $i++) {
    $timeOne = strtotime("-$i day", strtotime($date));
    $timeOne = date('Y/m/d H:i:s', $timeOne);
    $a = $i + 1;
    $timeTwo = strtotime("-$a day", strtotime($date));
    $timeTwo = date('Y/m/d H:i:s', $timeTwo);

    // $query=DB::table('kitap_durum')->count();

    $queryPageYears = DB::table('kitap_durum')->select(DB::raw("sum(if(kitap_durum <1,max_sayfa,sayfa_kalinan)) as sonuc"))
        ->whereBetween('olusum_zaman', [$timeTwo, $timeOne])

        ->where('kitap_durum', '<=', '1')->where('kullanici_id',$userId)->get();

        $queryOtherPageYears = DB::table('kitap_durum')->select(DB::raw("sum(if(kitap_durum <1,max_sayfa,sayfa_kalinan)) as sonuc"))
        ->whereBetween('olusum_zaman', [$timeTwo, $timeOne])

        ->where('kitap_durum', '<=', '1')->where('kullanici_id',$id)->get();

    $toplaMonth .= $queryPageYears[0]->sonuc==null?"0,":$queryPageYears[0]->sonuc.",";
    $toplaOtherMonth.=$queryOtherPageYears[0]->sonuc==null?"0,":$queryOtherPageYears->sonuc.",";
    $responseDatePageMonth.="\"". date('m/d', strtotime($timeOne))."\"".",";
    
}
rtrim($toplaMonth,",");
rtrim($toplaOtherMonth,",");
rtrim($responseDatePageMonth,",");

$queryProfilImage=DB::table('uyelers')->select('resim')->where('uyeid',session('kullaniciId'))->first();
            $data=[
                'user' => $queryUser,
                'bookStatus' => $queryBookStatus,
                'followStatus' => $queryFollow,
                'queryProfilMounth' => $queryProfilMounth,
                'queryOther' => $queryOther,
                'responseDate' => $responseDate,
                'profilImage' =>$queryProfilImage,
                'queryProfilMounthYears' =>$queryProfilYears,
                'queryOtherYears' => $queryOtherYears,
                'responseDateYears' => $responseDateYears,
                'queryPageYears' => $topla,
                'queryOtherPageYears'=>$toplaOther,
                'responseDatePageYears' =>$responseDatePageYears,
                'queryPageMonth' => $toplaMonth,
                'queryOtherPageMonth' =>$toplaOtherMonth,
                'responseDatePageMonth' =>$responseDatePageMonth
            ];
          
            return view('otherProfile',$data);
        }
    }
}

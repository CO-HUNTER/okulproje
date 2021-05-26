<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Uyeler;
date_default_timezone_set('Europe/Istanbul');
class ProfilController extends Controller
{
    public function profile(){
    if(session()->has('kullaniciId')){
        $user=Uyeler::where('uyeid','=',session('kullaniciId'))->first();
$data=[
    'userInfo' => $user

];
    }
    return view('profil',$data);
}
    public function filter(Request $request)
    {
        $input = $request->input('data1');

        $users = DB::table('kitaplar')->select(['kitap_ad', 'yazar_ad'])
            ->where('kitap_ad', 'like', '%' . $input . '%')->limit(15)
            ->get();

        json_encode($users);
        return response()->json($users);
    }
    public function bookControl($bookname)
    {
        $control = DB::table('kitaplar')->select('id')
            ->where('kitap_ad', $bookname)->value('id');

        $query = DB::table('kitap_durum')
            ->where('kitap_id', $control)->value('kitap_durum');

        return [$control, $query];
    }
    public function bookStatusRead(Request $request)
    {
        $bookName = $request->input('res1');
        $date = $request->input('res2');
        $page = $request->input('res3');
        $status = $this->bookControl($bookName);
        if ($status[1] == "") {
            $insert = DB::table('kitap_durum')->insert(
                ['kullanici_id' => '12',
                    'kitap_id' => $status[0],
                    'kitap_durum' => '0',
                    'max_sayfa' => $page,
                    'olusum_zaman' => $date,

                ]
            );
            return response()->json("succes");
        } else {
            return response()->json($status[1]);
        }

    }
    public function bookStatusReading(Request $request)
    {
        $bookName = $request->input('res1');
        $date = date('Y/m/d H:i:s');
        $page = $request->input('data2');
        $status = $this->bookControl($bookName);
        if ($status[1] == "") {
            $insert = DB::table('kitap_durum')->insert(
                ['kullanici_id' => '12',
                    'kitap_id' => $status[0],
                    'kitap_durum' => '1',
                    'max_sayfa' => $page,
                    'olusum_zaman' => $date,

                ]
            );
            return response()->json("succes");
        } else {
            return response()->json($status[1]);
        }

    }
    public function bookStatusToBeRead(Request $request)
    {
        $bookName = $request->input('res1');
        $date = date('Y/m/d H:i:s');

        $status = $this->bookControl($bookName);
        if ($status[1] == "") {
            $insert = DB::table('kitap_durum')->insert(
                ['kullanici_id' => '12',
                    'kitap_id' => $status[0],
                    'kitap_durum' => '2',
                    'olusum_zaman' => $date,

                ]
            );
            return response()->json("succes");
        } else {
            return response()->json($status[1]);
        }

    }

    public function getProduct(Request $request)
    {

        $get = DB::table('kitap_durum')
            ->join('kitaplar', 'kitaplar.id', '=', 'kitap_durum.kitap_id')
            ->where('kitap_durum.kullanici_id', '12')->get();

        json_encode($get);

        return response()->json($get);
    }
    public function staticsMounth(Request $request)
    {
        $date = date('Y/m/d H:i:s');
        $data = collect([]);

        for ($i = 0; $i < 30; $i++) {
            $timeOne = strtotime("-$i day", strtotime($date));
            $timeOne = date('Y/m/d H:i:s', $timeOne);
            $a = $i + 1;
            $timeTwo = strtotime("-$a day", strtotime($date));
            $timeTwo = date('Y/m/d H:i:s', $timeTwo);

            // $query=DB::table('kitap_durum')->count();

            $query = DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])
                ->count();
            $responseDate = date('m/d', strtotime($timeOne));
            $data = $data->concat([$responseDate, $query]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function staticsYear(Request $request)
    {
        $date = date('Y/m/d H:i:s');
        $data = collect([]);

        for ($i = 0; $i < 12; $i++) {
            $timeOne = strtotime("-$i month", strtotime($date));
            $timeOne = date('Y/m/d H:i:s', $timeOne);
            $a = $i + 1;
            $timeTwo = strtotime("-$a month", strtotime($date));
            $timeTwo = date('Y/m/d H:i:s', $timeTwo);

            // $query=DB::table('kitap_durum')->count();

            $query = DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])
                ->count();
            $responseDate = date('Y/m', strtotime($timeOne));
            $data = $data->concat([$responseDate, $query]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function staticsPageYear(Request $request)
    {
        $date = date('Y/m/d H:i:s');
        $data = collect([]);
        $topla = 0;

        for ($i = 0; $i < 12; $i++) {
            $timeOne = strtotime("-$i month", strtotime($date));
            $timeOne = date('Y/m/d H:i:s', $timeOne);
            $a = $i + 1;
            $timeTwo = strtotime("-$a month", strtotime($date));
            $timeTwo = date('Y/m/d H:i:s', $timeTwo);

            // $query=DB::table('kitap_durum')->count();

            $query = DB::table('kitap_durum')->select(DB::raw("sum(if(kitap_durum <1,max_sayfa,sayfa_kalinan)) as sonuc"))
                ->whereBetween('olusum_zaman', [$timeTwo, $timeOne])

                ->where('kitap_durum', '<=', '1')->get();

            $topla = $query[0]->sonuc;
            $responseDate = date('Y/m', strtotime($timeOne));
            $data = $data->concat([$responseDate, $topla]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function staticsPageMounth(Request $request)
    {
        $date = date('Y/m/d H:i:s');
        $data = collect([]);
        $topla = 0;

        for ($i = 0; $i < 30; $i++) {
            $timeOne = strtotime("-$i day", strtotime($date));
            $timeOne = date('Y/m/d H:i:s', $timeOne);
            $a = $i + 1;
            $timeTwo = strtotime("-$a day", strtotime($date));
            $timeTwo = date('Y/m/d H:i:s', $timeTwo);

            // $query=DB::table('kitap_durum')->count();

            $query = DB::table('kitap_durum')->select(DB::raw("sum(if(kitap_durum <1,max_sayfa,sayfa_kalinan)) as sonuc"))
                ->whereBetween('olusum_zaman', [$timeTwo, $timeOne])

                ->where('kitap_durum', '<=', '1')->get();

            $topla = $query[0]->sonuc;
            $responseDate = date('Y/m', strtotime($timeOne));
            $data = $data->concat([$responseDate, $topla]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function updateReading(Request $request)
    {
        $maxPage=$request->input('max');
        $page=$request->input('value');
        $id=$request->input('id');
        $val=$page>=$maxPage?0:1;
        $time=date('Y/m/d H:i:s');
        if($val==0){
    $query=DB::table('kitap_durum')->where('kid',$id)
                ->update(
                    [
                    'sayfa_kalinan' =>  $page,
                    'kitap_durum' => $val,
                    'olusum_zaman' => $time
                    ]
                    );}else{
                        $query=DB::table('kitap_durum')->where('kid',$id)
                        ->update(
                            [
                            'sayfa_kalinan' =>  $page ,
                            'kitap_durum' => $val
                            
                            ]
                            );}
                    
                    json_encode($query);

                    return response()->json($query);

    }
    public function updateToBeRead(Request $request){
        $max=$request->input('value');
        $id=$request->input('id');
        $time=date('Y/m/d H:i:s');
        $query=DB::table('kitap_durum')->where('kid',$id)
        ->update(
            [
            'kitap_durum' => 1,
            'max_sayfa' => $max,
            'olusum_zaman' => $time
            ]
            );
            json_encode($query);

            return response()->json($query);
    }
}

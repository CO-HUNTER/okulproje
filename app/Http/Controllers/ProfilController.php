<?php

namespace App\Http\Controllers;

use App\Models\Uyeler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

date_default_timezone_set('Europe/Istanbul');
class ProfilController extends Controller
{
    public function profile($bildirim=null)
    {
        if (session()->has('kullaniciId')) {
            $user = Uyeler::where('uyeid', '=', session('kullaniciId'))->first();
            $data = [
                'userInfo' => $user,

            ];
        }
        
        // return view('profil', $data);
        if(session()->has('succes')){
            return view('profil', $data)->with('succes',session('succes'));
        }else if(session()->has('error')){

            return view('profil', $data)->with('error',session('error'));
        }
        else{
             return view('profil', $data);
        }
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
            ->where('kitap_id', $control)->where('kullanici_id',session('kullaniciId'))->value('kitap_durum');

        return [$control, $query];
    }
    public function bookStatusRead(Request $request)
    {
        $userId=session('kullaniciId');
        $bookName = $request->input('res1');
        $date = $request->input('res2');
        $page = $request->input('res3');
        $status = $this->bookControl($bookName);
        if ($status[1] == "") {
            $insert = DB::table('kitap_durum')->insert(
                ['kullanici_id' => $userId,
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
        $userId=session('kullaniciId');
        $bookName = $request->input('res1');
        $date = date('Y/m/d H:i:s');
        $page = $request->input('data2');
        $status = $this->bookControl($bookName);
        if ($status[1] == "") {
            $insert = DB::table('kitap_durum')->insert(
                ['kullanici_id' => $userId,
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
        $userId=session('kullaniciId');
        $bookName = $request->input('res1');
        $date = date('Y/m/d H:i:s');

        $status = $this->bookControl($bookName);
        if ($status[1] == "") {
            $insert = DB::table('kitap_durum')->insert(
                ['kullanici_id' => $userId,
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
        $userId=session('kullaniciId');
        $get = DB::table('kitap_durum')
            ->join('kitaplar', 'kitaplar.id', '=', 'kitap_durum.kitap_id')
            ->join('uyelers','uyelers.uyeid','=','kitap_durum.kullanici_id')
            ->where('kitap_durum.kullanici_id', $userId)->get();

        json_encode($get);

        return response()->json($get);
    }
    public function staticsMounth(Request $request)
    {
        $userId=session('kullaniciId');
        $date = date('Y/m/d H:i:s');
        $data = collect([]);

        for ($i = 0; $i < 30; $i++) {
            $timeOne = strtotime("-$i day", strtotime($date));
            $timeOne = date('Y/m/d H:i:s', $timeOne);
            $a = $i + 1;
            $timeTwo = strtotime("-$a day", strtotime($date));
            $timeTwo = date('Y/m/d H:i:s', $timeTwo);

            // $query=DB::table('kitap_durum')->count();

            $query = DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])->where('kullanici_id',$userId)
                ->count();
            $responseDate = date('m/d', strtotime($timeOne));
            $data = $data->concat([$responseDate, $query]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function staticsYear(Request $request)
    {
        $userId=session('kullaniciId');
        $date = date('Y/m/d H:i:s');
        $data = collect([]);

        for ($i = 0; $i < 12; $i++) {
            $timeOne = strtotime("-$i month", strtotime($date));
            $timeOne = date('Y/m/d H:i:s', $timeOne);
            $a = $i + 1;
            $timeTwo = strtotime("-$a month", strtotime($date));
            $timeTwo = date('Y/m/d H:i:s', $timeTwo);

            // $query=DB::table('kitap_durum')->count();

            $query = DB::table('kitap_durum')->whereBetween('olusum_zaman', [$timeTwo, $timeOne])->where('kullanici_id',$userId)
                ->count();
            $responseDate = date('Y/m', strtotime($timeOne));
            $data = $data->concat([$responseDate, $query]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function staticsPageYear(Request $request)
    {
        $userId=session('kullaniciId');
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

                ->where('kitap_durum', '<=', '1')->where('kullanici_id',$userId)->get();

            $topla = $query[0]->sonuc;
            $responseDate = date('Y/m', strtotime($timeOne));
            $data = $data->concat([$responseDate, $topla]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function staticsPageMounth(Request $request)
    {
        $userId=session('kullaniciId');
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

                ->where('kitap_durum', '<=', '1')->where('kullanici_id',$userId)->get();

            $topla = $query[0]->sonuc;
            $responseDate = date('Y/m', strtotime($timeOne));
            $data = $data->concat([$responseDate, $topla]);
        }

        json_encode($data);
        return response()->json($data);
    }
    public function updateReading(Request $request)
    {
        $userId=session('kullaniciId');
        $maxPage = $request->input('max');
        $page = $request->input('value');
        $id = $request->input('id');
        $val = $page >= $maxPage ? 0 : 1;
        $time = date('Y/m/d H:i:s');
        if ($val == 0) {
            $query = DB::table('kitap_durum')->where('kid', $id)->where('kullanici_id',$userId)
                ->update(
                    [
                        'sayfa_kalinan' => $page,
                        'kitap_durum' => $val,
                        'olusum_zaman' => $time,
                    ]
                );} else {
            $query = DB::table('kitap_durum')->where('kid', $id)->where('kullanici_id',$userId)
                ->update(
                    [
                        'sayfa_kalinan' => $page,
                        'kitap_durum' => $val,

                    ]
                );}

        json_encode($query);

        return response()->json($query);

    }
    public function updateToBeRead(Request $request)
    {   $userId=session('kullaniciId');
        $max = $request->input('value');
        $id = $request->input('id');
        $time = date('Y/m/d H:i:s');
        $query = DB::table('kitap_durum')->where('kid', $id)->where('kullanici_id',$userId)
            ->update(
                [
                    'kitap_durum' => 1,
                    'max_sayfa' => $max,
                    'olusum_zaman' => $time,
                ]
            );
        json_encode($query);

        return response()->json($query);
    }
  
}

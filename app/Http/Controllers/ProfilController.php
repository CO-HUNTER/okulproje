<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    public function filter(Request $request)
    {
        $input = $request->input('data1');

        $users = DB::table('kitaplar')->select(['kitap_ad','yazar_ad'])
            ->where('kitap_ad', 'like', '%' . $input . '%')->limit(15)
            ->get();

        json_encode($users);
        return response()->json($users);
    }
    public function bookControl($bookname)
    {
        $control = DB::table('kitaplar')->select('id')
        ->where('kitap_ad', $bookname)->value('id');

    $query=DB::table('kitap_durum')
    ->where('kitap_id',$control)->value('kitap_durum');

     return [$control,$query];
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
                    'olusum_zaman' => $date
                    
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
                    'olusum_zaman' => $date
                    
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
                    'olusum_zaman' => $date
                    
                ]
            );
            return response()->json("succes");
        } else {
            return response()->json($status[1]);
        }
    
    }

    public function getProduct(Request $request){

        $get=DB::table('kitap_durum')
        ->join('kitaplar','kitaplar.id','=','kitap_durum.kitap_id')
        ->where('kitap_durum.kullanici_id','12')->get();

        json_encode($get);

        return response()->json($get);
    }
}

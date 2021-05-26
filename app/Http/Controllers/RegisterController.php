<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(Request $reguest)
    {
      $message="";
        utf8_encode($reguest);
        json_encode($reguest);
        $data = collect([]);
        $name = $reguest->input('name');
        $surname = $reguest->input('surName');
        $email = $reguest->input('email');
        $nickName = $reguest->input('nickName');
        $password = $reguest->input('password');
        $date = $reguest->input('date');
        $status = 2;
        $activasion = uniqid('bookmaster');
        $queryMail = DB::table('uyeler')->where('eposta', $email)->count();
        $queryNick = DB::table('uyeler')->where('klncad', $nickName)->count();
if($queryMail==1||$queryNick==1){
$message.=$queryMail==1?'Bu e-posta ile daha önce kayıt yapılmış ':'';
$message.=$queryNick==1?'Bu kullanıcı adı daha önce alınmış':'';
json_encode($message);
return response()->json($message);
}else{

        $insert = DB::table('uyeler')->insert([
            'ad' => $name,
            'soyad' => $surname,
            'klncad' => $nickName,
            'sifre' => $password,
            'eposta' => $email,
            'durum' => $status,
            'aktivasyon' => $activasion,
            'dt' => $date,
        ]);
        $data = $data->concat([$activasion, $reguest]);
        if ($insert == 1) {
            Mail::to($email)->send(new SendMail($data));

        }

        return response()->json("succes");
      }
    }
    public function activasion($code = null)
    {

        if ($code == null) {
            route('anasayfa');
        } else {
            $update = DB::table('uyeler')->where('aktivasyon', $code)
                ->update(
                    ['durum' => 1,
                        'aktivasyon' => '',

                    ]

                );
            return view('aktivasyon', ['data' => $update]);
        }
    }
}

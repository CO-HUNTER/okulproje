<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Uyeler;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $reguest)
    {
        $reguest->validate([
            'name' => 'required',
            'surName' => 'required',
            'eposta' => 'required|email|unique:uyelers',
            'klncad' => 'required|unique:uyelers',
            'password' => 'required|min:5|max:12',
            'date' => 'required'
        ]);
        $activasion=uniqid('bookmaster');
        $user=new Uyeler;
        $user->ad=$reguest->name;
        $user->soyad=$reguest->surName;
        $user->klncad=$reguest->klncad;
        $user->sifre=Hash::make($reguest->password);
        $user->eposta=$reguest->eposta;
        $user->durum=2;
        $user->resim='default.jpg';
        $user->aktivasyon=$activasion;
        $user->dt=$reguest->date;
        
        $query=$user->save();
        if($query){
            $data=collect([]);
            $data = $data->concat([$activasion, $reguest]);
            Mail::to($reguest->eposta)->send(new SendMail($data));
            return response()->json("succes");
        }else{
            return response()->json("başarısız");
        }
//eski kodlarım
//       $message="";
//         utf8_encode($reguest);
//         json_encode($reguest);
//         $data = collect([]);
//         $name = $reguest->input('name');
//         $surname = $reguest->input('surName');
//         $email = $reguest->input('email');
//         $nickName = $reguest->input('nickName');
//         $password = $reguest->input('password');
//         $date = $reguest->input('date');
//         $status = 2;
//         $activasion = uniqid('bookmaster');
//         $queryMail = DB::table('uyeler')->where('eposta', $email)->count();
//         $queryNick = DB::table('uyeler')->where('klncad', $nickName)->count();
// if($queryMail==1||$queryNick==1){
// $message.=$queryMail==1?'Bu e-posta ile daha önce kayıt yapılmış ':'';
// $message.=$queryNick==1?'Bu kullanıcı adı daha önce alınmış':'';
// json_encode($message);
// return response()->json($message);
// }else{

//         $insert = DB::table('uyeler')->insert([
//             'ad' => $name,
//             'soyad' => $surname,
//             'klncad' => $nickName,
//             'sifre' => $password,
//             'eposta' => $email,
//             'durum' => $status,
//             'aktivasyon' => $activasion,
//             'dt' => $date,
//         ]);
//         $data = $data->concat([$activasion, $reguest]);
//         if ($insert == 1) {
//             Mail::to($email)->send(new SendMail($data));

//         }

//         return response()->json("succes");
//       }
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
  public  function login(Request $reguest){
     
        $user=Uyeler::where('eposta','=',$reguest->username)  //->orWhere('klncad','=',$reguest->username)
        ->first();
        if($user){
            if(Hash::check($reguest->password,$user->sifre)){
                $reguest->session()->put('kullaniciId',$user->uyeid);
                return response()->json("succes");
            }else{
                return response()->json("password");
            }
        }else{
            return response()->json("user");
        }
    }
   
}

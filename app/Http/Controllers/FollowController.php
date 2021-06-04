<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    //

    public function follow(Request $request)
    {

        $query = DB::table('takipler')->insert([
            'takip_eden' => session('kullaniciId'),
            'takip_edilen' => $request->id,
            'takip_durum'  => 0
        ]);
      

        return "geldi";
    }

  
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
      

        return redirect()->back();
    }

  public function followAccept(Request $request){
      $query=DB::table('takipler')->where('takip_id',$request->id)->update([
          'takip_durum' => 1,
          'updated_at' => Carbon::now()
      ]);
      return redirect()->back();
  }
  public function followReject(Request $request){
      $query=DB::table('takipler')->where('takip_id',$request->id)->delete();

      return redirect()->back();
  }
  public function followRejection(Request $request){
      $query=DB::table('takipler')->where('takip_id',$request->id)->delete();
      return redirect()->back();
  }
}

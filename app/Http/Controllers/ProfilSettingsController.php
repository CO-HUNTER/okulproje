<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfilSettingsController extends Controller
{
    //
    public function imageUpdate(Request $request)
    {
        // echo $request->updateImg->getClientOriginalName();
        $type = $request->updateImg->getClientOriginalExtension();
        if ($type == 'png' || $type == 'jpg'|| $type == 'jpeg') {
            $imageQuery = DB::table('uyelers')->select('resim')->where('uyeid', '=', session('kullaniciId'))->first();

            if ($imageQuery->resim != 'default.jpg') {
                unlink(public_path("content/images/").$imageQuery->resim);
            }

            $imageName = uniqid() . "" . $request->updateImg->getClientOriginalName();
            $upload = $request->updateImg->move(public_path('content/images'), $imageName);
            $query = DB::table('uyelers')->where('uyeid', '=', session('kullaniciId'))
                ->update(
                    [
                        'resim' => $imageName,
                    ]
                );
            if ($query) {
                $bildirim = [
                    'succes' => 'Resim başarıyla yüklendi',
                ];

                return redirect('profil')->with('succes', 'Resim başarıyla yüklendi');
            }
        } else {
            return redirect('profil')->with('error', 'Dosya jpg veya png formatında olmalıdır');
        }
    }
}

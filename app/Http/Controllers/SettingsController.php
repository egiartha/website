<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class SettingsController extends Controller
{
    public function update(Request $request)
    {    
        $cek = DB::table('settings')->get();
        $count = count($cek);
        if($count == 0)
        { 
            DB::table('settings')->insert([
                'nama_aplikasi'=>$request->nama_aplikasi,
                'deskripsi_aplikasi'=>$request->deskripsi_aplikasi,
            ]);
        }
        else
        {
            DB::table('settings')->where('id_settings', 1)->update([
                'nama_aplikasi'=>$request->nama_aplikasi,
                'deskripsi_aplikasi'=>$request->deskripsi_aplikasi,
            ]);
        }
        return redirect()->back()->withSuccessMessage('Settings Berhasil Diubah');
    }
}

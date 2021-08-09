<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AspirasiController extends Controller
{
    public function index()
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kategori','aspirasi')->get();
        return view('aspirasi.index',compact('pengaduan'));
    }
    public function lihat($id)
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kode_pengaduan',$id)
        ->join('users', function($join) {
            $join->on('tb_pengaduan.user_id','=','users.id');
        })
        ->get();
        return view('aspirasi.lihat',compact('pengaduan'));
    }

    public function edit($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan',$id)
        ->join('users', function($join) {
            $join->on('tb_pengaduan.user_id','=','users.id');
        })
        ->get();
        return view('aspirasi.edit',compact('pengaduan'));
    }

    public function update(Request $request)
    {
        DB::table('tb_pengaduan')->where('kode_pengaduan',$request->kode_pengaduan)->update([
            'tanggapan'=>$request->tanggapan,
            'status'=>$request->status,
        ]);
        return redirect('/aspirasi')->withSuccessMessage('Data Berhasil Ditanggapi');
    }

    public function hapus($id)
    {
        DB::table('tb_pengaduan')->where('kode_pengaduan',$id)->delete();
        return redirect()->back()->withSuccessMessage('Data Berhasil Dihapus');
        
    }
    
    public function print($id)
    {
        $aspirasi = DB::table('tb_pengaduan')->where('kode_pengaduan',$id)
        ->join('users', function($join) {
            $join->on('tb_pengaduan.user_id','=','users.id');
        })->first();
        $pdf = PDF::loadview('aspirasi.print',compact('aspirasi'));
        return $pdf->stream();
    }
}
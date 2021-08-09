<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
class PengaduanController extends Controller
{
    public function pengajuan()
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kategori','pengajuan')->get();
        return view('laporan.pengajuan',compact('pengaduan'));
    }

    public function cetak_laporan_pengajuan(Request $request)
    {
        $dari = $request->dari;
        $ke = $request->ke;
        $pengaduan = DB::table('tb_pengaduan')
        ->join('users', function($join){
            $join->on('tb_pengaduan.user_id','=','users.id');
        })
        ->where('kategori','pengajuan')->whereBetween('tgl_pengaduan',[$dari,$ke])->get();
        $pdf = PDF::loadview('laporan.print_pengajuan',compact('pengaduan','dari','ke'));
        return $pdf->stream();
    }

    public function aspirasi()
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kategori','aspirasi')->get();
        return view('laporan.aspirasi',compact('pengaduan'));
    }

    public function cetak_laporan_aspirasi(Request $request)
    {
        $dari = $request->dari;
        $ke = $request->ke;
        $pengaduan = DB::table('tb_pengaduan')
        ->join('users', function($join){
            $join->on('tb_pengaduan.user_id','=','users.id');
        })
        ->where('kategori','aspirasi')->whereBetween('tgl_pengaduan',[$dari,$ke])->get();
        $pdf = PDF::loadview('laporan.print_aspirasi',compact('pengaduan','dari','ke'));
        return $pdf->stream();
    }
}

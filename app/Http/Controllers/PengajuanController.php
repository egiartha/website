<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
class PengajuanController extends Controller
{
    public function index()
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kategori','pengajuan')->orderBy('kode_pengaduan','DESC')->get();
        return view('pengajuan.index',compact('pengaduan'));
    }
    public function lihat($id)
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kode_pengaduan',$id)
        ->join('users', function($join) {
            $join->on('tb_pengaduan.user_id','=','users.id');
        })
        ->get();
        return view('pengajuan.lihat',compact('pengaduan','belum','proses','ditolak','diterima', 'selesai'));
    }

    public function edit($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan',$id)
        ->join('users', function($join) {
            $join->on('tb_pengaduan.user_id','=','users.id');
        })
        ->get();
        return view('pengajuan.edit',compact('pengaduan'));
    }

    public function update(Request $request)
    {
        DB::table('tb_pengaduan')->where('kode_pengaduan',$request->kode_pengaduan)->update([
            'tanggapan'=>$request->tanggapan,
            'status'=>$request->status,
        ]);
        return redirect('/pengajuan')->withSuccessMessage('Data Berhasil Ditanggapi');
    }

    public function updatefoto(Request $request)
    {
        $file = $request->file('foto_selesai');
     
        $nama_file = time()."_".$file->getClientOriginalName();
     
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'database/foto_selesai';
        $file->move($tujuan_upload,$nama_file);

        DB::table('tb_pengaduan')->insert([
            'foto_selesai'=>$nama_file,
        ]);
        return redirect('/pengajuan')->withSuccessMessage('Data Berhasil Ditanggapi');
    }

    public function hapus($id)
    {
        DB::table('tb_pengaduan')->where('kode_pengaduan',$id)->delete();
        return redirect()->back()->withSuccessMessage('Data Berhasil Dihapus');
        
    }

    public function print($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan',$id)
        ->join('users', function($join) {
            $join->on('tb_pengaduan.user_id','=','users.id');
        })->first();
        $pdf = PDF::loadview('pengajuan.print',compact('pengaduan'));
        return $pdf->stream();
    }
}

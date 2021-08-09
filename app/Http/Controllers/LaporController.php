<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use Alert;
use PDF;
class LaporController extends Controller
{
    public function __construct()
    {
        $this->middleware('masyarakat');
    }
    public function lapor()
    {
        return view('lapor.lapor');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
			'foto_pengaduan' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'isi_laporan' => 'required',
			'alamat' => 'required',
			'desa' => 'required',
			'kecamatan' => 'required'
		]);
     
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('foto_pengaduan');
     
        $nama_file = time()."_".$file->getClientOriginalName();
     
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'database/foto_pengaduan';
        $file->move($tujuan_upload,$nama_file);
        $now = date('Y-m-d');
        $cek = DB::table('tb_pengaduan')->get();
        $hitung = count($cek);
        if($hitung < 1)
        {
            $no = $hitung + 1;
            $kode = "KDP - ".$no;
        }
        
        else if($hitung >= 1)
        {
            $no = $hitung + 1;
            $kode = "KDP - ".$no;
        }

        DB::table('tb_pengaduan')->insert([
            'kode_pengaduan'=>$kode,
            'tgl_pengaduan'=>$now,
            'tgl_tanggapan'=>$now,
            'user_id'=>Auth::user()->id,
            'isi_laporan'=>$request->isi_laporan,
            'alamat'=> $request->alamat,
            'desa'=> $request->desa,
            'kecamatan'=> $request->kecamatan,
            'foto_pengaduan'=>$nama_file,
            'kategori'=>$request->kategori,
        ]);
        return redirect()->back()->withSuccessMessage('Data Berhasil Dikirim');
    }
    public function data_laporan()
    {
        $all = DB::table("tb_pengaduan")->where('user_id',Auth::user()->id)->get();
        $belum = DB::table("tb_pengaduan")->where('status','0')->where('user_id',Auth::user()->id)->get();
        $proses = DB::table("tb_pengaduan")->where('status','proses')->where('user_id',Auth::user()->id)->get();
        $diterima = DB::table("tb_pengaduan")->where('status','diterima')->where('user_id',Auth::user()->id)->get();
        $ditolak = DB::table("tb_pengaduan")->where('status','ditolak')->where('user_id',Auth::user()->id)->get();
        $selesai = DB::table("tb_pengaduan")->where('status','selesai')->where('user_id',Auth::user()->id)->get();
        return view('lapor.data_laporan',compact('all','belum','proses','diterima','ditolak', 'selesai'));
    }

    public function lihat($id)
    {
        $data = DB::table("tb_pengaduan")->where('kode_pengaduan',$id)->get();
        return view('lapor.lihat',compact('data'));
    }
    public function hapus($id)
    {
        $data = DB::table("tb_pengaduan")->where('kode_pengaduan',$id)->delete();
        return redirect()->back()->withSuccessMessage('Data Berhasil Dihapus');
        
    }

    public function print($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan',$id)
        ->join('users', function($join) {
            $join->on('tb_pengaduan.user_id','=','users.id');
        })->first();
        $pdf = PDF::loadview('lapor.print',compact('pengaduan'));
        return $pdf->stream();
    }


}

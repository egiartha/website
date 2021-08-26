<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Komentar;
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
        $nama_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'database/foto_pengaduan';
        $file->move($tujuan_upload, $nama_file);

        $now = date('Y-m-d');
        $cek = DB::table('tb_pengaduan')->get();
        $hitung = count($cek);
        if ($hitung < 1) {
            $no = $hitung + 1;
            $kode = "KDP - " . $no;
        } else if ($hitung >= 1) {
            $no = $hitung + 1;
            $kode = "KDP - " . $no;
        }

        DB::table('tb_pengaduan')->insert([
            'kode_pengaduan' => $kode,
            'tgl_pengaduan' => $now,
            'tgl_tanggapan' => $now,
            'user_id' => Auth::user()->id,
            'isi_laporan' => $request->isi_laporan,
            'alamat' => $request->alamat,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'foto_pengaduan' => $nama_file,
            'kategori' => $request->kategori,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude
        ]);

        DB::table('notifikasi')->insert([
            'deskripsi' => "Pengaduan Baru",
            'id_pengaduan' => $kode,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Alert::success('Sukses', 'Pengaduan Berhasil Dikirim');
        return redirect()->back()->withSuccessMessage('Data Berhasil Dikirim');
    }

    public function data_laporan()
    {
        $all = DB::table("tb_pengaduan")->where('user_id', Auth::user()->id)->get();
        $belum = DB::table("tb_pengaduan")->where('status', '0')->where('user_id', Auth::user()->id)->get();
        $proses = DB::table("tb_pengaduan")->where('status', 'proses')->where('user_id', Auth::user()->id)->get();
        $diterima = DB::table("tb_pengaduan")->where('status', 'diterima')->where('user_id', Auth::user()->id)->get();
        $ditolak = DB::table("tb_pengaduan")->where('status', 'ditolak')->where('user_id', Auth::user()->id)->get();
        $selesai = DB::table("tb_pengaduan")->where('status', 'selesai')->where('user_id', Auth::user()->id)->get();
        return view('lapor.data_laporan', compact('all', 'belum', 'proses', 'diterima', 'ditolak', 'selesai'));
    }

    public function lihat($id)
    {
        $data = DB::table("tb_pengaduan")->where('kode_pengaduan', $id)->get();

        $petugas = null;

        if ($data[0]->id_petugas) {
            $petugas = DB::table('users')->where('id', $data[0]->id_petugas)->first();
        }

        $komentar = Komentar::query()->with('users')->where('id_pengaduan', $id)->get();

        return view('lapor.lihat', compact('data', 'petugas', 'komentar'));
    }
    public function hapus($id)
    {
        $data = DB::table("tb_pengaduan")->where('kode_pengaduan', $id)->delete();
        return redirect()->back()->withSuccessMessage('Data Berhasil Dihapus');
    }

    public function print($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan', $id)
            ->join('users', function ($join) {
                $join->on('tb_pengaduan.user_id', '=', 'users.id');
            })->first();
        $pdf = PDF::loadview('lapor.print', compact('pengaduan'));
        return $pdf->stream();
    }

    public function edit($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan', $id)->first();

        return view('lapor.edit', compact('pengaduan'));
    }

    public function lapor_edit_store(Request $request)
    {
        $nama_file = null;
        $file = $request->file('foto_pengaduan');
        if ($file) {
            $nama_file = time() . "_" . $file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'database/foto_pengaduan';
            $file->move($tujuan_upload, $nama_file);
        }
       

        $data = $request->all();
        unset($data['_token']);

        if ($nama_file) {
            $data['foto_pengaduan'] = $nama_file;
            DB::table('tb_pengaduan')->where('kode_pengaduan', $data['kode_pengaduan'])->update($data);
        } else {
            DB::table('tb_pengaduan')->where('kode_pengaduan', $data['kode_pengaduan'])->update($data);
        }
        Alert::success('Sukses', 'Laporan Berhasil di Edit');
        return redirect('/data_laporan')->withSuccessMessage('Data Berhasil Diubah');
        return redirect()->back();
    }
}

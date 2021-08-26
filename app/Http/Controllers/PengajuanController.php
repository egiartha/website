<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;
use App\Komentar;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        $initial = ['kategori', 'pengajuan'];

        $status = $request->input('status') || $request->input('status') !== 0 ? ['status', $request->input('status')] : null;
        $kecamatan = $request->input('kecamatan') ? ['kecamatan', $request->input('kecamatan')] : null;

        $where = array_merge([$initial], [$status], [$kecamatan]);

        $new_where = array_filter($where, function ($val) {
            if ($val && $val[1]) {
                return $val;
            }
        });

        if ($request->input('bulan')) {
            $array_bulan = explode('-', $request->input('bulan'));
            $tahun = $array_bulan[0];
            $bulan = $array_bulan[1];
            $pengaduan = DB::table("tb_pengaduan")->whereYear('tgl_pengaduan', $tahun)->whereMonth('tgl_pengaduan', $bulan)->where($new_where)->orderBy('kode_pengaduan', 'DESC')->get();
        } else {
            $pengaduan = DB::table("tb_pengaduan")->where($new_where)->orderBy('kode_pengaduan', 'DESC')->get();
        }

        return view('pengajuan.index', compact('pengaduan'));
    }
    public function lihat($id)
    {
        DB::table('notifikasi')->where('id_pengaduan', $id)->update(['is_read' => true]);

        $pengaduan = DB::table("tb_pengaduan")->where('kode_pengaduan', $id)
            ->join('users', function ($join) {
                $join->on('tb_pengaduan.user_id', '=', 'users.id');
            })
            ->get();

        $petugas = null;

        if ($pengaduan[0]->id_petugas) {
            $petugas = DB::table('users')->where('id', $pengaduan[0]->id_petugas)->first();
        }

        $komentar = Komentar::query()->with('users')->where('id_pengaduan', $id)->get();

        return view('pengajuan.lihat', compact('pengaduan', 'petugas', 'komentar'));
    }

    public function edit($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan', $id)
            ->join('users', function ($join) {
                $join->on('tb_pengaduan.user_id', '=', 'users.id');
            })
            ->get();

        $petugas = null;

        if ($pengaduan[0]->id_petugas) {
            $petugas = DB::table('users')->where('id', $pengaduan[0]->id_petugas)->first();
        }

        return view('pengajuan.edit', compact('pengaduan', 'petugas'));
    }

    public function update(Request $request)
    {
        $nama_file = null;

        if ($request->hasFile('foto_selesai')) {
            $file = $request->file('foto_selesai');

            $nama_file = time() . "_" . $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'database/foto_selesai';
            $file->move($tujuan_upload, $nama_file);
        }

        DB::table('tb_pengaduan')->where('kode_pengaduan', $request->kode_pengaduan)->update([
            'tanggapan' => $request->tanggapan,
            'status' => $request->status,
            'id_petugas' => Auth::user()->id,
            'foto_selesai' => $nama_file
        ]);
        return redirect('/pengajuan')->withSuccessMessage('Data Berhasil Ditanggapi');
    }

    public function updatefoto(Request $request)
    {
        $file = $request->file('foto_selesai');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'database/foto_selesai';
        $file->move($tujuan_upload, $nama_file);

        DB::table('tb_pengaduan')->insert([
            'foto_selesai' => $nama_file,
        ]);
        return redirect('/pengajuan')->withSuccessMessage('Data Berhasil Ditanggapi');
    }

    public function hapus($id)
    {
        DB::table('tb_pengaduan')->where('kode_pengaduan', $id)->delete();
        return redirect()->back()->withSuccessMessage('Data Berhasil Dihapus');
    }

    public function print($id)
    {
        $pengaduan = DB::table('tb_pengaduan')->where('kode_pengaduan', $id)
            ->join('users', function ($join) {
                $join->on('tb_pengaduan.user_id', '=', 'users.id');
            })->first();
        $pdf = PDF::loadview('pengajuan.print', compact('pengaduan'));
        return $pdf->stream();
    }
}

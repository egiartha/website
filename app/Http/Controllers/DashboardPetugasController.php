<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class DashboardPetugasController extends Controller
{
    public function index()
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kategori','pengajuan')->where('status','!=','ditolak')->get();
        $akun = DB::table('users')->get();
        $petugas = DB::table('users')->where('level','petugas')->where('level','admin')->get();
        $masyarakat = DB::table('users')->where('level','masyarakat')->get();
        return view('dashboard.index',compact('pengaduan','akun','petugas','masyarakat'));
    }
}


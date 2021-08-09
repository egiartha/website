<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        $pengaduan = DB::table("tb_pengaduan")->where('kategori','pengajuan')->where('status','!=','ditolak')->get();
        $akun = DB::table('users')->get();
        $petugas = DB::table('users')->where('level','petugas')->where('level','admin')->get();
        $masyarakat = DB::table('users')->where('level','masyarakat')->get();
        return view('admin.index',compact('pengaduan','akun','petugas','masyarakat'));
    }
}

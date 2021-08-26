<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class IndexController extends Controller
{
    public function __construct()
    {
        // $this->middleware('masyarakat');
    }
    public function index()
    {
        $aplikasi = DB::table('settings')->first();
        $pengaduan = DB::table('tb_pengaduan')
            ->join('users', function ($join) {
                $join->on('tb_pengaduan.user_id', '=', 'users.id');
            })
            ->orderBy('tgl_pengaduan', 'desc')->get();
        return view('masyarakat.index', compact('aplikasi', 'pengaduan'));
    }

    public function login()
    {
        return view('auth.login_admin');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TentangController extends Controller
{
    public function tentang()
    {
        return view('tentang.tentang');
    }

    public function index()
    {
        return view('lokasi.index');
    }

    public function visi()
    {
        return view('visi.visimisi');
    }
}

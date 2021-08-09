<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengguna;
use App\Telepon;
class RelasiController extends Controller
{
    
    public function pengguna()
    {
        $pengguna = Pengguna::all();
        return view('relasi.pengguna',compact('pengguna'));
    }

    public function telepon()
    {
        $telepon = Telepon::all();
        return view('relasi.telepon',compact('telepon'));
    }
}

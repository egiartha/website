<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class MasyarakatController extends Controller
{
    public function index()
    {
        $aplikasi = DB::table('settings')->first();
        $users = DB::table('users')->where('level','masyarakat')->get();
        return view('masyarakat.index',compact('users','aplikasi'));
    }
}

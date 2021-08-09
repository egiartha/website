<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('masyarakat');
    }
    public function index()
    {
        $aplikasi = DB::table('settings')->first();
        return view('masyarakat.index',compact('aplikasi'));
    }
}

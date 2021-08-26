<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar.daftar');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => ['required', 'string','unique:users','min:16','max:16'],
            'nama' => ['required', 'string'],
            'username' => ['required', 'max:255','unique:users'],
            'telp' => ['required', 'max:255'],
            'alamat' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        
        // save into table 
        $user = User::create([
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'username'=>$request->username,
            'telp'=>$request->telp,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'level'=>'masyarakat',
            'password'=>bcrypt($request->password),
        ]);   
        return redirect('/login')->with('alert','Pendaftaraan berhasil, Silahkan login.');
       
    }
}

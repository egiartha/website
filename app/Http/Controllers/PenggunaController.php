<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use App\Pengguna;
use App\Telepon;
class PenggunaController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('level','masyarakat')->get();
        return view('pengguna.index',compact('users'));
    }
    public function lihat($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        return view('pengguna.lihat', compact('users'));
    }
    public function edit($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        return view('pengguna.edit', compact('users'));
    }

    public function update(Request $request)
    {
    
        $validator = Validator::make($request->all(), [
            'nik'=> ['required','min:16','max:16','unique:users,nik,'.$request->id],
            'nama'=>['required','string'],
            'username'=>['required','string','unique:users,username,'.$request->id],
            'telp'=> ['required'],
            'email'=>['required','string','unique:users,email,'.$request->id],
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrorMessage('Gagal Mengubah Data')->withErrors($validator)->withInput();
        }
        // save into table 
        $user = DB::table('users')->where('id',$request->id)->update([
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'username'=>$request->username,
            'telp'=>$request->telp,
            'email'=>$request->email,
        ]);   
        return redirect('/masyarakat')->withSuccessMessage('Data Berhasil Diubah');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'username' => ['required', 'max:255','unique:users'],
            'telp' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrorMessage('Gagal Menambah Data')->withErrors($validator)->withInput();
         }
        // save into table 
        $user = User::create([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'telp'=>$request->telp,
            'email'=>$request->email,
            'level'=>$request->level,
            'password'=>bcrypt($request->password),
        ]);   
        return redirect()->back()->withSuccessMessage('Data Berhasil Ditambahkan');
    }
    public function hapus($id)
    {
        $users = DB::table('users')->where('id',$id)->delete();
        return redirect()->back()->withSuccessMessage('Data Berhasil Dihapus');
    }


}

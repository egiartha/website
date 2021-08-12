<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Validator;
class PetugasController extends Controller
{
    
    public function index()
    {
        $users = DB::table('users')->where('level','!=','masyarakat')->get();
        return view('petugas.index',compact('users'));
    }
    public function lihat($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        return view('petugas.lihat', compact('users'));
    }
    public function edit($id)
    {
        $users = DB::table('users')->where('id',$id)->get();
        return view('petugas.edit', compact('users'));
    }

    public function update(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'username' => ['required', 'max:255','unique:users,username,'.$request->id],
            'telp' => ['required', 'max:255'],
            'level' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrorMessage('Gagal Menambah Data')->withErrors($validator)->withInput();
        }
        
        // Update table
        $user = DB::table('users')->where('id',$request->id)->update([
            'nama'=>$request->nama,
            'username'=>$request->username,
            'telp'=>$request->telp,
            'email'=>$request->email,
            'level'=>$request->level,
        ]);   
        return redirect('/petugas')->withSuccessMessage('Data Berhasil Diubah');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'username' => ['required', 'max:255','unique:users'],
            'telp' => ['required', 'max:255'],
            'alamat' => ['required'],
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
            'alamat'=>$request->alamat,
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

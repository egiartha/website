<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

use PDF;
use Hash;
class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('masyarakat');
    }
    public function profil()
    {
        return view('lapor.profil');
    }
    public function profil_foto_ubah(Request $request)
    {
        $cekfoto = Validator::make($request->all(), [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:10000',
        ]);
        if ($cekfoto->fails()) {
            return redirect()->back()->withErrorMessage('Gagal upload gambar, file harus berbentuk jpg');
        }

        $foto = $request->file('foto');
        $size = $foto->getSize();
        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        $tujuan_upload_foto = 'database/foto_profil';
        $foto->move($tujuan_upload_foto, $nama_foto);

     
        $isi = DB::table("users")->where('id',$request->id)->update([
            'foto_profil' => $nama_foto
        ]);
        Alert::success('Sukses', 'Foto berhasil diubah');
        return redirect()->back()->withSuccessMessage('Gambar berhasil di ubah');
    }

    public function profil_ubah_data(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'nik'=> ['required','min:16','max:16','unique:users,nik,'.$request->id],
           'nama'=>['required'],
           'telp'=>['required'],
           'alamat'=>['required'],
           'username'=>['required','unique:users,username,'.$request->id],
           'email'=>['required','unique:users,email,'.$request->id]
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrorMessage('Gagal Mengubah Data')->withErrors($validator)->withInput();
        }

        DB::table('users')->where('id',$request->id)->update([
            'nik'=>$request->nik,
            'nama'=>$request->nama,
            'telp'=>$request->telp,
            'alamat'=>$request->alamat,
            'username'=>$request->username,
            'email'=>$request->email,
        ]);
        Alert::success('Sukses', 'Identitas berhasil diubah');
        return redirect()->back()->withSuccessMessage('Data berhasil diubah');
    }

    public function profil_foto_hapus($id)
    {
        DB::table('users')->where('id',$id)->update([
            'foto_profil'=>'0'
        ]);
     
        return redirect()->back()->withSuccessMessage("Foto profil berhasil dihapus");
    }

    public function ubah_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password'=> ['required','string','confirmed'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrorMessage('Gagal Mengubah Password')->withErrors($validator)->withInput();
        }
        $user = DB::table('users')->where('id',$request->id)->first();
        if(Hash::check($request->password_lama, $user->password))
        {
            DB::table('users')->where('id',$request->id)->update([
                'password'=> Hash::make($request->password)
            ]);
            Alert::success('Sukses', 'Password berhasil diubah');
            return redirect()->back()->withSuccessMessage('Password Berhasil Diubah');
        }
        else{
            Alert::success('Gagal', 'Password lama yang Anda masukkan salah');
            return redirect()->back()->withErrorMessage('Gagal, password lama yang Anda masukkan salah');
        }
    }
}


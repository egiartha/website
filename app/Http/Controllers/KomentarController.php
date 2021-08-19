<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Komentar;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class komentarController extends Controller
{
    public function store(Request $request)
    {
        $eksis = Komentar::where([['user_id', Auth::user()->id], ['id_pengaduan', $request->id_pengaduan]])->get();

        if (count($eksis) >= 3) {
            return redirect()->back();
        }

        Komentar::create([
            'user_id' => Auth::user()->id,
            'komentar' => $request->komentar,
            'created_at' => date('Y-m-d H:i:s'),
            'id_pengaduan' => $request->id_pengaduan
        ]);

        DB::table('notifikasi')->insert([
            'deskripsi' => "Komentar dari " . Auth::user()->nama,
            'id_pengaduan' => $request->id_pengaduan,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Alert::success('Sukses', 'Komentar Berhasil Ditambahkan');

        return redirect()->back();
    }
}

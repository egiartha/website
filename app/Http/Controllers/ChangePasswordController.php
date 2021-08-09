<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Validator;

class ChangePasswordController extends Controller
{
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrorMessage('Gagal Mengganti Password')->withErrors($validator)->withInput();
        }
        DB::table('users')->where('id',Auth()->user()->id)->update([
            'password'=> Hash::make($request->new_password)
        ]);
        return redirect()->back()->withSuccessMessage('Password Berhasil Diubah');
    }
}

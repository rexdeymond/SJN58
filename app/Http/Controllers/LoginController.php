<?php

namespace App\Http\Controllers;

use App\Models\M_akse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'noid' => ['required'],
            'sandi' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/office');
        }

        return back()->session()->flash('message', 'Login gagal');
    }

    /*public function index()
    {
        return view('/login');
    }

    function login(Request $request)
    {
        $credentials = $request->validate([
            'noid' => ['required'],
            'password' => ['required']
        ],[
            'noid' => 'Nomor ID wajib diisi',
            'password' => 'Password login wajib diisi',
        ]);

        $infologin =[
            'noid' => $request->noid,
            'password' => $request->sandi
        ];
        if(Auth::attempt($infologin)){
            //kalau berhasil
            dd ('scs');
        } else {
            // kalau gagal
            dd ('ggl');
        }
    }*/
}

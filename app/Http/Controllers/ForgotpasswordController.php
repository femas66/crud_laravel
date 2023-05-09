<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ForgotpasswordController extends Controller
{
    function index() {
        return view('auth.forgot-password');
    }
    function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $email = User::where('email', $request->input('email'))->get();
        if (count($email) > 0) {
            $id = User::where('email', $request->input('email'))->first()->id;
            User::find($id)->update(['password' => Hash::make($request->input('password'))]);
            return redirect()->route('login')->with('success', 'Berhasil mereset password');
        } else {
            return back()->with('msg', 'Email tidak ditemukan');
        }
    }
}

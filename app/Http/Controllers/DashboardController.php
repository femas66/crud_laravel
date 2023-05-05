<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $wargas = Warga::all();
        return view('dashboard', compact('wargas'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('l', 'Berhasil logout');
    }
    public function tambahwarga()
    {
        return view('tambah_warga');
    }
    public function actiontambahwarga(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100|min:3',
            'foto' => 'required|mimes:jpg,jpeg,png',
            'nikah' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required'
        ]);
        $file = $request->file('foto');
        $name = $file->hashName();
        $data['foto'] = $name;
        $file->move(public_path('img'), $name);
        $data['tanggal_lahir'] = date('d-m-Y', strtotime($request->input('tanggal_lahir')));
        Warga::create($data);
        return redirect()->route('dashboard')->with('tambah', 'tambah');
    }
    public function editwarga(Warga $id)
    {
        $warga = $id;
        return view('edit_warga', compact('warga'));
    }
    public function actioneditwarga(Request $re)
    {
        $data = [];
        if ($re->has('foto')) {
            $data = $re->validate([
                'nama' => 'required|max:100|min:3',
                'foto' => 'required|mimes:jpeg,png,jpg',
                'nikah' => 'required',
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required'
            ]);
            $a = Warga::find($re->id);
            if (File::exists(public_path('img/' . $a->foto))) {
                unlink(public_path('img/' . $a->foto));
            }
            $file = $re->file('foto');
            $name = $file->hashName();
            $data['foto'] = $name;
            $file->move(public_path('img'), $name);
        } else {
            $data = $re->validate([
                'nama' => 'required|max:255|min:3',
                'nikah' => 'required',
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required'
            ]);
        }
        $data['tanggal_lahir'] = date('d-m-Y', strtotime($re->input('tanggal_lahir')));
        $warga = Warga::find($re->id);
        $warga->update($data);
        return redirect('/dashboard')->with('update', 'Berhasil update');
    }
    public function hapuswarga($id)
    {
        if (Warga::where('id', $id)->count() > 0) {
            $data = Warga::find($id);
            if (File::exists(public_path('img/' . $data->foto))) {
                unlink(public_path('img/' . $data->foto));
            }
            $data->delete();
            return redirect()->route('dashboard');
        }
        return redirect()->route('dashboard');
    }
    public function detail(Warga $id)
    {
        $warga = $id;
        return view('detail', compact('warga'));
    }
}

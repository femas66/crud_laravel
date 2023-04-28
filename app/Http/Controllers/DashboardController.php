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
        return redirect()->route('login');
    }
    public function tambahwarga() {
        return view('tambah_warga');
    }
    public function actiontambahwarga(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            'nama' => 'required',
            'foto' => 'required',
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
        return redirect()->route('dashboard');
    }
    public function editwarga($id)
    {
        $warga = Warga::find($id);
        return view('edit_warga', compact('warga'));
    }
    public function actioneditwarga(Request $re)
    {
        // dd($re->all());
        $data = [];
        if ($re->has('foto')) {
            
            $data = $re->validate([
                'nama' => 'max:255',
                'foto' => 'mimes:jpeg,png,jpg',
                'nikah' => 'max:255',
                'jenis_kelamin' => 'max:255',
                'tanggal_lahir' => 'max:255'
            ]);
            $a = Warga::find($re->id);
            if (File::exists(public_path('img/' . $a->foto))) {
                unlink(public_path('img/' . $a->foto));
            }
            $file = $re->file('foto');
            $name = $file->hashName();
            $data['foto'] = $name;
            $file->move(public_path('img'), $name);
        }
        else {
            
            $data = $re->validate([
                'nama' => 'max:255',
                'nikah' => 'max:255',
                'jenis_kelamin' => 'max:255',
                'tanggal_lahir' => 'max:255'
            ]);
            
        }
        
       
        $data['tanggal_lahir'] = date('d-m-Y', strtotime($re->input('tanggal_lahir')));
        $warga = Warga::find($re->id);
        $warga->update($data);
        return redirect('/dashboard')->with('msg', 'Berhasil update');
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
}

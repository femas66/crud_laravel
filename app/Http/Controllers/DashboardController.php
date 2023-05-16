<?php

namespace App\Http\Controllers;

use App\Models\AgamaWarga;
use App\Models\PekerjaanWarga;
use App\Models\Warga;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    function cari($tabel, $yangdicari = "") {
        session(['search' => $yangdicari]);
        switch ($tabel) {
            case 'warga':
                if ($yangdicari == "") {
                    return json_encode(Warga::all());
                } else {
                    return json_encode(Warga::where('nama', 'like', '%' . $yangdicari . '%')->get());
                }
                break;
            case 'pekerjaan':
                if ($yangdicari == "") {
                    return json_encode(PekerjaanWarga::all());
                } else {
                    return json_encode(PekerjaanWarga::where('pekerjaan', 'like', '%' . $yangdicari . '%')->get());

                }
                break;
            case 'agama':
                if ($yangdicari == "") {
                    return json_encode(AgamaWarga::all());
                }
                else {
                    return json_encode(AgamaWarga::where('agama_sekarang', 'like', '%' . $yangdicari . '%')->get());
                }
                break;
            default:
                return json_encode('Tidak ditemukan');
                break;
        }
    }
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $wargas = Warga::where('nama', 'LIKE', '%' . $request->get('search') . '%')->paginate(5);
            $wargas->appends(['search' => $request->search]);
            session(['search' => $request->search]);
            return view('dashboard', compact('wargas'));
        }
        $wargas = Warga::paginate(5);
        return view('dashboard', compact('wargas'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('l', 'Berhasil logout');
    }
    public function tambahwarga()
    {
        return view('tambah_warga');
    }
    public function actiontambahwarga(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100|min:3|alpha_spaces',
            'foto' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'nik' => 'required|unique:warga,nik|numeric|digits_between:10,9999999999|',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date|after:1900-01-01|before:2023-05-05'
        ],[
            'nik.digits_between' => 'NIK minimal 10 digit',
            'nama.alpha_spaces' => 'Nama tidak boleh ada angka',
            'foto.max' => 'Maksimal 5MB',
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
                'nama' => 'required|max:100|min:3|alpha_spaces',
                'foto' => 'required|mimes:jpeg,png,jpg|max:5120',
                'nik' => 'required|numeric|digits_between:10,9999999999|unique:warga,nik,' . $re->id,
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date|after:1900-01-01|before:2023-05-05',
            ],[
                'nik.digits_between' => 'NIK minimal 10 digit',
                'nama.alpha_spaces' => 'Nama tidak boleh ada angka',
                'foto.max' => 'Maksimal 5MB'
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
                'nama' => 'required|max:255|min:3|alpha_spaces',
                'nik' => 'required|digits_between:10,9999999999|unique:warga,nik,' . $re->id,
                'jenis_kelamin' => 'required',
                'tanggal_lahir' => 'required|date|after:1900-01-01|before:2023-05-05',
            ], [
                'nama.alpha_spaces' => 'Nama tidak boleh ada angka',
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
            try {
                $data = Warga::find($id);
                $data->delete();
                if (File::exists(public_path('img/' . $data->foto))) {
                    unlink(public_path('img/' . $data->foto));
                }
                return redirect()->route('dashboard');
            } catch (QueryException $e) {
                return back()->withErrors(['errorrestrict' => 'Data masih digunakan']);
            }
            
        }
        return redirect()->route('dashboard');
    }
    public function detail(Warga $id)
    {
        $warga = $id;
        return view('detail', compact('warga'));
    }
    public function nik(Warga $nik) {
        return json_encode($nik);
    }
}

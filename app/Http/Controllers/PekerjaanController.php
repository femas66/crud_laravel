<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $keyword = $request->search;
            $pekerjaans = PekerjaanWarga::whereHas('warga', function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', '%'.$keyword.'%');
            })->paginate(5);
            $pekerjaans->appends(['search' => $keyword]);
            session(['search' => $request->search]);
            return view('pekerjaan.index', compact('pekerjaans'));

            // $pekerjaans = PekerjaanWarga::where('warga_id', $id)->paginate(5);
            // $pekerjaans->appends(['search' => $request->search]);
            // session(['search' => $request->search]);
            // return view('pekerjaan.index', compact('pekerjaans'));
        }
        $pekerjaans = PekerjaanWarga::paginate(5);
        return view('pekerjaan.index', compact('pekerjaans'));
    }
    public function create()
    {
        $wargas = Warga::all();
        return view('pekerjaan.create', compact('wargas'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'warga_id' => 'required',
            'pekerjaan' => 'required|min:3|alpha_spaces',
            'alamat' => 'required|min:5',
            'gaji' => 'required|numeric'
        ], [
            'warga_id.required' => 'Belum ada data warga'
        ]);
        PekerjaanWarga::create($data);
        return redirect()->route('pekerjaan.index')->with('tambah', 'tambah');
    }
    public function edit($id)
    {
        $pekerjaan = PekerjaanWarga::find($id);
        $wargas = Warga::all();
        return view('pekerjaan.edit', compact('pekerjaan', 'wargas'));
    }
    public function update(Request $request, $id)
    {
        
        $data = $request->validate([
            'warga_id' => 'required',
            'pekerjaan' => 'required|min:3|alpha_spaces',
            'alamat' => 'required|min:5',
            'gaji' => 'required|numeric'
        ]);
        PekerjaanWarga::find($id)->update($data);
        return redirect()->route('pekerjaan.index')->with('update', 'update');
    }
    public function delete(Request $request, $id)
    {
        PekerjaanWarga::find($id)->delete();
        return redirect()->route('pekerjaan.index');
    }
}

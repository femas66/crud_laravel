<?php

namespace App\Http\Controllers;

use App\Models\AgamaWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    function index(Request $request) {
        
        if($request->has('search')) {
            $keyword = $request->search;
            $jobs = AgamaWarga::whereHas('warga', function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', '%'.$keyword.'%');
            })->paginate(5);
            $jobs->appends(['search' => $keyword]);
            session(['search' => $request->search]);
            return view('agama.index', ['agamas' => $jobs]);
        }
        $agamas = AgamaWarga::paginate(5);
        return view('agama.index', compact('agamas'));
    }
    function create() {
        $wargas = Warga::all();
        return view('agama.create', compact('wargas'));
    }
    function store(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required|unique:agama_warga,warga_id',
            'agama_sekarang' => 'required'
        ], [
            'warga_id.unique' => 'Nama sudah digunakan'
        ]);
        AgamaWarga::create($data);
        return redirect()->route('agama.index')->with('tambah', 'tambah');
    }
    function edit($id) {
        $wargas = Warga::all();
        $agama = AgamaWarga::find($id);
        return view('agama.edit', compact('agama', 'wargas'));
    }
    function update(Request $request, $id) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required|unique:agama_warga,warga_id,' . $id,
            'agama_sekarang' => 'required'
        ], [
            'warga_id.unique' => 'Nama sudah digunakan'
        ]);
        AgamaWarga::find($id)->update($data);
        return redirect()->route('agama.index')->with('update', 'update');
    }
    function delete($id) {
        AgamaWarga::find($id)->delete();
        return redirect()->route('agama.index')->with('msg', 'Berhasil hapus data');
    }
}

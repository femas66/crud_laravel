<?php

namespace App\Http\Controllers;

use App\Models\AgamaWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class AgamaController extends Controller
{
    function index() {
        $agamas = AgamaWarga::all();
        return view('agama.index', compact('agamas'));
    }
    function create() {
        $wargas = Warga::all();
        return view('agama.create', compact('wargas'));
    }
    function store(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'agama_sebelumnya' => 'required',
            'agama_sekarang' => 'required'
        ]);
        AgamaWarga::create($data);
        return redirect()->route('agama.index');
    }
    function edit($id) {
        $wargas = Warga::all();
        $agama = AgamaWarga::find($id);
        return view('agama.edit', compact('agama', 'wargas'));
    }
    function update(Request $request, $id) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'agama_sebelumnya' => 'required',
            'agama_sekarang' => 'required'
        ]);
        AgamaWarga::find($id)->update($data);
        return redirect()->route('agama.index');
    }
    function delete($id) {
        AgamaWarga::find($id)->delete();
        return redirect()->route('agama.index')->with('msg', 'Berhasil hapus data');
    }
}

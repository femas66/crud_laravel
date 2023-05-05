<?php

namespace App\Http\Controllers;

use App\Models\HobiWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    function index() {
        $hobis = HobiWarga::all();
        return view('hobi.index', compact('hobis'));
    }
    function create() {
        $wargas = Warga::all();
        return view('hobi.create', compact('wargas'));
    }
    function store(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'hobi' => 'required'
        ], [
            'warga_id.required' => 'Belum ada data warga'
        ]);
        HobiWarga::create($data);
        return redirect()->route('hobi.index')->with('tambah', 'tambah');
    }
    function edit($id) {
        $wargas = Warga::all();
        $hobi = HobiWarga::find($id);
        return view('hobi.edit', compact('hobi', 'wargas'));
    }
    function update(Request $request, HobiWarga $id) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'hobi' => 'required'
        ], [
            'warga_id.required' => 'Belum ada data warga'
        ]);
        $id->update($data);
        return redirect()->route('hobi.index')->with('update', 'data berhail di perbarui');
    }
    function delete(HobiWarga $id) {
        
        $id->delete();
        return redirect()->route('hobi.index')->with('msg', 'Berhasil hapus data');
    }
}

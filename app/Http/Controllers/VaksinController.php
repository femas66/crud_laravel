<?php

namespace App\Http\Controllers;

use App\Models\VaksinWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    function index(Request $request) {
        if ($request->has('search')) {
            $vaksins = VaksinWarga::where('vaksin', 'LIKE', $request->get('search'))->paginate(5);
            $vaksins->appends(['search' => $request->search]);
            session(['search' => $request->search]);
            return view('vaksin.index', compact('vaksins'));
        }
        $vaksins = VaksinWarga::paginate(5);
        return view('vaksin.index', compact('vaksins'));
    }
    function create() {
        $wargas = Warga::all();
        return view('vaksin.create', compact('wargas'));
    }
    function store(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required|unique:vaksin_warga,warga_id',
            'vaksin' => 'required'
        ], [
            'warga_id.unique' => 'Nama warga sudah digunakan'
        ]);
        
        VaksinWarga::create($data);
        return redirect()->route('vaksin.index')->with('tambah', 'tambah');
    }
    function edit($id) {
        $wargas = Warga::all();
        $vaksin = VaksinWarga::find($id);
        return view('vaksin.edit', compact('vaksin', 'wargas'));
    }
    function update(Request $request, $id) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required|unique:vaksin_warga,warga_id,' . $id,
            'vaksin' => 'required'
        ], [
            'warga_id.unique' => 'Nama warga sudah digunakan'
        ]);
        VaksinWarga::find($id)->update($data);
        return redirect()->route('vaksin.index')->with('update', 'update');
    }
    function delete($id) {
        VaksinWarga::find($id)->delete();
        return redirect()->route('vaksin.index')->with('msg', 'Berhasil hapus data');
    }
}

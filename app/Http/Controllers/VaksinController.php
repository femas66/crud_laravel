<?php

namespace App\Http\Controllers;

use App\Models\VaksinWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    function index() {
        $vaksins = VaksinWarga::all();
        return view('vaksin.index', compact('vaksins'));
    }
    function create() {
        $wargas = Warga::all();
        return view('vaksin.create', compact('wargas'));
    }
    function store(Request $request) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'nik' => 'required|unique:vaksin_warga',
            'vaksin' => 'required'
        ]);
        
        VaksinWarga::create($data);
        return redirect()->route('vaksin.index');
    }
    function edit($id) {
        $wargas = Warga::all();
        $vaksin = VaksinWarga::find($id);
        return view('vaksin.edit', compact('vaksin', 'wargas'));
    }
    function update(Request $request, $id) {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'nik' => 'required|unique:vaksin_warga',
            'vaksin' => 'required'
        ]);
        VaksinWarga::find($id)->update($data);
        return redirect()->route('vaksin.index');
    }
    function delete($id) {
        VaksinWarga::find($id)->delete();
        return redirect()->route('vaksin.index')->with('msg', 'Berhasil hapus data');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanWarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        $pekerjaans = PekerjaanWarga::all();
        return view('pekerjaan.index', compact('pekerjaans'));
    }
    public function create()
    {
        $wargas = Warga::all();
        return view('pekerjaan.create', compact('wargas'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'gaji' => 'required'
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
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'gaji' => 'required'
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

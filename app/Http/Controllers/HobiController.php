<?php

namespace App\Http\Controllers;

use App\Models\HobiWarga;
use App\Models\Warga;
use Exception;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    function index(Request $request)
    {
        if ($request->has('search')) {
            $keyword = $request->search;
            $jobs = HobiWarga::whereHas('warga', function ($query) use ($keyword) {
                $query->where('nama', 'LIKE', '%'.$keyword.'%');
            })->paginate(5);
            $jobs->appends(['search' => $keyword]);
            session(['search' => $request->search]);
            return view('hobi.index', ['hobis' => $jobs]);
        }
        $hobis = HobiWarga::paginate(5);
        return view('hobi.index', compact('hobis'));
    }
    function create()
    {
        $wargas = Warga::all();
        return view('hobi.create', compact('wargas'));
    }
    function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'hobi' => 'required|min:3|alpha_spaces'
        ], [
            'warga_id.required' => 'Belum ada data warga'
        ]);
        HobiWarga::create($data);
        return redirect()->route('hobi.index')->with('tambah', 'tambah');
    }
    function edit($id)
    {
        $wargas = Warga::all();
        $hobi = HobiWarga::find($id);
        return view('hobi.edit', compact('hobi', 'wargas'));
    }
    function update(Request $request, HobiWarga $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'warga_id' => 'required',
            'hobi' => 'required|min:3|alpha_spaces'
        ], [
            'warga_id.required' => 'Belum ada data warga'
        ]);
        $id->update($data);
        return redirect()->route('hobi.index')->with('update', 'data berhail di perbarui');
    }
    function delete(HobiWarga $id)
    {
        // dd($id);
        $id->delete();
        return redirect()->route('hobi.index')->with('msg', 'Berhasil hapus data');
    }
}

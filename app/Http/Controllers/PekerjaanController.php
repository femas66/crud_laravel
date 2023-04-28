<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PekerjaanController extends Controller
{
    public function index()
    {
        return view('pekerjaan.index');
    }
    public function create()
    {
        return view('pekerjaan.create');
    }
    public function store(Request $request)
    {
        
    }
    public function edit($id)
    {
        return view('pekerjaan.edit');
    }
    public function update(Request $request, $id)
    {
        
    }
    public function delete(Request $request, $id)
    {
        
    }
}

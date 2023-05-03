@extends('layout.form')
@section('body')
@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="alert alert-warning" role="alert">
      {{ $error }}
    </div>
    @endforeach
@endif
<div class="container">
<h3>Tambah data</h3><hr>
<form action="{{ route('agama.store') }}" method="post">
  @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <select class="form-select" aria-label="Default select example" name="warga_id">
        @foreach ($wargas as $warga)
            <option value="{{ $warga->id }}">{{ $warga->nama }}</option>
        @endforeach
      </select>
    </div>
    <label for="a" class="form-label">Agama sekarang</label>
    <select class="form-select" aria-label="Default select example" id="a" name="agama_sekarang">
      <option selected value="islam">Islam</option>
      <option value="kristen">Kristen</option>
      <option value="hindu">Hindu</option>
      <option value="budha">Budha</option>
      <option value="konghucu">Konghucu</option>
    </select>
    <label for="a" class="form-label">Agama sebelumnya</label>
    <select class="form-select" aria-label="Default select example" id="a" name="agama_sebelumnya">
      <option selected value="islam">Islam</option>
      <option value="kristen">Kristen</option>
      <option value="hindu">Hindu</option>
      <option value="budha">Budha</option>
      <option value="konghucu">Konghucu</option>
    </select>
    
    <hr>
    <div class="mb-3">
    <button type="submit" name="submit" class="btn" style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </form>
</div>
@endsection
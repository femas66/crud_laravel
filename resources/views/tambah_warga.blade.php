@extends('layout.form')
@section('body')
@if ($errors->any())
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  <ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
  </ul>
</div>
@endif
  <div class="container">
    <h3>Tambah data</h3>
    <hr>
    <form action="{{ route('actiontambahwarga') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama lengkap</label>
        <input type="text" name="nama" placeholder="Nama" class="form-control" id="nama" value="{{ old('nama') }}">
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
      </div>
      <div class="mb-3">
        <label for="nik" class="form-label">NIK</label>
        <input type="number" name="nik" placeholder="NIK" class="form-control" id="nik" value="{{ old('nik') }}">
      </div>
      <hr>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="L" {{ (old('jenis_kelamin') == 'L') ? "checked" : "" }}>
        <label class="form-check-label" for="flexRadioDefault1">
          Laki Laki
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="P" {{ (old('jenis_kelamin') == 'P') ? "checked" : "" }}>
        <label class="form-check-label" for="flexRadioDefault2">
          Perempuan
        </label>
      </div>
      <hr>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal" value="{{ old('tanggal_lahir') }}">
      </div>
      <div class="mb-3">
        <button type="submit" name="submit" class="btn"
          style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
            class="fa-solid fa-plus"></i> Tambah</button>
      </div>
    </form>
  </div>
@endsection
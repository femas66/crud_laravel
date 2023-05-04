@extends('layout.form')
@section('body')
@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
  {{ $error }}
</div>
@endforeach
@endif
  <div class="container">
    <h3>Tambah data</h3>
    <hr>
    <form action="{{ route('actiontambahwarga') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama lengkap</label>
        <input type="text" name="nama" placeholder="Nama" class="form-control" id="nama">
      </div>
      <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
      </div>
      <hr>
      <div class="form-check">
        <label for="lbb">Sudah nikah</label>
        <input type="radio" name="nikah" id="lbb" value="Y" class="form-check-input">
      </div>
      <div class="form-check">
        <label for="pbb">Belum nikah</label>
        <input type="radio" name="nikah" id="pbb" value="N" class="form-check-input">
      </div>
      <hr>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="L">
        <label class="form-check-label" for="flexRadioDefault1">
          Laki Laki
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="P">
        <label class="form-check-label" for="flexRadioDefault2">
          Perempuan
        </label>
      </div>
      <hr>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal lahir</label>
        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal" data-date-format="DD MMMM YYYY">
      </div>
      <div class="mb-3">
        <button type="submit" name="submit" class="btn"
          style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
            class="fa-solid fa-plus"></i> Tambah</button>
      </div>
    </form>
  </div>
@endsection
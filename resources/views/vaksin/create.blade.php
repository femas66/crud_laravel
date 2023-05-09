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
  <form action="{{ route('vaksin.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      @if (count($wargas) == 0)
        <select class="form-select" aria-label="Default select example">
          <option>Tidak ada warga</option>
        </select>
        <small><a href="{{ route('tambahwarga') }}">Tambah warga</a></small>
      @else
        <select class="form-select" aria-label="Default select example" name="warga_id">
          @foreach ($wargas as $warga)
          <option value="{{ $warga->id }}" title="{{ ($warga->jenis_kelamin == 'L') ? "Laki laki" : "Perempuan" }} | {{ $warga->tanggal_lahir }} | {{ ($warga->nikah == 'Y') ? "Sudah nikah" : "Belum nikah" }}">{{ $warga->nama }}</option>
          @endforeach
        </select>
      @endif
    </div>
    <div class="mb-3">
      <label for="jb" class="form-label">Usia</label>
      <input type="number" name="usia" placeholder="Usia" class="form-control" id="jb">
    </div>
    <div class="mb-3">
      <label for="jb" class="form-label">NIK</label>
      <input type="number" name="nik" placeholder="Nik" class="form-control" id="jb">
    </div>
    <hr>
    <div class="form-check">
      <label for="l">Sudah vaksin</label>
      <input type="radio" name="vaksin" id="l" value="Y" class="form-check-input">
    </div>
    <div class="form-check">
      <label for="p">Belum vaksin</label>
      <input type="radio" name="vaksin" id="p" value="N" class="form-check-input">
    </div>
    <hr>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn"
        style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
          class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </form>
</div>
@endsection
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
<form action="{{ route('vaksin.store') }}" method="post">
  @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <select class="form-select" aria-label="Default select example" name="warga_id">
        @foreach ($wargas as $warga)
            <option value="{{ $warga->id }}">{{ $warga->nama }}</option>
        @endforeach
      </select>
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
    <button type="submit" name="submit" class="btn" style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </form>
</div>
@endsection
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
<h3>Edit data</h3><hr>
<form action="{{ route('vaksin.update', ['id' => $vaksin->id]) }}" method="post">
  @csrf
  @method("put")
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Warga</label>
      <select class="form-select" aria-label="Default select example" name="warga_id">
        @foreach ($wargas as $warga)
            <option value="{{ $warga->id }}" {{ ($warga->id == $vaksin->warga_id) ? "selected" : "" }}>{{ $warga->nama }}</option>
        @endforeach
        
      </select>
    </div>
    <div class="mb-3">
      <label for="jb" class="form-label">Usia</label>
      <input type="number" name="usia" placeholder="Usia" class="form-control" id="jb" value="{{ $vaksin->usia }}">
    </div>
    <div class="mb-3">
      <label for="jb" class="form-label">NIK</label>
      <input type="number" name="nik" placeholder="Nik" class="form-control" id="jb" value="{{ $vaksin->nik }}">
    </div>
    <hr>
    <div class="form-check">
      <label for="l">Sudah vaksin</label>
      <input type="radio" name="vaksin" id="l" value="Y" class="form-check-input" {{ ($vaksin->vaksin == 'Y') ? "checked" : "" }}>
    </div>
    <div class="form-check">
      <label for="p">Belum vaksin</label>
      <input type="radio" name="vaksin" id="l" value="Y" class="form-check-input" {{ ($vaksin->vaksin == 'N') ? "checked" : "" }}>
    </div>
    <hr>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn" style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i class="fa-solid fa-floppy-disk"></i>  Simpan</button>
    </div>
  </form>
</div>
@endsection
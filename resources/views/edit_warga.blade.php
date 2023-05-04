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
    <h3>Edit data</h3>
    <hr>
    <form action="{{ route('editwarga') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama lengkap</label>
        <input type="text" name="nama" placeholder="Nama" class="form-control" value="{{ $warga->nama }}" id="nama">
      </div>
      <div class="mb-3">
        <img src="/img/{{ $warga->foto }}" alt="" width="100" height="100">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
      </div>
      <hr><input type="hidden" name="id" value="{{ $warga->id }}">
      <div class="form-check">
        <label for="lbb">Sudah nikah</label>
        <input type="radio" name="nikah" id="lbb" value="Y" class="form-check-input" {{ $warga->nikah == 'Y' ? "checked"
        : "" }}>
      </div>
      <div class="form-check">
        <label for="pbb">Belum nikah</label>
        <input type="radio" name="nikah" id="pbb" value="N" class="form-check-input" {{ $warga->nikah == 'N' ? "checked"
        : "" }}>
      </div>
      <hr>
      <div class="form-check">
        <label for="l">Laki laki</label>
        <input type="radio" name="jenis_kelamin" id="l" value="L" class="form-check-input" {{ $warga->jenis_kelamin ==
        'L' ? "checked" : "" }}>
      </div>
      <div class="form-check">
        <label for="p">Perempuan</label>
        <input type="radio" name="jenis_kelamin" id="p" value="P" class="form-check-input" {{ $warga->jenis_kelamin ==
        'P' ? "checked" : "" }}>
      </div>
      <hr>
      <div class="mb-3">
        <label for="tgl" class="form-label">Tanggal lahir</label>
        <input type="date" name="tanggal_lahir" id="tgl" placeholder="Tanggal lahir" class="form-control"
          value="{{ date('Y-m-d', strtotime($warga->tanggal_lahir)) }}">
      </div>
      <div class="mb-3">
        <button type="submit" name="submit" class="btn"
          style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
            class="fa-solid fa-floppy-disk"></i> Simpan</button>
      </div>
    </form>
  </div>
@endsection
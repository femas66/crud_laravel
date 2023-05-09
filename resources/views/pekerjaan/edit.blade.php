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
  <h3>Edit data</h3>
  <hr>
  <form action="{{ route('pekerjaan.update', ['id' => $pekerjaan->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Warga</label>
      <select class="form-select" aria-label="Default select example" name="warga_id">
        @foreach ($wargas as $warga)
        <option value="{{ $warga->id }}" {{ ($warga->id == $pekerjaan->warga_id) ? "selected" : "" }} title="{{ ($warga->jenis_kelamin == 'L') ? "Laki laki" : "Perempuan" }} | {{ $warga->tanggal_lahir }} | {{ ($warga->nikah == 'Y') ? "Sudah nikah" : "Belum nikah" }}">{{ $warga->nama }}
        </option>
        @endforeach

      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Pekerjaan Warga</label>
      <input type="text" name="pekerjaan" class="form-control" id="tanggal" placeholder="Pekerjaan"
        value="{{ $pekerjaan->pekerjaan }}">
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Alamat</label>
      <input type="text" name="alamat" class="form-control" id="tanggal" placeholder="Alamat"
        value="{{ $pekerjaan->alamat }}">
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Gaji</label>
      <input type="number" name="gaji" class="form-control" id="tanggal" placeholder="Gaji"
        value="{{ $pekerjaan->gaji }}">
    </div>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn"
        style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
          class="fa-solid fa-floppy-disk"></i> Simpan</button>
    </div>
  </form>
</div>
@endsection
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
  <form action="{{ route('pekerjaan.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Warga</label>
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
      <label for="tanggal" class="form-label">Pekerjaan Warga</label>
      <input type="text" name="pekerjaan" class="form-control" id="tanggal" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}">
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Alamat pekerjaan</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ old('alamat') }}</textarea>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Gaji</label>
      <input type="number" name="gaji" class="form-control" id="tanggal" placeholder="Gaji"  value="{{ old('gaji') }}">
    </div>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn"
        style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
          class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </form>
</div>
@endsection
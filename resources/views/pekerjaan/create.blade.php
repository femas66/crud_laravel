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
  <form action="{{ route('pekerjaan.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Warga</label>
      <select class="form-select" aria-label="Default select example" name="warga_id">
        @foreach ($wargas as $warga)
        <option value="{{ $warga->id }}">{{ $warga->nama }}</option>
        @endforeach

      </select>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Pekerjaan Warga</label>
      <input type="text" name="pekerjaan" class="form-control" id="tanggal" placeholder="Pekerjaan">
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Alamat</label>
      <input type="text" name="alamat" class="form-control" id="tanggal" placeholder="Alamat">
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Gaji</label>
      <input type="number" name="gaji" class="form-control" id="tanggal" placeholder="Gaji">
    </div>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn"
        style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
          class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </form>
</div>
@endsection
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
  <form action="{{ route('hobi.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      @if (count($wargas) == 0)
        <select class="form-select" aria-label="Default select example">
          <option>Tidak ada warga</option>
        </select>
      @else
        <select class="form-select" aria-label="Default select example" name="warga_id">
          @foreach ($wargas as $warga)
          <option value="{{ $warga->id }}" title="{{ ($warga->jenis_kelamin == 'L') ? "Laki laki" : "Perempuan" }} | {{ $warga->tanggal_lahir }} | {{ ($warga->nikah == 'Y') ? "Sudah nikah" : "Belum nikah" }}">{{ $warga->nama }}</option>
          @endforeach
        </select>
      @endif
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Hobi" name="hobi">
      <label for="floatingInput">Hobi</label>
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
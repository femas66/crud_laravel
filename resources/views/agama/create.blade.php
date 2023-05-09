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
  <form action="{{ route('agama.store') }}" method="post">
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
    <label for="a" class="form-label">Agama sekarang</label>
    <select class="form-select" aria-label="Default select example" id="a" name="agama_sekarang">
      <option {{ (old('agama_sekarang') == 'islam') ? "selected" : "" }} value="islam">Islam</option>
      <option {{ (old('agama_sekarang') == 'kristen') ? "selected" : "" }} value="kristen">Kristen</option>
      <option {{ (old('agama_sekarang') == 'hindu') ? "selected" : "" }} value="hindu">Hindu</option>
      <option {{ (old('agama_sekarang') == 'budha') ? "selected" : "" }} value="budha">Budha</option>
      <option {{ (old('agama_sekarang') == 'konghucu') ? "selected" : "" }} value="konghucu">Konghucu</option>
    </select>

    <hr>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn"
        style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
          class="fa-solid fa-plus"></i> Tambah</button>
    </div>
  </form>
</div>
@endsection
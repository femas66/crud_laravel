@extends('layout.master')
@section('content')
    <form action="{{ route('actiontambahwarga') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="text" name="nama" id="" required>
      <input type="file" name="foto" id="" required>
      <hr>
      <input type="radio" name="nikah" id="" value="Y" id="ya">
      <label for="ya">Sudah</label>
      <input type="radio" name="nikah" id="" value="N" id="bl">
      <label for="bl">Belom</label>
      <hr>
      <input type="radio" name="jenis_kelamin" id="" value="L" id="ya">
      <label for="ya">Laki</label>
      <input type="radio" name="jenis_kelamin" id="" value="P" id="bl">
      <label for="bl">Perempuan</label>
      <hr>
      <input type="date" name="tanggal_lahir" id="" required>
      <button type="submit">Tambah</button>
    </form>
@endsection
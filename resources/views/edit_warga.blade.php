@extends('layout.master')
@section('content')
    <form action="{{ route('editwarga') }}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $warga->id }}">
      <input type="text" name="nama" id="" required value="{{ $warga->nama }}">
      <hr>
      <img src="/img/{{ $warga->foto }}" width="100" height="100" alt=""><br>
      <input type="file" name="foto" id="">
      <hr>
      <input type="radio" name="nikah" id="" value="Y" id="ya" {{ $warga->nikah == 'Y' ? "checked" : "" }}>
      <label for="ya">Sudah</label>
      <input type="radio" name="nikah" id="" value="N" id="bl" {{ $warga->nikah == 'N' ? "checked" : "" }}>
      <label for="bl">Belom</label>
      <hr>
      <input type="radio" name="jenis_kelamin" id="" value="L" id="ya" {{ $warga->jenis_kelamin == 'L' ? "checked" : "" }}>
      <label for="ya">Laki</label>
      <input type="radio" name="jenis_kelamin" id="" value="P" id="bl" {{ $warga->jenis_kelamin == 'P' ? "checked" : "" }}>
      <label for="bl">Perempuan</label>
      <hr>
      <input type="date" name="tanggal_lahir" id="" required value="{{ date('Y-m-d', strtotime($warga->tanggal_lahir)) }}">
    <button type="submit">Edit</button>
    </form>
@endsection
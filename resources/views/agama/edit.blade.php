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
    <form action="{{ route('agama.update', ['id' => $agama->id]) }}" method="post">
      @csrf
      @method("PUT")
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Warga</label>
        <select class="form-select" aria-label="Default select example" name="warga_id">
          @foreach ($wargas as $warga)
              <option value="{{ $warga->id }}" {{ ($warga->id == $agama->warga_id) ? "selected" : "" }}>{{ $warga->nama }}</option>
          @endforeach
        </select>
      </div>
      <label for="a" class="form-label">Agama sekarang</label>
      <select class="form-select" aria-label="Default select example" id="a" name="agama_sekarang">
        <option value="islam" {{ ($agama->agama_sekarang == 'islam') ? "selected" : "" }}>Islam</option>
        <option value="kristen" {{ ($agama->agama_sekarang == 'kristen') ? "selected" : "" }}>Kristen</option>
        <option value="hindu" {{ ($agama->agama_sekarang == 'hindu') ? "selected" : "" }}>Hindu</option>
        <option value="budha" {{ ($agama->agama_sekarang == 'budha') ? "selected" : "" }}>Budha</option>
        <option value="konghucu" {{ ($agama->agama_sekarang == 'konghucu') ? "selected" : "" }}>Konghucu</option>
      </select>
      <label for="a" class="form-label">Agama sebelumnya</label>
      <select class="form-select" aria-label="Default select example" id="a" name="agama_sebelumnya">
        <option value="islam" {{ ($agama->agama_sebelumnya == 'islam') ? "selected" : "" }}>Islam</option>
        <option value="kristen" {{ ($agama->agama_sebelumnya == 'kristen') ? "selected" : "" }}>Kristen</option>
        <option value="hindu" {{ ($agama->agama_sebelumnya == 'hindu') ? "selected" : "" }}>Hindu</option>
        <option value="budha" {{ ($agama->agama_sebelumnya == 'budha') ? "selected" : "" }}>Budha</option>
        <option value="konghucu" {{ ($agama->agama_sebelumnya == 'konghucu') ? "selected" : "" }}>Konghucu</option>
      </select>
      <hr>
      <div class="mb-3">
        <button type="submit" name="submit" class="btn" style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i class="fa-solid fa-floppy-disk"></i>  Simpan</button>
      </div>
    </form>
  </div>
@endsection
@extends('layout.form')
@section('body')
@endsection
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/formtambah/fonts/icomoon/style.css">
    <link rel="stylesheet" href="/formtambah/css/bootstrap.min.css">
    <link rel="stylesheet" href="/formtambah/css/style.css">
    <title>Contact Form #9</title>
  </head>
  <body>
    <div class="content">
      <div class="container">
        <div class="row align-items-stretch no-gutters contact-wrap">
          <div class="col-md-12">
            <div class="form h-100">
              <h3>Tambah data agama</h3>
              <form class="mb-5" action="{{ route('agama.store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12 form-group mb-3">
                    <label for="budget" class="col-form-label">Nama</label>
                    @if (count($wargas) == 0)
                    <select class="custom-select" id="budget">
                      <option>Tidak ada warga</option>
                    </select>
                    @else
                    <select class="custom-select" id="budget" name="warga_id">
                      @foreach ($wargas as $warga)
                      <option value="{{ $warga->id }}" {{ (old('warga_id') == $warga->id) ? "selected" : "" }} title="{{ ($warga->jenis_kelamin == 'L') ? "Laki laki" : "Perempuan" }} | {{ $warga->tanggal_lahir }} | {{ ($warga->nikah == 'Y') ? "Sudah nikah" : "Belum nikah" }}">{{ $warga->nama }}</option>
                      @endforeach
                    </select>
                    @endif
                  </div>
                  @error('warga_id')
                    <small style="color: red;">{{ $message }}</small>
                    <hr>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-md-12 form-group mb-3">
                    <select class="custom-select" id="budget" name="agama_sekarang">
                    <option {{ (old('agama_sekarang') == 'islam') ? "selected" : "" }} value="islam">Islam</option>
                    <option {{ (old('agama_sekarang') == 'kristen') ? "selected" : "" }} value="kristen">Kristen</option>
                    <option {{ (old('agama_sekarang') == 'hindu') ? "selected" : "" }} value="hindu">Hindu</option>
                    <option {{ (old('agama_sekarang') == 'budha') ? "selected" : "" }} value="budha">Budha</option>
                    <option {{ (old('agama_sekarang') == 'konghucu') ? "selected" : "" }} value="konghucu">Konghucu</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary rounded-0 py-2 px-4">Submit</button>
                    <span class="submitting"></span>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      <script src="/formtambah/js/jquery-3.3.1.min.js"></script>
      <script src="/formtambah/js/popper.min.js"></script>
      <script src="/formtambah/js/bootstrap.min.js"></script>
      <script src="/formtambah/js/jquery.validate.min.js"></script>
      <script src="/formtambah/js/main.js"></script>
  </body>
</html>
@extends('layout.form')
@section('body')
@endsection
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/formtambah/fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/formtambah/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="/formtambah/css/style.css">

    <title>Contact Form #9</title>
    <style>
      .alert {
        padding: 20px;
        background-color: #f44336; /* Red */
        color: white;
        margin-bottom: 15px;
      }
      
      /* The close button */
      .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
      }
      
      /* When moving the mouse over the close button */
      .closebtn:hover {
        color: black;
      }
      </style>
    </head>
    <body>
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
  <div class="content">
    
    <div class="container">
      <div class="row align-items-stretch no-gutters contact-wrap">
        <div class="col-md-12">
          <div class="form h-100">
            <h3>Tambah warga</h3>
            <form class="mb-5" action="{{ route('editwarga') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="" class="col-form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" id="name" placeholder="Nama" value="{{ $warga->nama }}">
                  @error('nama')
                    <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="nik" class="col-form-label">NIK</label>
                  <input type="text" class="form-control" name="nik" id="nik"  placeholder="NIK" value="{{ $warga->nik }}">
                  @error('nik')
                    <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group mb-3">
                  <label for="foto" class="col-form-label">Foto</label><br>
                  <img src="/img/{{ $warga->foto }}" alt="" srcset="" width="80" height="80">
                  <input type="file" class="form-control" name="foto" id="foto">
                  @error('foto')
                      <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
                <div class="col-md-6 form-group mb-3">
                  <label for="tgl" class="col-form-label">Tanggal lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tgl"  value="{{ date('Y-m-d', strtotime($warga->tanggal_lahir)) }}">
                  @error('tanggal_lahir')
                    <small style="color: red;">{{ $message }}</small>
                  @enderror
                </div>
                
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="L" {{ $warga->jenis_kelamin == 'L' ? "checked" : "" }}>
                <label class="form-check-label" for="flexRadioDefault1">
                  Laki Laki
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="P" {{ $warga->jenis_kelamin == 'P' ? "checked" : "" }}>
                <label class="form-check-label" for="flexRadioDefault2">
                  Perempuan
                </label>
              </div>
              @error('jenis_kelamin')
                  <small style="color: red;">{{ $message }}</small>
              @enderror
              <hr>
              <div class="row">
                <div class="col-md-12 form-group">
                  <button type="submit" class="btn btn-primary rounded-0 py-2 px-4">Submit</button>
                  <span class="submitting"></span>
                </div>
                <input type="hidden" name="id" value="{{ $warga->id }}">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>
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
    <style>
      .alert {
        padding: 20px;
        background-color: #ff1100; /* Red */
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
    <body style="background: #37306B;">
      <div class="container">
        <div class="row align-items-stretch no-gutters contact-wrap">
          <div class="col-md-12">
            <div class="form h-100">
              <h3>Tambah data hobi</h3>
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
              <form class="mb-5" action="{{ route('pekerjaan.update', ['id' => $pekerjaan->id]) }}" method="post">
                @method('PUT')
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
                      <option value="{{ $warga->id }}" title="{{ ($warga->jenis_kelamin == 'L') ? "Laki laki" : "Perempuan" }} | {{ $warga->tanggal_lahir }} | {{ ($warga->nikah == 'Y') ? "Sudah nikah" : "Belum nikah" }}" {{ ($warga->id == $pekerjaan->warga_id) ? "selected" : "" }}>{{ $warga->nama }}</option>
                      @endforeach
                    </select>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group mb-3">
                    <label for="nik" class="col-form-label">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="nik"  placeholder="Pekerjaan" value="{{ $pekerjaan->pekerjaan }}">
          
                  </div>
                  <div class="col-md-6 form-group mb-3">
                    <label for="nik" class="col-form-label">Gaji</label>
                    <input type="number" class="form-control" name="gaji" id="nik"  placeholder="1x.xxx.xxx" value="{{ $pekerjaan->gaji }}">
               
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 form-group mb-3">
                    <label for="message" class="col-form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="message" cols="30" rows="4"  placeholder="Alamat">{{ $pekerjaan->alamat }}</textarea>
            
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-16 form-group">
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
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Contact Form #9</title>
  </head>
  <body>
    <script>
      $(document).ready(function () {
        let warga_id = document.getElementById('warga_id').value;
        $.ajax({
          url: '/nik/' + warga_id,
          type: 'GET',
          success: function (data, status) {
            let datanik = JSON.parse(data);
            console.log('Data : ' + datanik.nik + ", Status : " + status);
            $('#nik').val(datanik.nik)
            $('#btnsbmt').attr('disabled', false);
          },
          beforeSend: function () {
            $('#nik').val('Tunggu sebentar')
            $('#btnsbmt').attr('disabled', true);
          }
        })
        $('#warga_id').on('change', function () {
          let id = $('#warga_id').val()
          $.ajax({
            url: '/nik/' + id,
            type: 'GET',
            success: function (data) {
              let datanik = JSON.parse(data);
              $('#btnsbmt').attr('disabled', false);
              $('#nik').val(datanik.nik)
            },
            beforeSend: function () {
              $('#nik').val('Tunggu sebentar')
              $('#btnsbmt').attr('disabled', true);
            }
          })
        })
      })
    </script>
    <div class="content">
      <div class="container">
        <div class="row align-items-stretch no-gutters contact-wrap">
          <div class="col-md-12">
            <div class="form h-100">
              <h3>Tambah data vaksin</h3>
              <form class="mb-5" action="{{ route('vaksin.store') }}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6 form-group mb-3">
                    <label for="warga_id" class="col-form-label">Nama</label>
                    @if (count($wargas) == 0)
                    <select class="custom-select" id="budget">
                      <option>Tidak ada warga</option>
                    </select>
                    @else
                    <select class="custom-select" id="warga_id" name="warga_id">
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
                  <div class="col-md-6 form-group mb-3">
                    <label for="nik" class="col-form-label">NIK</label>
                    <input type="text" class="form-control" id="nik"  placeholder="NIK" readonly>
                    @error('nik')
                      <small style="color: red;">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="vaksin" id="flexRadioDefault1" value="Y" {{ (old('vaksin') == 'Y') ? "checked" : "" }}>
                  <label class="form-check-label" for="flexRadioDefault1">
                    Sudah vaksin
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="vaksin" id="flexRadioDefault2" value="N" {{ (old('vaksin') == 'N') ? "checked" : "" }}>
                  <label class="form-check-label" for="flexRadioDefault2">
                    Belum vaksin
                  </label>
                </div>
                @error('vaksin')
                    <small style="color: red;">{{ $message }}</small>
                @enderror
                <hr>
                <div class="row">
                  <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary rounded-0 py-2 px-4" id="btnsbmt">Submit</button>
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
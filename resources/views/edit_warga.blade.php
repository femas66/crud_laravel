
<html>
  <head>
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/83685fdc33.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.ico">
  </head>
  <body>
    <div class="container">
    <h3>Edit data</h3><hr>
    <form action="{{ route('editwarga') }}" method="post" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama lengkap</label>
          <input type="text" name="nama" placeholder="Nama" class="form-control" value="{{ $warga->nama }}" required id="nama">
        </div>
        <div class="mb-3">
          <img src="/img/{{ $warga->foto }}" alt="" width="100" height="100">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" name="foto" id="foto" class="form-control">
        </div>
        <hr><input type="hidden" name="id" value="{{ $warga->id }}">
        <div class="form-check">
          <label for="lbb">Sudah nikah</label>
          <input type="radio" name="nikah" id="lbb" value="Y" class="form-check-input" {{ $warga->nikah == 'Y' ? "checked" : "" }}>
        </div>
        <div class="form-check">
          <label for="pbb">Belum nikah</label>
          <input type="radio" name="nikah" id="pbb" value="N" class="form-check-input" {{ $warga->nikah == 'N' ? "checked" : "" }}>
        </div>
        <hr>
        <div class="form-check">
          <label for="l">Laki laki</label>
          <input type="radio" name="jenis_kelamin" id="l" value="L" class="form-check-input" {{ $warga->jenis_kelamin == 'L' ? "checked" : "" }}>
        </div>
        <div class="form-check">
          <label for="p">Perempuan</label>
          <input type="radio" name="jenis_kelamin" id="p" value="P" class="form-check-input" {{ $warga->jenis_kelamin == 'P' ? "checked" : "" }}>
        </div>
        <hr>
        <div class="mb-3">
          <label for="tgl" class="form-label">Tanggal lahir</label>
          <input type="date" name="tanggal_lahir" id="tgl" placeholder="Tanggal lahir" class="form-control" value="{{ date('Y-m-d', strtotime($warga->tanggal_lahir)) }}" required>
        </div>
        <div class="mb-3">
          <button type="submit" name="submit" class="btn" style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i class="fa-solid fa-floppy-disk"></i>  Simpan</button>
        </div>
      </form>
    </div>
  </body>
</html>
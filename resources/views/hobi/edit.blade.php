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
<form action="{{ route('hobi.update', ['id' => $hobi->id]) }}" method="post">
  @csrf
  @method('put')
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Warga</label>
      <select class="form-select" aria-label="Default select example" name="warga_id">
        @foreach ($wargas as $warga)
            <option value="{{ $warga->id }}" {{ ($warga->id == $hobi->warga_id) ? "selected" : "" }}>{{ $warga->nama }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="jb" class="form-label">Usia</label>
      <input type="number" name="usia" placeholder="Usia" class="form-control" required id="jb" value="{{ $hobi->usia }}">
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Hobi" name="hobi" value="{{ $hobi->hobi }}">
      <label for="floatingInput">Hobi</label>
    </div>
    <hr>
    <div class="mb-3">
      <button type="submit" name="submit" class="btn" style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i class="fa-solid fa-floppy-disk"></i>  Simpan</button>
    </div>
  </form>
</div>
  </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      font-weight: bold;
    }
  </style>
  <link rel="icon" type="image/x-icon" href="/img/icon.ico">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Punyaku">
  <meta name="author" content="Femas">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>CRUD</title>
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/83685fdc33.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
  @if ($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert alert-warning" role="alert">
    {{ $error }}
  </div>
  @endforeach
  @endif
  @if (Session::get('tambah'))
  <script>
    Swal.fire('Berhasil menambah data')
  </script>
  @endif
  @if (Session::get('update'))
  <script>
    Swal.fire('Berhasil mengubah data')
  </script>
  @endif
  <div id="wrapper">
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #37306B;">
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
          <i class="fa-solid fa-person"></i>
          <span>Data Warga</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/pekerjaan">
          <i class="fa-solid fa-sack-dollar"></i>
          <span>Data Pekerjaan</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/hobi">
          <i class="fa-solid fa-gamepad"></i>
          <span>Data Hobi</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/vaksin">
          <i class="fa-solid fa-syringe"></i>
          <span>Data Vaksin</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/agama">
          <i class="fa-solid fa-person-praying"></i>
          <span>Data Agama</span></a>
      </li>
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <h1 style="font-weight: bold; color:black;">Dashboard</h1>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fa-solid fa-user"></i> {{
                  Auth::user()->name }}</span>

              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="container-fluid">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Info warga</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 100px;">Foto</th>
                      <th>Nama</th>
                      <th>Status nikah</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><img src="/img/{{ $warga->foto }}" alt="" srcset="" width="80" height="80"></td>
                      <td>{{ $warga->nama }}</td>
                      <td>{{ ($warga->nikah == 'Y') ? "Sudah menikah" : "Belum menikah" }}</td>
                      <td>{{ ($warga->jenis_kelamin == 'L') ? "Laki-Laki" : "Perempuan" }}</td>
                      <td>{{ $warga->tanggal_lahir }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Info pekerjaan : {{ count($warga->pekerjaan) }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 100px;">Foto</th>
                      <th>Nama</th>
                      <th>Pekerjaan</th>
                      <th>Alamat pekerjaan</th>
                      <th>Gaji</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($warga->pekerjaan) == 0)
                    <tr>
                      <td colspan="5"><center>Tidak ada data</center></td>
                    </tr>
                    @else
                    <tr>
                      <td rowspan="{{ count($warga->hobi) }}"><img src="/img/{{ $warga->foto }}" alt="" srcset=""
                          width="80" height="80"></td>
                      <td rowspan="{{ count($warga->hobi) }}">{{ $warga->nama }}</td>
                      @foreach ($warga->pekerjaan as $pekerjaan)

                      <td>{{ $pekerjaan->pekerjaan }}</td>
                      <td>{{ $pekerjaan->alamat }}</td>
                      <td>@currency($pekerjaan->gaji)</td>
                    </tr>
                    @endforeach
                    @endif


                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Info hobi : {{ count($warga->hobi) }}</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 100px;">Foto</th>
                      <th>Nama</th>
                      <th>Hobi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if (count($warga->hobi) == 0)
                    <tr>
                      <td colspan="3"><center>Tidak ada data</center></td>
                    </tr>
                    @else
                    <tr>
                      <td rowspan="{{ count($warga->hobi) }}"><img src="/img/{{ $warga->foto }}" alt="" srcset=""
                          width="80" height="80"></td>
                      <td rowspan="{{ count($warga->hobi) }}">{{ $warga->nama }}</td>
                      @foreach ($warga->hobi as $hobi)
                      <td>{{ $hobi->hobi }}</td>
                    </tr>
                    @endforeach
                    @endif


                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Info vaksin</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 100px;">Foto</th>
                      <th>Nama</th>
                      <th>Usia</th>
                      <th>Vaksin</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($warga->vaksin == null)
                    <tr>
                      <td colspan="4"><center>Tidak ada data</center></td>
                    </tr>
                    @else
                    <tr>
                      <td><img src="/img/{{ $warga->foto }}" alt="" srcset="" width="80" height="80"></td>
                      <td>{{ $warga->nama }}</td>
                      <td>{{ $warga->vaksin->usia }}</td>
                      <td>{{ ($warga->vaksin->vaksin == 'Y') ? "Sudah vaksin" : "Belum vaksin" }}</td>
                    </tr>
                    @endif

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Info agama</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 100px;">Foto</th>
                      <th>Nama</th>
                      <th>Agama sebelumnya</th>
                      <th>Agama sekarang</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($warga->agama == null)
                    <tr>
                      <td colspan="4"><center>Tidak ada data</center></td>
                    </tr>
                    @else
                    <tr>
                      <td><img src="/img/{{ $warga->foto }}" alt="" srcset="" width="80" height="80"></td>
                      <td>{{ $warga->nama }}</td>
                      <td>{{ $warga->agama->agama_sebelumnya }}</td>
                      <td>{{ $warga->agama->agama_sekarang }}</td>
                    </tr>
                    @endif

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Yakin mau logout?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button class="btn btn-warning">Logout</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/js/sb-admin-2.min.js"></script>
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>
</body>

</html>
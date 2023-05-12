@extends('layout.halaman')
@section('body')
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

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img class="img-profile rounded-circle"
                                src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"><a href="{{ route('pekerjaan.create') }}"
                                class="btn"
                                style="background: #37306B; font-weight: bold; color:white; border-radius: 18px;"><i
                                    class="fa-solid fa-plus"></i> Tambah Data Pekerjaan</a></h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Foto</th>
                                        <th>Nama Warga</th>
                                        <th>Pekerjaan</th>
                                        <th>Alamat</th>
                                        <th>Gaji</th>
                                        <th colspan="2">
                                            <center>Aksi</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <script>
                                        function cnfrm(id) {
                                                
                                                Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!'
                                                }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location = `/pekerjaan/${id.toString()}`
                                                    console.log("oke");
                                                }
                                                
                                                })
                                            }
                                    </script>
                                    @if (count($pekerjaans) != 0)
                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach ($pekerjaans as $pekerjaan)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><img src="/img/{{ $pekerjaan->warga->foto }}" alt="" srcset="" width="80"
                                                    height="80"></td>
                                            <td>{{ $pekerjaan->warga->nama }}</td>
                                            <td>{{ $pekerjaan->pekerjaan }}</td>
                                            <td>{{ $pekerjaan->alamat }}</td>
                                            <td>@currency($pekerjaan->gaji)</td>
                                            <th><a href="{{ route('pekerjaan.edit', ['id' => $pekerjaan->id]) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>
                                                    Edit</a></th>
                                            <th><button onclick="cnfrm({{ $pekerjaan->id }})" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i> Hapus</button></th>
                                        </tr>
                                        @endforeach
                                    @else
                                        
                                        <tr>
                                            <td colspan="7"><center>Tidak ada data</center></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                           {{ $pekerjaans->links() }} 
                        </div>
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
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
@endsection
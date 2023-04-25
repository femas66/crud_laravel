<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
</head>
<body>
  <h1>Dashboard</h1>
  <a href="{{ route('tambahwarga') }}">Tambah warga</a>
  <a href="{{ route('logout') }}">Logout</a>
  {{ count($wargas) }}
  <table border="1">
    <tr>
      <th>#</th>
      <th>Nama</th>
      <th>Foto</th>
      <th>Status nikah</th>
      <th>Jenis Kelamin</th>
      <th>Tanggal lahir</th>
      <th colspan="2">Aksi</th>
    </tr>
    <?php
    $i = 1;
    ?>
    @foreach ($wargas as $warga)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $warga->nama }}</td>
          <td>{{ $warga->foto }}</td>
          <td>{{ $warga->nikah }}</td>
          <td>{{ $warga->jenis_kelamin }}</td>
          <td>{{ $warga->tanggal_lahir }}</td>
          <th><a href="/editwarga/{{ $warga->id }}">Edit</a></th>
          <th><a href="/hapus/id/{{ $warga->id }}">Hapus</a></th>
        </tr>
    @endforeach
  </table>
</body>
</html>
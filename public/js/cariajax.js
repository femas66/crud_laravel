$(document).ready(function () {
  $('#btncari').on('click', function () {
    let yangdicari = $('#yangdicari').val();
    let tabel = $('#tabel').val();
    if (tabel == 'warga') {
      $.ajax({
        url: '/cari/' + tabel + '/' + yangdicari,
        type: 'GET',
        success: function (data, status) {
          console.log(status);
          let isi = JSON.parse(data);
          $('#mytable').empty();
          console.log(isi.length)
          if (isi.length <= 5 && isi.length != 0) {
            $('#paginate').empty();
          } else if (isi.length == 0 ) {
            $('#paginate').empty();
            $('#mytable').append(`
            <tbody>
            <tr>
              <td colspan='7'><center>Tidak ada data</center></td>
            </tr>
            </tbody>
            `)
          }
          $('#mytable').append(`
          <thead>
            <tr>
              <th>#</th>
              <th style="width: 100px;">Foto</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>Jenis kelamin</th>
              <th>Tanggal Lahir</th>
              <th colspan="3"><center>Aksi</center></th>
            </tr>
          </thead>`
          );
          let x = 1;
          for(let i = 0;i<isi.length;i++){
            $('#mytable').append(`
            <tr>
              <td>${ x++ }</td>
              <td><img src="/img/${ isi[i]['foto'] }" alt="" srcset="" width="80" height="80"></td>
              <td>${ isi[i]['nama'] }</td>
              <td>${ isi[i]['nik'] }</td>
              <td>${ (isi[i]['jenis_kelamin'] == 'L') ? 'Laki laki' : 'Perempuan' }</td>
              <td>${ isi[i]['tanggal_lahir'] }</td>
              <th><a href="/editwarga/${ isi[i]['id'] }" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a></th>
              <th><button class="btn btn-danger" onclick="cnfrm(${ isi[i]['id'] })"><i class="fa-solid fa-trash"></i> Hapus</button></th>
              <th><a class="btn btn-primary" href="/detail/${ isi[i]['id'] }"><i class="fa-solid fa-circle-info"></i> Detail</a></th>
          </tr>
            `)
          }
        }
      });
    } else if (tabel == 'pekerjaan') {
      console.log(tabel);
      $.ajax({
        url: '/cari/pekerjaan/' + yangdicari,
        type: 'GET',
        success: function (data, status) {
          let isi = JSON.parse(data);
          console.log(data);
          $('#mytable').empty();
          if (isi.length <= 5 && isi.length != 0) {
            $('#paginate').empty();
          } else if (isi.length == 0 ) {
            $('#paginate').empty();
            $('#mytable').append(`
            <tbody>
            <tr>
              <td colspan='7'><center>Tidak ada data</center></td>
            </tr>
            </tbody>
            `)
          }
          $('#mytable').append(`
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
          `)
          let y = 1;
          for (let i = 0; i<isi.length; i++) {
            $('#mytable').append(`
            <tr>
              <td>${ y++ }</td>
              <td>` + '<img src="/img/{{ $pekerjaan->warga->foto }}" alt="" srcset="" width="80" height="80">' + `</td>
              <td>` + '{{ $pekerjaan->warga->nama }}' + `</th>
              <td>${ isi[i]['pekerjaan'] }</th>
              <td>${ isi[i]['alamat'] }</th>
              <td>${ isi[i]['gaji'] }</th>
              <td>
                <center>Edit</center>
              </td>
              <td><center><th><form method="post" action="/pekerjaan/${ isi[i]['id'] }"><button class="btn btn-danger" onclick="return confirm('Yakin mau hapus?')"><i class="fa-solid fa-trash"></i> Hapus</button></form></th>Hapus</center></td>
            </tr>
            `)
          }
        }
      })
    }
  })
});
$(document).ready(function () {
  $('#btncari').on('click', function () {
    let yangdicari = $('#yangdicari').val();
    if (yangdicari == "") {
      console.log("kosong");
    }
    let tabel = $('#tabel').val();
    $.ajax({
      url: '/cari/' + tabel + '/' + yangdicari,
      type: 'GET',
      success: function (data, status) {
        console.log(status);
        let isi = JSON.parse(data);
        $('#mytable').empty();
        console.log(isi.length)
        if (isi.length < 5) {
          $('#paginate').empty();
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
  })
});
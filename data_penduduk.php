<?php
require_once "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <title>Data Penduduk</title>
</head>

<body>

  <!-- NAVIGATION BAR -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">PDD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="data_penduduk.php">Penduduk</a>
          <a class="nav-item nav-link" href="data_kota.php">Kota</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- END OF NAVIGATION BAR -->


  <div class="container my-5">
    <div class="row">

      <!-- FORM INOUT DATA PENDUDUK -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Data Penduduk</h5>
            <form action="" method="post" aria-autocomplete="off">
              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" name="nik" id="nik" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="umur">Umur</label>
                <input type="number" name="umur" id="umur" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control">
                  <option value="Psikolog">Psikolog</option>
                  <option value="Sistem Informasi">Sistem Informasi</option>
                  <option value="Teknik Sipil">Teknik Sipil</option>
                  <option value="Pertambangan">Pertambangan</option>
                </select>
              </div>

              <button type="submit" name="save" class="btn btn-primary float-right">Save Data</button>
            </form>
          </div>
        </div>

      </div>
      <!-- END FORM INPUT DATA PENDUDUK -->

      <!-- TABEL PENDUDUK -->
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Penduduk</h5>
            <table class="table table-bordered table-hover">
              <thead>
                <th>#</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Tempat Lahir</th>
                <th>Pendidikan</th>
                <th>Opsi</th>
              </thead>
              <tbody>
                <!-- Memanggil data yang ada pada tabel data_penduduk -->
                <?php
                $no = 1;
                $datas = mysqli_query($con, "SELECT * FROM data_penduduk");
                // Melakukan looping untuk menampilkan data satu per satu
                foreach ($datas as $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nik'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['umur'] ?> Tahun</td>
                    <td><?= $data['tempat_lahir'] ?></td>
                    <td><?= $data['pendidikan'] ?></td>
                    <!-- Membuat tombol delete data -->
                    <td><a href="delete_penduduk.php?nik=<?= $data['nik'] ?>" class="text-danger" onclick="return confirm('Hapus data ini  ?')">Delete</a></td>
                  </tr>
                <?php }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END TABEL PENDUDUK -->


    </div>
  </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['save'])) {
  // Menangkap Form inputan 
  $nik          = $_POST['nik'];
  $nama         = $_POST['nama'];
  $umur         = $_POST['umur'];
  $tempat_lahir = $_POST['tempat_lahir'];
  $pendidikan   = $_POST['pendidikan'];

  // Proses query insert data
  $save = mysqli_query($con, "INSERT INTO data_penduduk (nik, nama, umur, tempat_lahir, pendidikan) VALUES ('$nik', '$nama', '$umur', '$tempat_lahir', '$pendidikan')");

  if ($save) {
    // Jika berhasil simpan
    echo "
      <script>
        alert('Data penduduk berhasil ditambahkan');
        window.location.href='data_penduduk.php';
      </script>
      ";
  } else {
    // Jika gagal
    echo "
      <script>
        alert('Gagal menambahkan data');
      </script>
      ";
  }
}
?>
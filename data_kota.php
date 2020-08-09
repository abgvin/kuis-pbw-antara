<?php
require_once "koneksi.php";
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <title>Data Kota</title>
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
          <a class="nav-item nav-link" href="data_penduduk.php">Penduduk</a>
          <a class="nav-item nav-link active" href="data_kota.php">Kota</a>
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
            <h5 class="card-title">Tambah Data Kota</h5>
            <form action="" method="post" aria-autocomplete="off">
              <div class="form-group">
                <label for="kode_kota">Kode Kota</label>
                <input type="text" name="kode_kota" id="kode_kota" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label for="nama_kota">Nama Kota</label>
                <input type="text" name="nama_kota" id="nama_kota" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" name="provinsi" id="provinsi" class="form-control" required>
              </div>
              <div class="form-group">
                <label for="jumlah_penduduk">Jumlah Penduduk</label>
                <input type="number" name="jumlah_penduduk" id="jumlah_penduduk" class="form-control" required>
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
            <h5 class="card-title">Data Kota</h5>
            <table class="table table-bordered table-hover">
              <thead>
                <th>#</th>
                <th>Kode Kota</th>
                <th>Nama Kota</th>
                <th>Provinsi</th>
                <th>Jumlah Penduduk</th>
                <th>Opsi</th>
              </thead>
              <tbody>
                <!-- Memanggil data yang ada pada tabel data_penduduk -->
                <?php
                $no = 1;
                $datas = mysqli_query($con, "SELECT * FROM data_kota");
                // Melakukan looping untuk menampilkan data satu per satu
                foreach ($datas as $data) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['kode_kota'] ?></td>
                    <td><?= $data['nama_kota'] ?></td>
                    <td><?= $data['provinsi'] ?></td>
                    <td><?= $data['jumlah_penduduk'] ?>K Jiwa</td>
                    <!-- Membuat tombol delete data -->
                    <td><a href="delete_kota.php?kode=<?= $data['kode_kota'] ?>" class="text-danger" onclick="return confirm('Hapus data ini  ?')">Delete</a></td>
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
  $kode_kota          = $_POST['kode_kota'];
  $nama_kota          = $_POST['nama_kota'];
  $provinsi           = $_POST['provinsi'];
  $jumlah_penduduk    = $_POST['jumlah_penduduk'];

  // Proses query insert data
  $save = mysqli_query($con, "INSERT INTO data_kota (kode_kota, nama_kota, provinsi, jumlah_penduduk) VALUES ('$kode_kota', '$nama_kota', '$provinsi', '$jumlah_penduduk')") or die(mysqli_error($con));

  if ($save) {
    // Jika berhasil simpan
    echo "
      <script>
        alert('Data kota berhasil ditambahkan');
        window.location.href='data_kota.php';
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
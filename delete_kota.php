<?php
require_once "koneksi.php";

$kode = $_GET['kode'];
$query = mysqli_query($con, "DELETE FROM data_kota WHERE kode_kota = '$kode'") or die(mysqli_error($con));

// Cek apakah proses delete berhasil
if ($query) {
  //  JIka berhasil
  echo "
    <script>
      alert('Data kota dihapus');
      window.location.href='data_kota.php';
    </script>
  ";
} else {
  // Jika tidak berhasil
  echo "
    <script>
      alert('Gagal Hapus data');
      window.location.href='data_kota.php';
    </script>
  ";
}

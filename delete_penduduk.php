<?php
require_once "koneksi.php";

// Menangkap variabel nik dari URL
$nik = $_GET['nik'];

// Melakukan query delete data berdasarlan nik;
$query = mysqli_query($con, "DELETE FROM data_penduduk WHERE nik = '$nik'") or die(mysqli_error($con));

// Cek apakah proses delete berhasil
if ($query) {
  //  JIka berhasil
  echo "
    <script>
      alert('Data penduduk dihapus');
      window.location.href='data_penduduk.php';
    </script>
  ";
} else {
  // Jika tidak berhasil
  echo "
    <script>
      alert('Gagal Hapus data');
      window.location.href='data_penduduk.php';
    </script>
  ";
}

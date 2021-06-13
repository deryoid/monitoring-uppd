<?php 
  include '../../config/koneksi.php';

   $id    = $_GET['id'];
   $hapus = $koneksi->query("DELETE FROM daftarppl WHERE id_daftar = '$id'");

   session_start();
   if ($hapus) {
  		$_SESSION['pesan'] = "Data Berhasil Dihapus";
        echo "<script>window.location.replace('../mahasiswa/');</script>";
    }
   
 ?>
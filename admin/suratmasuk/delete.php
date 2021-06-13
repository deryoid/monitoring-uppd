<?php 
  include '../../config/koneksi.php';

   $id    = $_GET['id'];
   $hapus = $koneksi->query("DELETE FROM surat_masuk WHERE id_sm = '$id'");

   session_start();
   if ($hapus) {
  		$_SESSION['pesan'] = "Data Berhasil Dihapus";
        echo "<script>window.location.replace('../suratmasuk/');</script>";
    }
   
 ?>
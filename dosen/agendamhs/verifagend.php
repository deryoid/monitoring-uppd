<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';

$id   =  $_GET['id'];
$v    = $_GET['v'];

if ($v == "Terverifikasi") {
    $submit = $koneksi->query("UPDATE agenda SET  ket_agenda = '$v' WHERE id_agenda = '$id'");
} else {
    $submit = $koneksi->query("UPDATE agenda SET ket_agenda = '$v' WHERE id_agenda = '$id'");
}

if ($submit) {

$data = $koneksi->query("SELECT * FROM agenda WHERE id_agenda = '$id'")->fetch_array();
$iddaftar = $data['id_daftar'];
// var_dump($iddaftar); die;


    $_SESSION['pesan'] = "Status Verifikasi Diubah";
    echo "<script>window.location.replace('detailkeg?id=$iddaftar');</script>";
}



 ?>
<?php
require '../../config/config.php';
include '../../config/koneksi.php';
    $id = $_GET['id'];
    $datamhs = $koneksi->query("SELECT * FROM peserta WHERE id_peserta = '$id'")->fetch_array();

?>
<script type="text/javascript">
window.print();
</script>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMULIR PPL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->

    <style>
        .kop {
            text-align: center;
        }
    </style>
</head>

<body>
<img src="<?=base_url('assets/dist/img/logo-kalsel.png')?>" align="left" width="90" height="90">
  <p align="center"><b>
    <font size="5">Unit Pelayanan Pendapatan Daerah(UPPD)</font> <br> 
    <font size="5"> Samsat Kandangan</font><br><br>
    <hr size="2px" color="black">
    <center><font size="2">Alamat : Jln. Jend. A.Yani No.14 RT.18 Kandangan. Hulu Sungai Selatan
 </font></center>
    <hr size="2px" color="black">
  </b></p>

    <p style="text-align: center; margin-top: 2%;">
        <label>
            <b style="font-size: 28;"><u>FORMULIR Praktek Kerja Lapangan</u></b> <br>
            <!-- <b style="font-size: 12;">Nomor</b> : <?= $row['nomor_sktu']; ?> -->
            <br>
            <br>
        </label>
        <table border="0" width="60%"  cellpadding=" 1">
        <p style="text-align: justify; font-size: 15; ">Isikan Data Formulir Pendaftaran PKL Tahun <?php echo date('Y')?> :</p>
        </table>
        <div align="center">
        <table border="0" width="60%" style="text-align: left; font-size: 15; " cellpadding=" 1">
            <tr style="vertical-align: top;">
                <th width="30%">NPM/NIM/NIS</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['npm'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="30%">Nama </th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['nama'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="30%">JK </th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['jk'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Prodi/Jurusan</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['prodi'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Agama</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['agama'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Alamat</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['alamat'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="40%">Telp/No. Whatsapp</th>
                <td>:</td>
                <td><b><?= strtoupper($datamhs['telp'])?></b></td>
            </tr>
        </table>
        <br>
        <img style="text-align: center;" width="80px" height="100px" src="<?= base_url() ?>/fotomhs/<?= $datamhs['foto']?>">
        </div>
        <br>
        <table border="0" width="60%"  cellpadding=" 1">
        <p style="text-align: justify; font-size: 15; ">Dengan Ini menyatakan bahwa data yang dibuat dengan benar.</p>
        </table>
       

<br>
<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Kandangan , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    <u><?= $datamhs['nama']?></u> <br>
    <?= $datamhs['npm'] ?>
  </h5>

</div> 


</body>

</html>
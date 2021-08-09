<?php
require '../../config/config.php';
include '../../config/koneksi.php';

    $id = $_GET['id'];
    $surpe = $koneksi->query("SELECT * FROM daftarpkl AS dp 
    LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
    LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
    LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing WHERE dp.id_peserta = '$id'")->fetch_array();

?>



<!DOCTYPE html>
<html>
<script type="text/javascript">
window.print();
</script>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FORMULIR PKL</title>
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

        <table border="0" width="60%" style="text-align: left; font-size: 12; "  cellpadding=" 1">
        <tr>
            <th>No</th>
            <td>:</td>
            <td><?= $id; ?>/UPPD/SAMSAT/VIII/<?= date('Y')?></td>
        </tr>
        <tr>
            <th>Lamp</th>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr valign="top">
            <th>Perihal</th>
            <td>:</td>
            <td>Permohonan Penempatan Dan Pembimbingan Mahasiswa/Siswa PKL</td>
        </tr>
        </table>

        <p style="text-align: justify; font-size: 12;">
        Kpd Yth,<br>
        Pimpinan <?= $surpe['prodi']?> <br>    
        Di – Tempat <br>
        <br>  
        Assalamu’alaikum  Wr. Wb. <br>	
        Dalam rangka kegiatan Praktik Kerja Lapangan di Unit Pelayanan Pendapatan Daerah(UPPD) Samsat Kandangan Tahun 2021 – <?= date('Y')?>, telah diteram :
        </p>



        <div align="center">
        <table border="0" width="60%" style="text-align: left; font-size: 12; " cellpadding=" 1">
            <tr style="vertical-align: top;">
                <th>NPM/NIM/NIS</th>
                <td>:</td>
                <td><b><?= strtoupper($surpe['npm'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Nama </th>
                <td>:</td>
                <td><b><?= strtoupper($surpe['nama'])?></b></td>
            </tr>
        </table>
        </div>
        <p style="text-align: justify; font-size: 12;">
        Kegiatan Program Praktik Kerja Lapangan Jurusan/Prodi <?= $surpe['prodi']?> direncanakan  pada tanggal  <?= tgl_indo($surpe['tgl_awal'])?>  sampai <?= tgl_indo($surpe['tgl_akhir'])?> atau dapat  pula menyesuaikan dengan kalender instansi/dinas terkait, terdiri  dari :
            <ol>
                <li>Observasi maupun penelitian dilanjut dengan penyusunan laporan.</li>
                <li>Latihan dalam mengenal lingkungan kerja</li>
                <li>Melakukan layanan terhadap masyarakat/tenaga bantu, dilanjutkan dengan penyusunan laporan.</li>
                <li>Penyusunan Laporan.</li>
            </ol>
            Demikian  surat ini disampaikan, atas perhatian dan kerjasama diucapkan terimakasih. <br>  
            Wabillahitaufiq walhidayah. <br>
            Wassalamu’alaikum Wr. Wb.

        </p>


<?php 
  $datattd = $koneksi->query("SELECT * FROM ttd_uppd")->fetch_array();

?>
<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Kandangan, <?php echo tgl_indo(date('Y-m-d')); ?><br>
    <?php echo $datattd['jabatan']?>
    <br><br><br><br><br><br>
    <u><?php echo $datattd['kepalaUppd']?></u><br>
    NIP. <?php echo $datattd['nip']?>
  </h5>

</div> 


</body>

</html>
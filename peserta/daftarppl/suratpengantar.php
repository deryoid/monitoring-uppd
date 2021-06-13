<?php
require '../../config/config.php';
include '../../config/koneksi.php';

    $id = $_GET['id'];
    $surpe = $koneksi->query("SELECT * FROM daftarppl AS dp 
    LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
    LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
    LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_mhs = '$id'")->fetch_array();

?>



<!DOCTYPE html>
<html>
<script type="text/javascript">
window.print();
</script>
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
<img src="<?=base_url('assets/dist/img/favicon1.png')?>" align="left" width="70" height="70">
  <p align="center"><b>
    <font size="3">UNIT PROGRAM PENGENALAN LAPANGAN PERSEKOLAH (UPPLP)</font> <br> 
    <font size="3">UNIVERSITAS ISLAM KALIMANTAN</font><br>
    <font size="2">MUHAMMAD ARSYAD AL BANJARI</font> <br>
    <hr size="1px" color="black">
    <center><font size="0,5">Alamat : Jl. Adhiyaksa No.2 Kayu tangi, Sungai Miai, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70118 (0511) 7359191 </font></center>
    <hr size="1px" color="black">
  </b></p>

    <p style="text-align: center; margin-top: 2%;">

        <table border="0" width="60%" style="text-align: left; font-size: 12; "  cellpadding=" 1">
        <tr>
            <th>No</th>
            <td>:</td>
            <td><?= $id; ?>/UNISKA/FKIP-UPPL/VIII/<?= date('Y')?></td>
        </tr>
        <tr>
            <th>Lamp</th>
            <td>:</td>
            <td>-</td>
        </tr>
        <tr valign="top">
            <th>Perihal</th>
            <td>:</td>
            <td>Permohonan Penempatan Dan Pembimbingan Mahasiswa PPL</td>
        </tr>
        </table>

        <p style="text-align: justify; font-size: 12;">
        Kpd Yth,<br>
        KEPALA Sekolah <?= $surpe['nama_sekolah']?> <br>    
        Di – Tempat <br>
        <br>  
        Assalamu’alaikum  Wr. Wb. <br>	
        Dalam rangka penyelenggaraan perkuliahan mata kuliah Program Pengalaman Lapangan Prodi <?= $surpe['prodi']?>.  Program Studi <?= $surpe['prodi']?> Fakultas Keguruan Dan Ilmu Pendidikan (FKIP) Universitas Islam Kalimantan ( UNISKA ) Muhammad  Arsyad Al – Banjari  Tahun 2019 – <?= date('Y')?>, dimohon kesediaan penempatan dan pembimbingan bagi mahasiswa :
        </p>



        <div align="center">
        <table border="0" width="60%" style="text-align: left; font-size: 12; " cellpadding=" 1">
            <tr style="vertical-align: top;">
                <th>NPM</th>
                <td>:</td>
                <td><b><?= strtoupper($surpe['npm'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Nama Mahasiswa</th>
                <td>:</td>
                <td><b><?= strtoupper($surpe['nama'])?></b></td>
            </tr>
        </table>
        </div>
        <p style="text-align: justify; font-size: 12;">
        Kegiatan Program Pengalaman Lapangan Prodi <?= $surpe['prodi']?> direncanakan  pada tanggal  <?= tgl_indo($surpe['tgl_awal'])?>  sampai <?= tgl_indo($surpe['tgl_akhir'])?> atau dapat  pula menyesuaikan dengan kalender  pendidikan / akademik sekolah, terdiri  dari :
            <ol>
                <li>Observasi  pengelolaan sekolah dilanjut dengan penyusunan laporan.</li>
                <li>Latihan penyusunan dan melaksanakan RPP ( minimal 12 kali ) dilanjutkan ujian dengan tampil di depan kelas.</li>
                <li>Melakukan layanan bimbingan siswa, dilanjutkan dengan penyusunan laporan.</li>
                <li>Penyusunan Laporan.</li>
            </ol>
            Demikian  surat ini disampaikan, atas perhatian dan kerjasama diucapkan terimakasih. <br>  
            Wabillahitaufiq walhidayah. <br>
            Wassalamu’alaikum Wr. Wb.

        </p>


<?php 
  $datattd = $koneksi->query("SELECT * FROM ttd_uppl")->fetch_array();

?>
<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Banjarmasin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    <?php echo $datattd['jabatan']?>
    <br><br><br><br><br><br>
    <?php echo $datattd['kepalaUppl']?><br>
    NIP. <?php echo $datattd['nip']?>
  </h5>

</div> 


</body>

</html>
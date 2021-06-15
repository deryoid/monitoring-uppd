<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;
    $data = $koneksi->query("SELECT * FROM daftarpkl AS dp 
    LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
    LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
    LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing 
    LEFT JOIN agenda AS a ON dp.id_daftar = a.id_daftar
    WHERE dp.id_peserta = '$_SESSION[id_peserta]'");
    //   $data = $koneksi->query("SELECT * FROM agenda WHERE id_daftar = '$datappl[id_daftar]' ORDER BY tgl_agenda DESC");
    //   $jumlah = mysqli_num_rows($data);

$bln = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
        );

?>

<script type="text/javascript">
window.print();
</script>

<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat Peserta Praktik Kerja Lapangan UPPD Samsat Kandangan</title>
    
</head>
<body><br><br><br><br>

  <hr size="2px" color="black">
    <h1><center><br>
    <img src="<?=base_url('assets/dist/img/logo-kalsel.png')?>" align="center" width="90" height="90"><br><br><br>
        Sertifikat Peserta Praktik Kerja Lapangan UPPD Samsat Kandangan<br> 
    </center></h1><br>
    <?php
    $datapkl = $koneksi->query("SELECT * FROM peserta WHERE id_peserta = '$_SESSION[id_peserta]'")->fetch_array();
    ?>
            <div class="card-body" align="justify">
            <h3>
            <p>Kepada Peserta Praktik Kerja Lapangan Di UPPD Samsat Kandangan, Kami mengucapkan banyak terimakasih kepada peserta dan berharap ilmu yang didapat akan sangat berguna kedepannya</p>
            </h3>
            </div>
            <br>
            <div class="card-body" align="center">
            <h2>
                <dl class="row">
                  
                  <u><dt class="col-sm-4">Nama <?php echo ": ".$datapkl['nama']; ?></dt>
                  
                  <dt class="col-sm-4">Prodi/Jurusan <?php echo ": ".$datapkl['prodi']; ?></dt></u>
                  
                </dl>
              </h2>
              </div>


<br>
<?php 
  $datattd = $koneksi->query("SELECT * FROM ttd_uppd")->fetch_array();

?>
<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Banjarmasin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    <?php echo $datattd['jabatan']?>
    <br><br><br><br><br><br>
    <u><?php echo $datattd['kepalaUppd']?></u><br>
    NIP. <?php echo $datattd['nip']?>
  </h5>
<hr size="2px" color="black">
</div> 


</body>
</html>
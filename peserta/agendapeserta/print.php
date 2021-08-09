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
    <title>LAPORAN DATA AGENDA PESERTA</title>
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
    
    <h3><center><br>
        LAPORAN DATA AGENDA PESERTA<br> 
    </center></h3><br>
    <?php
    $datapkl = $koneksi->query("SELECT * FROM peserta WHERE id_peserta = '$_SESSION[id_peserta]'")->fetch_array();
    ?>
            <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">NPM <?php echo ": ".$datapkl['npm']; ?></dt>
                  
                  <dt class="col-sm-4">Nama <?php echo ": ".$datapkl['nama']; ?></dt>
                  
                  <dt class="col-sm-4">Prodi <?php echo ": ".$datapkl['prodi']; ?></dt>
                  
                </dl>
              </div>
    <br>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Agenda</th>
                                <th>Status</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php while ($row = mysqli_fetch_array($data)) { ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= tgl_indo($row['tgl_agenda']) ?></td>
                                <td><?= $row['nama_agenda'] ?></td>
                                <td><?= $row['status'] ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<!-- <label>Jumlah Mahasiswa Yang Dinilai : <?php echo "<b>".$jumlah.' Mahasiswa Yang Dinilai'."</b>"; ?></label> -->
<br>


<br>
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
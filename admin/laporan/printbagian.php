<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;

      $data = $koneksi->query("SELECT * FROM bagian ORDER BY id_bagian ASC");
      $jumlah = mysqli_num_rows($data);

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
    <title>LAPORAN DATA SEKOLAH</title>
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
    Bagian Tempat PKL Terdaftar<br> 
    </center></h3><br><br>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th>No</th>
                                <th>Nama Bagian</th>
                               <th>DESC</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php while ($row = mysqli_fetch_array($data)) { ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nama_bagian'] ?></td>
                                <td><?= $row['deskrip'] ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<label>Jumlah Bagian Tempat PKL Terdaftar : <?php echo "<b>".$jumlah.' Bagian Terdaftar'."</b>"; ?></label>
<br>

<!-- <?php 
  $datattd = $koneksi->query("SELECT * FROM ttd_uppl")->fetch_array();

?>
<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Kandangan, <?php echo tgl_indo(date('Y-m-d')); ?><br>
    <?php echo $datattd['jabatan']?>
    <br><br><br><br><br><br>
    <?php echo $datattd['kepalaUppl']?><br>
    NIP. <?php echo $datattd['nip']?>
  </h5> -->

</div> 


</body>
</html>
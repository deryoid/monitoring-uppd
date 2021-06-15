<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;

      $data = $koneksi->query("SELECT * FROM dosen AS d LEFT JOIN user AS u ON d.id_user = u.id_user ORDER BY d.id_dosen ASC");
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
    <title>LAPORAN DATA DOSEN</title>
</head>
<body>
<img src="<?=base_url('assets/dist/img/favicon1.png')?>" align="left" width="90" height="90">
  <p align="center"><b>
    <font size="5">UNIT PROGRAM PENGENALAN LAPANGAN PERSEKOLAH (UPPLP)</font> <br> 
    <font size="5">UNIVERSITAS ISLAM KALIMANTAN</font><br><br>
    <font size="4">MUHAMMAD ARSYAD AL BANJARI</font> <br>
    <hr size="2px" color="black">
    <center><font size="2">Alamat : Jl. Adhiyaksa No.2 Kayu tangi, Sungai Miai, Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70118 (0511) 7359191 </font></center>
    <hr size="2px" color="black">
  </b></p>
    
    <h3><center><br>
        LAPORAN DATA DOSEN<br> 
    </center></h3><br><br>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th>No</th>
                                <th>NIDN/NIK</th>
                                <th>Nama Dosen</th>
                                <th>Prodi Mengajar</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php while ($row = mysqli_fetch_array($data)) { ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nidn'] ?></td>
                                <td><?= $row['nama_dosen'] ?></td>
                                <td><?= $row['prodi_dosen'] ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<!-- <label>Jumlah Sekolah Terdaftar : <?php echo "<b>".$jumlah.' Sekolah Terdaftar'."</b>"; ?></label> -->
<br>

<br>
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
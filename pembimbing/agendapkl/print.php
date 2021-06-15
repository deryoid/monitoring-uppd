<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;
    $id   =  $_GET['id']; 
    $datappl = $koneksi->query("SELECT * FROM daftarppl AS dp 
                  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_daftar = '$id'")->fetch_array();

    $jumlah = mysqli_num_rows($datappl);

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
    <title>LAPORAN DATA BIMBINGAN PPL</title>
</head>
<body>
<!-- <img src="<?=base_url('images/hss.png')?>" align="left" width="75" height="75">
    <p align="center"><b>
        <font size="5">PEMERINTAHAN KABUPATEN HULU SUNGAI SELATAN</font> <br> 
        <font size="5">Dinas Pertanian</font> <br><br>
        <font size="4">BIMBINGAN PPL MENENGAH KEJURUAN NEGERI 5 BANJARMASIN</font> <br>
        <hr size="2px" color="black">
        <center><font size="2">Alamat : Jl. SINGAKARSA NO.38 , TELP/FAX.(0517) 21529  KANDANGAN 71213 Email : distantphhss@yahoo.co.id </font></center>
        <hr size="2px" color="black">
    </b></p> -->
    
    <h3><center><br>
        LAPORAN DATA BIMBINGAN PPL<br> 
    </center></h3><br><br>
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Sekolah</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php while ($row = mysqli_fetch_array($datappl)) { ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['npm'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['prodi'] ?></td>
                                <td><?= $row['nama_sekolah'] ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<label>Jumlah Bimbingan PPL : <?php echo "<b>".$jumlah.' Bimbingan PPL'."</b>"; ?></label>
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
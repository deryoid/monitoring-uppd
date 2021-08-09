<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;

      $data = $koneksi->query("SELECT * FROM daftarppl AS dp 
      LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
      LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
      LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_dosen = '$_SESSION[id_dosen]'");
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
        LAPORAN DATA NILAI MAHASISWA<br> 
    </center></h3><br>
    <?php
    $datadosen = $koneksi->query("SELECT * FROM dosen WHERE id_dosen = '$_SESSION[id_dosen]'")->fetch_array();
    ?>
            <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">NIDN <?php echo ": ".$datadosen['nidn']; ?></dt>
                  
                  <dt class="col-sm-4">Nama Dosen <?php echo ": ".$datadosen['nama_dosen']; ?></dt>
                  
                  <dt class="col-sm-4">Prodi Mengajar <?php echo ": ".$datadosen['prodi_dosen']; ?></dt>
                  
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
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Sekolah</th>
                                <th>Nilai</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php while ($row = mysqli_fetch_array($data)) { ?>
                                <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['npm'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['prodi'] ?></td>
                                <td><?= $row['nama_sekolah'] ?></td>
                                <td><?= $row['nilaippl'] ?></td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<label>Jumlah Mahasiswa Yang Dinilai : <?php echo "<b>".$jumlah.' Mahasiswa Yang Dinilai'."</b>"; ?></label>
<br>


<br>
<?php 
  $datattd = $koneksi->query("SELECT * FROM ttd_uppl")->fetch_array();

?>
<div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Kandangan, <?php echo tgl_indo(date('Y-m-d')); ?><br>
    <?php echo $datattd['jabatan']?>
    <br><br><br><br><br><br>
    <?php echo $datattd['kepalaUppl']?><br>
    NIP. <?php echo $datattd['nip']?>
  </h5>

</div> 


</body>
</html>
<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;
    $id   =  $_GET['id']; 

    $datappl = $koneksi->query("SELECT * FROM daftarpkl AS dp 
    LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
    LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
    LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing WHERE dp.id_daftar = '$id'")->fetch_array(); 
    // $jumlah = mysqli_num_rows($datappl);

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
    <title>LAPORAN DATA BIMBINGAN PKL</title>
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
        LAPORAN DATA BIMBINGAN PKL<br> 
    </center></h3><br><br>
                    <div class="row">
                    <div class="col-sm-12">
                    <table border="0" width="60%" style="text-align: left; font-size: 15; " cellpadding=" 1">
            <tr style="vertical-align: top;">
                <th width="30%">NPM/NIM/NIS</th>
                <td>:</td>
                <td><b><?= strtoupper($datappl['npm'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="30%">Nama </th>
                <td>:</td>
                <td><b><?= strtoupper($datappl['nama'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="30%">JK </th>
                <td>:</td>
                <td><b><?= strtoupper($datappl['jk'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Prodi/Jurusan</th>
                <td>:</td>
                <td><b><?= strtoupper($datappl['prodi'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Agama</th>
                <td>:</td>
                <td><b><?= strtoupper($datappl['agama'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th>Alamat</th>
                <td>:</td>
                <td><b><?= strtoupper($datappl['alamat'])?></b></td>
            </tr>
            <tr style="vertical-align: top;">
                <th width="40%">Telp/No. Whatsapp</th>
                <td>:</td>
                <td><b><?= strtoupper($datappl['telp'])?></b></td>
            </tr>
        </table>
        <hr>
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                            <thead>
                                <tr align="center"></tr>
                                <th>Tanggal</th>
                                <th>Agenda</th>
                                <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php 
                            $no = 1;
                            $data = $koneksi->query("SELECT * FROM agenda WHERE id_daftar = '$id' ORDER BY tgl_agenda DESC");
                            while ($row = $data->fetch_array()) {
                            ?>
                            <tr>
                                <td><?= $row['tgl_agenda'] ?></td>
                                <td><?= $row['nama_agenda'] ?></td>
                                <td>
                                    
                                        <?php if ($row['ket_agenda'] == "Belum Terverifikasi") { ?>
                                        <span class="badge badge-danger"><?= $row['ket_agenda'] ?></span>
                                        <?php } else { ?>
                                        <span class="badge badge-success"><?= $row['ket_agenda'] ?></span>
                                        <?php } ?>
                                    
                                    
                                
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>

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

</div> 


</body>
</html>
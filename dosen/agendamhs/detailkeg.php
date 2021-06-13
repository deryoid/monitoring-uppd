<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php'; 

      $id   =  $_GET['id']; 

      $datappl = $koneksi->query("SELECT * FROM daftarppl AS dp 
                  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_daftar = '$id'")->fetch_array(); 

?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kegiatan Mahasiswa</h1>
        </div>

        </div>
    </div>
    </div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Kegiatan Mahasiswa</h3>
                    <div class="card-tools">
                        <a href="print" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-print"></i>
                        </a>
                </div>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="saveformulir">
                    <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-4">NPM :</dt>
                          <dd class="col-sm-8"><?php echo $datappl['npm']; ?></dd>
                          <dt class="col-sm-4">Nama Mahasiswa :</dt>
                          <dd class="col-sm-8"><?php echo $datappl['nama']; ?></dd>
                          <dt class="col-sm-4">Prodi :</dt>
                          <dd class="col-sm-8"><?php echo $datappl['prodi']; ?></dd>
                          <dt class="col-sm-4">Sekolah :</dt>
                          <dd class="col-sm-8"><?php echo $datappl['nama_sekolah'];?></dd>
                          <dt class="col-sm-4">Dosen Pembimbing :</dt>
                          <dd class="col-sm-8"><?php echo $datappl['nama_dosen']; ?></dd>
                        </dl>
                            <table id="example2" class="table table-bordered table-striped" style="background-color: ">
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
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <?php if ($row['ket_agenda'] == "Belum Terverifikasi") { ?>
                                        <span class="badge badge-danger"><?= $row['ket_agenda'] ?></span>
                                        <?php } else { ?>
                                        <span class="badge badge-success"><?= $row['ket_agenda'] ?></span>
                                        <?php } ?>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="verifagend?id=<?= $row['id_agenda'] ?>&v=Terverifikasi">Terverifikasi</a>
                                      <a class="dropdown-item" href="verifagend?id=<?= $row['id_agenda'] ?>&v=Belum Terverifikasi">Belum Terverfikasi</a>
                                    </div>
                                
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            </table> 
                 </div>

                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>

<?php 
    include '../../templates/footer.php'; 

?>



<?php 
    if (isset($_POST['submit'])) {
        $npm            = $_POST['npm'];
        $nama           = $_POST['nama'];
        $prodi          = $_POST['prodi'];
        $agama          = $_POST['agama'];
        $alamat         = $_POST['alamat'];
        $telp           = $_POST['telp'];


//upload foto mhs
        $e = "";
// CEK APAKAH FOTO DIGANTI
        if (!empty($_FILES['foto']['name'])) {
            $fotolama = $data['foto'];

            // UPLOAD FOTO PEMOHON
            $foto      = $_FILES['foto']['name'];
            $x_foto    = explode('.', $foto);
            $ext_foto  = end($x_foto);
            $nama_foto = rand(1, 99999) . '.' . $ext_foto;
            $size_foto = $_FILES['foto']['size'];
            $tmp_foto  = $_FILES['foto']['tmp_name'];
            $dir_foto  = '../../fotomhs/';
            $allow_ext        = array('png', 'jpg', 'jpeg');
            $allow_size       = 1024 * 1024 * 1;
            // var_dump($nama_foto); die();

            if (in_array($ext_foto, $allow_ext) === true) {
                if ($size_foto <= $allow_size) {
                    move_uploaded_file($tmp_foto, $dir_foto . $nama_foto);
                    if (file_exists($dir_foto . $fotolama)) {
                        unlink($dir_foto . $fotolama);
                    }
                    $e .= "Upload Success"; 
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran Foto Mahasiswa Terlalu Besar, Maksimal 1 Mb',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
                </script>";
                }
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Foto Mahasiswa Tidak Didukung',
                    text:  'Format File Foto Mahasiswa Harus Berupa PNG atau JPG',
                    type: 'warning',
                    timer: 3000,
                    showConfirmButton: true
                });     
            },10);  
            window.setTimeout(function(){ 
                window.history.back();
            } ,2000);   
            </script>";
            }
        } else {    
            $nama_foto = $data['foto']; 
            $e .= "Upload Success!"; 
        }


// upload slip bayar
       $es = "";
// CEK APAKAH FOTO DIGANTI
        if (!empty($_FILES['slip_bayar']['name'])) {
            $slip_bayarlama = $data['slip_bayar'];

            // UPLOAD FOTO PEMOHON
            $slip_bayar      = $_FILES['slip_bayar']['name'];
            $x_slip_bayar    = explode('.', $slip_bayar);
            $ext_slip_bayar  = end($x_slip_bayar);
            $nama_slip_bayar = rand(1, 99999) . '.' . $ext_slip_bayar;
            $size_slip_bayar = $_FILES['slip_bayar']['size'];
            $tmp_slip_bayar  = $_FILES['slip_bayar']['tmp_name'];
            $dir_slip_bayar  = '../../fotoslipbayar/';
            $allow_ext        = array('png', 'jpg', 'jpeg');
            $allow_size       = 1024 * 1024 * 1;
            // var_dump($nama_foto); die();

            if (in_array($ext_slip_bayar, $allow_ext) === true) {
                if ($size_slip_bayar <= $allow_size) {
                    move_uploaded_file($tmp_slip_bayar, $dir_slip_bayar . $nama_slip_bayar);
                    if (file_exists($dir_slip_bayar . $slip_bayarlama)) {
                        unlink($dir_slip_bayar . $slip_bayarlama);
                    }
                    $es .= "Upload Success"; 
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran Foto Slip Pembayar Terlalu Besar, Maksimal 1 Mb',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
                </script>";
                }
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Foto Slip Pembayar Tidak Didukung',
                    text:  'Format File Foto Slip Pembayar Harus Berupa PNG atau JPG',
                    type: 'warning',
                    timer: 3000,
                    showConfirmButton: true
                });     
            },10);  
            window.setTimeout(function(){ 
                window.history.back();
            } ,2000);   
            </script>";
            }
        } else {    
            $nama_slip_bayar = $data['slip_bayar']; 
            $es .= "Upload Success!"; 
        }

if (!empty($e) AND !empty($es)) {
    

    $submit = $koneksi->query("UPDATE mahasiswa SET 
                            npm = '$npm',
                            nama = '$nama',
                            prodi = '$prodi', 
                            agama = '$agama', 
                            alamat = '$alamat', 
                            telp = '$telp', 
                            foto = '$nama_foto', 
                            slip_bayar = '$nama_slip_bayar' 
                            WHERE id_mhs = '$data[id_mhs]'");


    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../datamhs/');</script>";
    }
}

}
?>




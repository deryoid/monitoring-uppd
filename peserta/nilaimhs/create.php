<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

    
$datappl = $koneksi->query("SELECT * FROM daftarppl AS dp 
LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_mhs = '$data[id_mhs]'")->fetch_array();

    
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upload Penilaian</h1>
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
                    <h3 class="card-title">Form Upload Penilaian</h3>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Npm</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="npm" required="" value="<?= $datappl['npm'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama" required="" value="<?= $datappl['nama'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Sekolah</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_sekolah" required="" value="<?= $datappl['nama_sekolah'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Judul</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="judulppl" required="" value="<?= $datappl['judulppl'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="laporan" class="col-sm-1 col-form-label">Laporan PPL(PDF)</label>
                        <div class="col-sm-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 500px; height: 250px;">
                                    <img src="<?= base_url(); ?>/filelaporan/<?= $datappl['laporan']?>" alt="">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 250px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn btn-success btn-file">
                                        <span class="fileupload-new">
                                            <i class="fa fa-images"> Upload Laporan PPL(PDF)</i>
                                        </span>
                                        <span class="fileupload-exists">
                                            <i class="fa fa-images"> Ubah Laporan PPL(PDF)</i>
                                        </span>
                                        <input type="file" name="laporan" >
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i> Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../nilaimhs/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $judulppl            = $_POST['judulppl'];

    
//upload file laporan
$e = "";
// CEK APAKAH FILE LAPORAN
        if (!empty($_FILES['laporan']['name'])) {
            $laporanlama = $data['laporan'];

            // UPLOAD laporan PEMOHON
            $laporan      = $_FILES['laporan']['name'];
            $x_laporan    = explode('.', $laporan);
            $ext_laporan  = end($x_laporan);
            $nama_laporan = rand(1, 99999) . '.' . $ext_laporan;
            $size_laporan = $_FILES['laporan']['size'];
            $tmp_laporan  = $_FILES['laporan']['tmp_name'];
            $dir_laporan  = '../../filelaporan/';
            $allow_ext        = array('pdf');
            $allow_size       = 1024 * 1024 * 16;
            // var_dump($nama_laporan); die();

            if (in_array($ext_laporan, $allow_ext) === true) {
                if ($size_laporan <= $allow_size) {
                    move_uploaded_file($tmp_laporan, $dir_laporan . $nama_laporan);
                    if (file_exists($dir_laporan . $laporanlama)) {
                        unlink($dir_laporan . $laporanlama);
                    }
                    $e .= "Upload Success"; 
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran laporan Mahasiswa Terlalu Besar, Maksimal 1 Mb',
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
                    title: 'Format File laporan Mahasiswa Tidak Didukung',
                    text:  'Format File laporan Mahasiswa Harus Berupa PNG atau JPG',
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
            $nama_laporan = $data['laporan']; 
            $e .= "Upload Success!"; 
        }

        if (!empty($e)){

        $submit = $koneksi->query("UPDATE daftarppl SET 
        judulppl = '$judulppl',
        laporan = '$nama_laporan',
        status_akhir = 'Belum Selesai'
        WHERE id_daftar = '$datappl[id_daftar]'");


        if ($submit) {
            $_SESSION['pesan'] = "Data Berhasil Di Upload";
            echo "<script>window.location.replace('../nilaimhs/');</script>";
        }
    }
    }

?>
<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';


      
      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

      $id = $_GET['id'];
      $data = $koneksi->query("SELECT * FROM sekolah WHERE id_sekolah = '$id'");
      $row = $data->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Sekolah</h1>
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
                    <h3 class="card-title">Form Edit Data Sekolah</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">



                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_sekolah" value="<?= $row['nama_sekolah'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kepala Sekolah</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_kepsek" value="<?= $row['nama_kepsek'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat Sekolah</label>
                        <div class="col-sm-6">
                        <textarea type="text" class="form-control" name="alamat" ><?php echo $row['alamat']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telp Sekolah</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="no_telp" value="<?= $row['no_telp'] ?>">
                        </div>
                    </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../sekolah/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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

<script>
  $(document).ready(function(){       
        $('.form-cek').click(function(){
            if($(this).is(':checked')){
                $('.form-pass').attr('type','text');
            }else{
                $('.form-pass').attr('type','password');
            }
        });
    });
</script>

<?php 
    if (isset($_POST['submit'])) {
        $nama_sekolah    = $_POST['nama_sekolah'];
        $alamat          = $_POST['alamat'];
        $no_telp         = $_POST['no_telp'];
        $nama_kepsek         = $_POST['nama_kepsek'];


    $submit = $koneksi->query("UPDATE sekolah SET nama_sekolah = '$nama_sekolah', alamat = '$alamat', no_telp = '$no_telp', nama_kepsek = '$nama_kepsek' WHERE id_sekolah = '$id'");
    session_start();

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../sekolah/');</script>";
    }
}

?>
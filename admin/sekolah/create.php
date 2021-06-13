<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

    // session_start();
    // if ($_SESSION['role'] !== 'Super Admin') {
    //   echo "<script>window.history.back();</script>";
    // }else{
      
      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Data Sekolah</h1>
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
                    <h3 class="card-title">Form Tambah Data Sekolah</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_sekolah" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kepala Sekolah</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_kepsek" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat Sekolah</label>
                        <div class="col-sm-6">
                        <textarea type="text" class="form-control" name="alamat" required=""></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telp Sekolah</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="no_telp" required="">
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
        $nama_kepsek     = $_POST['nama_kepsek'];

    $submit = $koneksi->query("INSERT INTO sekolah VALUES ('', '$nama_sekolah', '$alamat', '$no_telp', '$nama_kepsek')");

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Ditambahkan";
        echo "<script>window.location.replace('../sekolah/');</script>";
    }
}

?>
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
            <h1 class="m-0 text-dark">Tambah Data Dosen</h1>
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
                    <h3 class="card-title">Form Tambah Data Dosen</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIP/NIK</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nik" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Pembimbing</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_pembimbing" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Hp Pembimbing</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="hp_pembimbing" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamat_pembimbing" required="">
                        </div>
                    </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../pembimbing/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $nik            = $_POST['nik'];
        $nama_pembimbing      = $_POST['nama_pembimbing'];
        $hp_pembimbing     = $_POST['hp_pembimbing'];
        $alamat_pembimbing     = $_POST['alamat_pembimbing'];

    $submit = $koneksi->query("INSERT INTO pembimbing VALUES (NULL, '$nik', '$nama_pembimbing', '$hp_pembimbing', '$alamat_pembimbing')");

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Ditambahkan";
        echo "<script>window.location.replace('../pembimbing/');</script>";
    }
}

?>
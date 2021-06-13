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
            <h1 class="m-0 text-dark">Tambah Data Surat Masuk</h1>
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
                    <h3 class="card-title">Form Tambah Data Surat Masuk</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <!-- <label class="col-sm-2 col-form-label">Tanggal Surat Masuk</label> -->
                        <div class="col-sm-4">
                        <input type="hidden" class="form-control" name="tgl_sm" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. Surat Masuk</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="no_sm" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Isi Surat Masuk</label>
                        <div class="col-sm-6">
                        <textarea type="text" class="form-control" name="isi_sm" required=""></textarea>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Tertera pada Surat Masuk</label>
                        <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl_t_sm" required="">
                        </div>
                    </div>


                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../suratmasuk/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $tgl_sm            = $_POST['tgl_sm'];
        $no_sm            = $_POST['no_sm'];
        $isi_sm      = $_POST['isi_sm'];
        $tgl_t_sm     = $_POST['tgl_t_sm'];

    $submit = $koneksi->query("INSERT INTO surat_masuk VALUES ('', '$tgl_sm', '$no_sm', '$isi_sm', '$tgl_t_sm')");

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Ditambahkan";
        echo "<script>window.location.replace('../suratmasuk/');</script>";
    }
}

?>

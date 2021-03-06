<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';


      
      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

      $id = $_GET['id'];
      $data = $koneksi->query("SELECT * FROM ttd_uppd WHERE idTtd = '$id'");
      $row = $data->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Kepala UPPL</h1>
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
                    <h3 class="card-title">Form Edit Kepala UPPD</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIP/NIDN/NIK</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="nip" value="<?= $row['nip'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Kepala UPPD</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="kepalaUppd" value="<?= $row['kepalaUppd'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="jabatan" value="<?= $row['jabatan'] ?>">
                        </div>
                    </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../kepalauppl/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $nip        = $_POST['nip'];
        $kepalaUppd = $_POST['kepalaUppd'];
        $jabatan    = $_POST['jabatan'];

    $submit = $koneksi->query("UPDATE ttd_uppd SET nip = '$nip', kepalaUppd = '$kepalaUppd', jabatan = '$jabatan' WHERE idTtd = '$id'");

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../kepalauppd/');</script>";
    }
}

?>
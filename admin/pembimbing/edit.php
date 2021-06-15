<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';


      
      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

      $id = $_GET['id'];
      $data = $koneksi->query("SELECT * FROM dosen AS d LEFT JOIN user AS u ON d.id_user = u.id_user WHERE d.id_dosen = '$id'");
      $row = $data->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Data Dosen</h1>
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
                    <h3 class="card-title">Form Edit Data Dosen</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No. User</label>
                        <div class="col-sm-10">
                        <span class="badge badge-success"><?= $row['id_user'] ?></span> / <span class="badge badge-info"><?= $row['username'] ?></span>
                        </div>
                    </div>                    

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIDN/NIK</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="nidn" value="<?= $row['nidn'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_dosen" value="<?= $row['nama_dosen'] ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-3">
                            <select class="form-control select2" data-placeholder="Pilih Prodi" id="prodi_dosen" name="prodi_dosen" required="">
                                    <option value="Pendidikan Olahraga" <?php if ($row['prodi_dosen'] == "Pendidikan Olahraga") {
                                                              echo "selected";
                                                            } ?>>Pendidikan Olahraga</option>
                                    <option value="Pendidikan Kimia" <?php if ($row['prodi_dosen'] == "Pendidikan Kimia") {
                                                                echo "selected";
                                                              } ?>>Pendidikan Kimia</option>
                                    <option value="Pendidikan Bahasa Inggris" <?php if ($row['prodi_dosen'] == "Pendidikan Bahasa Inggris") {
                                                                echo "selected";
                                                              } ?>>Pendidikan Bahasa Inggris</option>
                                    <option value="Bimbingan dan Konseling" <?php if ($row['prodi_dosen'] == "Bimbingan dan Konseling") {
                                                                echo "selected";
                                                              } ?>>Bimbingan dan Konseling</option>
                            </select>
                        </div>
                    </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../dosen/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $nidn            = $_POST['nidn'];
        $nama_dosen      = $_POST['nama_dosen'];
        $prodi_dosen     = $_POST['prodi_dosen'];


    $submit = $koneksi->query("UPDATE dosen SET nidn = '$nidn', nama_dosen = '$nama_dosen', prodi_dosen = '$prodi_dosen' WHERE id_dosen = '$id'");
    session_start();

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../dosen/');</script>";
    }
}

?>
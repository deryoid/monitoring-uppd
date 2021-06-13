<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah User</h1>
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
                    <h3 class="card-title">Form Tambah User</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Username</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="username" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Password</label>
                        <div class="col-sm-4">
                        <input type="password" class="form-control form-pass" name="password" required="">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                          <small>
                            <input class="border-checkbox form-cek" type="checkbox" id="checkbox1">
                            <label class="border-checkbox-label" for="checkbox1">Tampilkan Password</label>
                            </small>
                        </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Role</label>
                        <div class="col-sm-3">
                            <select class="form-control select2" data-placeholder="Pilih Role" id="role" name="role" required="">
                                <option value="">-Pilih-</option>
                                <option value="Admin">Admin</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                    </div>



                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../user/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $role  = $_POST['role'];

    $submit = $koneksi->query("INSERT INTO user VALUES ('','$username', '$password', '$role')");

    if ($submit) {
        if ($role == "Mahasiswa"){
        $idum =  $koneksi->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1")->fetch_array();
        $koneksi->query("INSERT INTO mahasiswa (id_user) VALUES ('$idum[id_user]')");

        $datau = $koneksi->query("SELECT * FROM mahasiswa WHERE id_user = '$idum[id_user]'")->fetch_array();
        $koneksi->query("INSERT INTO daftarppl (id_mhs) VALUES ('$datau[id_mhs]')");
    }elseif ($role == "Dosen") {
        $idud =  $koneksi->query("SELECT * FROM user ORDER BY id_user DESC LIMIT 1")->fetch_array();
        $koneksi->query("INSERT INTO dosen (id_user) VALUES ('$idud[id_user]')");
    }
        $_SESSION['pesan'] = "Data Berhasil Ditambahkan";
        echo "<script>window.location.replace('../user/');</script>";
    }
}

?>
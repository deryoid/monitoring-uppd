<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

      $id = $_GET['id'];
      $data = $koneksi->query("SELECT * FROM user  WHERE id_user = '$id'");
      $row = $data->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit User</h1>
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
                    <h3 class="card-title">Form Edit User</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Username</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="username" required="" value="<?= $row['username'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Password</label>
                        <div class="col-sm-4">
                        <input type="password" class="form-control form-pass" name="password">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                          <small>
                            <input class="border-checkbox form-cek" type="checkbox" id="checkbox1">
                            <label class="border-checkbox-label" for="checkbox1">Tampilkan Password</label>
                            </small>
                        </div>
                        </div>
                        <label style="color: red; font-style: italic; font-size: 12px;">* Kosongkan Password Jika Tidak Diubah</label>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Role</label>
                        <div class="col-sm-3">
                            <select class="form-control select2" data-placeholder="Pilih Role" id="role" name="role" required="">
                                    <option value="Admin" <?php if ($row['role'] == "Admin") {
                                                              echo "selected";
                                                            } ?>>Admin</option>
                                    <option value="Pimpinan" <?php if ($row['role'] == "Pimpinan") {
                                                                echo "selected";
                                                              } ?>>Pimpinan</option>
                                    <option value="Peserta" <?php if ($row['role'] == "Peserta") {
                                                                echo "selected";
                                                              } ?>>Peserta</option>
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

        $('#role').on('change', function() {
            if ( this.value == '7'){
            $("#lembaga").slideDown("fast");
          }else{
            $("#lembaga").slideUp("fast");
        }
       
    });

    });
</script>

<?php 
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];

        if (!empty($_POST['password'])) {
           $password = md5($_POST['password']);
        }else{
            $password = $row['password'];
        }
        $role  = $_POST['role'];


    $submit = $koneksi->query("UPDATE user SET username = '$username', password = '$password', role = '$role' WHERE id_user = '$id'");


    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../user/');</script>";
    }
}

?>
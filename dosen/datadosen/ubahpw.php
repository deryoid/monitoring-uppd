<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

          include '../../templates/head.php'; 
          include '../../templates/navbar.php';
          include '../../templates/sidebar.php';  

$datau = $koneksi->query("SELECT * FROM user AS u LEFT JOIN dosen AS d ON u.id_user = d.id_user WHERE u.id_user = '$data2[id_user]'")->fetch_array();



?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ubah Password</h1>
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
                    <h3 class="card-title">Ubah Password</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Username</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="username" required="" value="<?= $datau['username'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Password</label>
                        <div class="col-sm-3">
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




                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../datamhs/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
    
        $password = md5($_POST['password']);
        


    $submit = $koneksi->query("UPDATE user SET  password = '$password' WHERE id_user = '$data[id_user]'");


    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../datadosen/');</script>";
    }
}

?>
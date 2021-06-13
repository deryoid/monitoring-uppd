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
            <h1 class="m-0 text-dark">Profil</h1>
        </div>

        </div>
    </div>
    </div>

<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">
               <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
                <div class="alert alert-primary success-alert" role="alert">
                     <i class="fa fa-check"> <?= $_SESSION['pesan']; ?></i>
                  </div>
                <?php } $_SESSION['pesan'] = ''; ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-right">
                <a href="ubahpw" class="btn btn-info"><i class="fa fa-key mr-1"></i>Ubah Password</a>
                <a href="edit" class="btn btn-success"><i class="fa fa-user-edit mr-1"></i>Data Diri Dosen</a>
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
          <!-- ./col -->
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-address-card"></i>
                  Profil Data Diri Dosen
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">NIDN </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data2['nidn']; ?></dd>
                  <dt class="col-sm-4">Nama Dosen </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data2['nama_dosen']; ?></dd>
                  <dt class="col-sm-4">Agama </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data2['agama']; ?></dd>
                  <dt class="col-sm-4">Tempat/Tgl Lahir </dt>
                  <dd class="col-sm-8"><?php if($data2['tgl_lahir']=='0000-00-00'){ echo " - "; } else { echo ": ".$data2['tmp_lahir']." / ".tgl_indo($data2['tgl_lahir']); }?></dd>
                  <dt class="col-sm-4">Prodi Mengajar </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data2['prodi_dosen']; ?></dd>
                  <dt class="col-sm-4">Telp/No. Whatsapp </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data2['hp_dosen']; ?></dd>
                  <dt class="col-sm-4">Alamat </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data2['alamat_dosen']; ?></dd>
                  <dt class="col-sm-4">Email </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data2['email']; ?></dd>
                  <dt class="col-sm-4">Foto </dt>
                  <dd class="col-sm-8"> <img style="text-align: center;" width="250px" height="300px" src="<?php echo base_url() ?>/fotodosen/<?php echo$data2['foto']?>"></dd>
                  
                </dl>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->


          </div>
        </div>
    </div>


    </div>
    </div>
</div>
</section>

</div>

<?php 
    include '../../templates/footer.php'; 
    
?>
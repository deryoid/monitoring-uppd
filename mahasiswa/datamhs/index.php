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
                <a href="edit" class="btn btn-success"><i class="fa fa-user-edit mr-1"></i>Formulir Daftar PPL</a>
                <a href="print?id=<?= $data['id_mhs'];?>" class="btn btn-primary" target="blank"><i class="fa fa-print mr-1"></i>Print Formulir</a>
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
          <!-- ./col -->
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-address-card"></i>
                  Profil Data Diri Mahasiswa
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">NPM </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['npm']; ?></dd>
                  <dt class="col-sm-4">Nama Mahasiswa </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['nama']; ?></dd>
                  <dt class="col-sm-4">Prodi </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['prodi']; ?></dd>
                  <dt class="col-sm-4">Agama </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['agama']; ?></dd>
                  <dt class="col-sm-4">Alamat </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['alamat']; ?></dd>
                  <dt class="col-sm-4">Telp/No. Whatsapp </dt>
                  <dd class="col-sm-8"><?php echo ": ".$data['telp']; ?></dd>
                  
                </dl>
              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-image"></i>
                  Foto
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                
                  <img style="text-align: center;" width="250px" height="300px" src="<?= base_url() ?>/fotomhs/<?= $data['foto']?>">
                
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
<?php 
    require '../config/config.php';
    include '../config/koneksi.php';
      
  include '../templates/head.php'; 
  include '../templates/navbar.php';
  include '../templates/sidebar.php'; 

  $pengumuman = $koneksi->query("SELECT * FROM pengumuman ORDER BY id_p DESC");


?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard </li>
            </ol>
        </div>

        </div>
    </div>
    </div>

          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="alert alert-success" role="alert">
          <h5><b>
            <i class="fa fa-info-circle"></i>
            "Selamat Datang <?php echo $data['nama']; ?>"
          </b></h5>
        </div>

        <div class="row">
          <!-- /.col -->
          <?php foreach ($pengumuman as $p) { ?>
          <div class="col-md-12">
            
          
            <!-- Box Comment -->
            <div class="card card-widget" >
              <div class="card-header" style="background-color:dodgerblue;">
                <div class="user-block">
                  <img class="img-circle" src="<?= base_url() ?>/assets/dist/img/logo-kalsel.png" alt="User Image">
                  <span class="username" ><a href="#" style="color:white;">UPPL UNISKA</a></span>
                  <span class="description" style="color:white;">Diposting pada <?php echo tgl_indo($p['tgl_p']);?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="far fa-circle"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button> -->
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <h3><?php echo $p['judul'];?></h3>
<hr>
                <p><?php echo $p['isi'];?></p>
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          </div>
          <?php }?>
        </div>
        <!-- /.row -->






      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


<?php 
    include '../templates/footer.php'; 

?>

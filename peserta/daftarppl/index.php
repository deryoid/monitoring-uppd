<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

$datappl = $koneksi->query("SELECT * FROM daftarppl AS dp 
                  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_mhs = '$data[id_mhs]'")->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informasi Status PPL</h1>
        </div>

        </div>
    </div>
    </div>

<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
              <?php if ($datappl['status'] == "Terverifikasi") { ?>
                <a href="suratpengantar?id=<?=$datappl['id_mhs']?>" class="btn btn-info" target="blank"><i class="fa fa-file-alt mr-1"></i>Cetak Surat Pengantar Sekolah</a>
              <?php }else{} ?>
              <!-- <a href="printbukti" class="btn btn-info"><i class="fa fa-file-alt mr-1"></i>Bukti Verifikasi</a> -->
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

       <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
            <div class="alert alert-primary success-alert" role="alert">
                 <i class="fa fa-check"> <?= $_SESSION['pesan']; ?></i>
              </div>
        <?php } $_SESSION['pesan'] = ''; ?>

        <div class="card-body">
          <!-- ./col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-school"></i>
                  Status PPL
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">NPM :</dt>
                  <dd class="col-sm-8"><?php echo $datappl['npm']; ?></dd>
                  <dt class="col-sm-4">Nama Mahasiswa :</dt>
                  <dd class="col-sm-8"><?php echo $datappl['nama']; ?></dd>
                  <dt class="col-sm-4">Prodi :</dt>
                  <dd class="col-sm-8"><?php echo $datappl['prodi']; ?></dd>
                  <dt class="col-sm-4">Sekolah :</dt>
                  <dd class="col-sm-8"><?php echo $datappl['nama_sekolah'];?></dd>
                  <dt class="col-sm-4">Dosen Pembimbing :</dt>
                  <dd class="col-sm-8"><?php echo $datappl['nama_dosen']; ?></dd>
                  <dt class="col-sm-4">No. Telp/Whatsapp Dosen :</dt>
                  <dd class="col-sm-8"><?php echo $datappl['hp_dosen']; ?></dd>
                  <dt class="col-sm-4">Status :</dt>
                  <dd class="col-sm-8">
                       <?php if ($datappl['status'] == "Belum Terverifikasi") { ?>
                        <span class="badge badge-danger"><?= $datappl['status'] ?></span>
                        <?php } else { ?>
                        <span class="badge badge-success"><?= $datappl['status'] ?></span>
                        <?php } ?>
                  </dd>
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
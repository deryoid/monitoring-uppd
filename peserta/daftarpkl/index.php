<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

$datappl = $koneksi->query("SELECT * FROM daftarpkl AS dp 
                  LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
                  LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
                  LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing WHERE dp.id_peserta = '$data[id_peserta]'")->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informasi Status PKL</h1>
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
                  <i class="fas fa-building"></i>
                  Status Praktik Kerja Lapangan
                </h3>
              </div>
              <!-- /.card-header -->

              <div class="card-body">
                <dl class="row">
                  <dt class="col-sm-4">NPM/NIM/NIS </dt>
                  <dd class="col-sm-8"><?php echo ": ".$datappl['npm']; ?></dd>
                  <dt class="col-sm-4">Nama </dt>
                  <dd class="col-sm-8"><?php echo ": ".$datappl['nama']; ?></dd>
                  <dt class="col-sm-4">Prodi/Jurusan </dt>
                  <dd class="col-sm-8"><?php echo ": ".$datappl['prodi']; ?></dd>
                  <dt class="col-sm-4">Ditempatkan </dt>
                  <dd class="col-sm-8"><?php echo ": ".$datappl['nama_bagian'];?></dd>
                  <dt class="col-sm-4">Pembimbing </dt>
                  <dd class="col-sm-8"><?php echo ": ".$datappl['nama_pembimbing']; ?></dd>
                  <dt class="col-sm-4">No. Telp/Whatsapp Dosen </dt>
                  <dd class="col-sm-8"><?php echo ": ".$datappl['hp_pembimbing']; ?></dd>
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
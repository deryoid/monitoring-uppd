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
            <h1 class="m-0 text-dark">Penilaian PKL</h1>
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
              <a href="create" class="btn btn-info"><i class="fa fa-file-alt mr-1"></i>Upload Laporan/Agenda PKL</a>
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

                <h3 class="card-title">
                  <i class="fas fa-user"></i>
                  Status PPL
                </h3><br><br>

                <dl class="row">
                  <dt class="col-sm-4">NPM/NIM/NIS </dt>
                  <dd class="col-sm-8">: <?php echo $datappl['npm']; ?></dd>
                  <dt class="col-sm-4">Nama </dt>
                  <dd class="col-sm-8">: <?php echo $datappl['nama']; ?></dd>
                  <dt class="col-sm-4">Bagian</dt>
                  <dd class="col-sm-8">: <?php echo $datappl['nama_bagian'];?></dd>
                  <dt class="col-sm-4">Judul Laporan </dt>
                  <dd class="col-sm-8">: <?php echo $datappl['judulpkl']; ?></dd>
                  <dt class="col-sm-4">File </dt>
                  <dd class="col-sm-8">: 
                  <a href="<?= base_url(); ?>/filelaporan/<?= $datappl['laporan']?>" data-toggle="lightbox" data-title="Laporan" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a>
                  </dd>
                  <dt class="col-sm-4">Nilai </dt>
                  <dd class="col-sm-8">: <?php echo $datappl['nilaipkl']; ?></dd>
                  <?php if ($datappl['status_akhir'] == "Selesai") { ?>
                  <dt class="col-sm-4">Sertifikat </dt>
                  <dd class="col-sm-8">: 
                  <a href="sertifikat?id=<?= $datappl['id_peserta'];?>" class="btn btn-info" target="blank"><i class="fa fa-file mr-1"></i>Sertifikat</a>
                  </dd>
                  <?php }else{} ?>
                </dl>



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
<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php'; 

      $id   =  $_GET['id']; 

      $datappl = $koneksi->query("SELECT * FROM daftarpkl AS dp 
      LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
      LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
      LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing WHERE dp.id_daftar = '$id'")->fetch_array(); 

?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Penilaian Peserta</h1>
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
                    <h3 class="card-title">Penilaian Peserta</h3>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="saveformulir">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">NPM/NIM/NIS </dt>
                            <dd class="col-sm-8">: <?php echo $datappl['npm']; ?></dd>
                            <dt class="col-sm-4">Nama </dt>
                            <dd class="col-sm-8">: <?php echo $datappl['nama']; ?></dd>
                            <dt class="col-sm-4">Bagian </dt>
                            <dd class="col-sm-8">: <?php echo $datappl['nama_bagian'];?></dd>
                            <dt class="col-sm-4">File Laporan </dt>
                            <dd class="col-sm-8">: 
                            <a href="<?= base_url(); ?>/filelaporan/<?= $datappl['laporan']?>" data-toggle="lightbox" data-title="Laporan" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a>
                            </dd>
                            <dt class="col-sm-4">Nilai </dt>
                            <dd class="col-sm-2">
                            <input type="text" class="form-control" name="nilaipkl" required="" value="<?= $datappl['nilaipkl'] ?>">
                            </dd>
                                <dt class="col-sm-4">
                                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Nilai</button>
                                </dt>
                        </dl>
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



<?php 
    if (isset($_POST['submit'])) {
        $nilaipkl = $_POST['nilaipkl'];

    $submit = $koneksi->query("UPDATE daftarpkl SET nilaipkl = '$nilaipkl', status_akhir = 'Selesai' WHERE id_daftar = '$id'");
    session_start();

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../nilaipeserta/');</script>";
    }
}
?>




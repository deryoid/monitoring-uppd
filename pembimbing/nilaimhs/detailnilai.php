<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php'; 

      $id   =  $_GET['id']; 

      $datappl = $koneksi->query("SELECT * FROM daftarppl AS dp 
                  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_daftar = '$id'")->fetch_array(); 

?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Penilaian Mahasiswa</h1>
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
                    <h3 class="card-title">Penilaian Mahasiswa</h3>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="saveformulir">
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4">NPM :</dt>
                            <dd class="col-sm-8"><?php echo $datappl['npm']; ?></dd>
                            <dt class="col-sm-4">Nama Mahasiswa :</dt>
                            <dd class="col-sm-8"><?php echo $datappl['nama']; ?></dd>
                            <dt class="col-sm-4">Sekolah :</dt>
                            <dd class="col-sm-8"><?php echo $datappl['nama_sekolah'];?></dd>
                            <dt class="col-sm-4">File Laporan :</dt>
                            <dd class="col-sm-8">
                            <a href="<?= base_url(); ?>/filelaporan/<?= $datappl['laporan']?>" data-toggle="lightbox" data-title="Laporan" data-gallery="galery" title="Lihat" target="blank"><i>Lihat File</i></a>
                            </dd>
                            <dt class="col-sm-4">Nilai :</dt>
                            <dd class="col-sm-2">
                            <input type="text" class="form-control" name="nilaippl" required="" value="<?= $datappl['nilaippl'] ?>">
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
        $nilaippl = $_POST['nilaippl'];

    $submit = $koneksi->query("UPDATE daftarppl SET nilaippl = '$nilaippl', status_akhir = 'Selesai' WHERE id_daftar = '$id'");
    session_start();

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../nilaimhs/');</script>";
    }
}
?>




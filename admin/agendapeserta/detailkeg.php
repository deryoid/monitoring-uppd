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
            <h1 class="m-0 text-dark">Kegiatan Praktik Kerja Lapangan</h1>
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
                    <h3 class="card-title">Kegiatan Praktik Kerja Lapangan</h3>
                    <div class="card-tools">
                        <a href="index" class="btn btn-danger" ><i class="fas fa-back">Kembali</i>
                        </a>
                </div>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="saveformulir">
                    <div class="card-body">
                        <dl class="row">
                          <dt class="col-sm-4">NPM/NIM/NIS</dt>
                          <dd class="col-sm-8">: <?php echo $datappl['npm']; ?></dd>
                          <dt class="col-sm-4">Nama </dt>
                          <dd class="col-sm-8">: <?php echo $datappl['nama']; ?></dd>
                          <dt class="col-sm-4">Prodi/Jurusan</dt>
                          <dd class="col-sm-8">: <?php echo $datappl['prodi']; ?></dd>
                          <dt class="col-sm-4">Bagian Penempatan </dt>
                          <dd class="col-sm-8">: <?php echo $datappl['nama_bagian'];?></dd>
                          <dt class="col-sm-4">Pembimbing </dt>
                          <dd class="col-sm-8">: <?php echo $datappl['nama_pembimbing']; ?></dd>
                        </dl>
                            <table id="example2" class="table table-bordered table-striped" style="background-color: ">
                            <thead>
                                <tr align="center"></tr>
                                <th>Tanggal</th>
                                <th>Agenda</th>
                                <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php 
                            $no = 1;
                            $data = $koneksi->query("SELECT * FROM agenda WHERE id_daftar = '$id' ORDER BY tgl_agenda DESC");
                            while ($row = $data->fetch_array()) {
                            ?>
                            <tr>
                                <td><?= $row['tgl_agenda'] ?></td>
                                <td><?= $row['nama_agenda'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <?php if ($row['ket_agenda'] == "Belum Terverifikasi") { ?>
                                        <span class="badge badge-danger"><?= $row['ket_agenda'] ?></span>
                                        <?php } else { ?>
                                        <span class="badge badge-success"><?= $row['ket_agenda'] ?></span>
                                        <?php } ?>
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="verifagend?id=<?= $row['id_agenda'] ?>&v=Terverifikasi">Terverifikasi</a>
                                      <a class="dropdown-item" href="verifagend?id=<?= $row['id_agenda'] ?>&v=Belum Terverifikasi">Belum Terverfikasi</a>
                                    </div>
                                
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            </table> 
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


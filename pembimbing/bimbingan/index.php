<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

$datappl = $koneksi->query("SELECT * FROM daftarppl AS dp 
                  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_dosen = '$data2[id_dosen]'")->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Bimbingan PPL</h1>
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
            <a href="print" class="btn btn-info" target="blank" ><i class="fa fa-print mr-1"></i>Print</a>
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
            <table id="example1" class="table table-bordered table-striped" style="background-color: ">
                <thead>
                <tr align="center"></tr>
                    <!-- <th>No</th> -->
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Sekolah</th>
                    <th>No. Telp/ WA</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM daftarppl AS dp 
                                                    LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                                                    LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                                                    LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen
                                                  WHERE dp.id_dosen = '$data2[id_dosen]'");
                        while ($row = $data->fetch_array()) {
                     ?>
                    <tr>
                    <!-- <td align="center"><?= $no++; ?></td> -->
                    <td><?= $row['npm'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['prodi'] ?></td>
                    <td><?= $row['nama_sekolah'] ?></td>
                    <td><?= $row['telp'] ?></td>

<!--                         <td align="center">
                            <a href="edit?id=<?= $row['id_daftar'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="delete?id=<?= $row['id_daftar'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                        </td> -->
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

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
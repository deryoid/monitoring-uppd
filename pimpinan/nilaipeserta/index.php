<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

    include '../../templates/head.php'; 
    include '../../templates/navbar.php';
    include '../../templates/sidebar.php';  

// $datappl = $koneksi->query("SELECT * FROM daftarpkl AS dp 
// LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
// LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
// LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing
// WHERE dp.id_pembimbing")->fetch_array();
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
    <div class="col-12">

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="print" target="blank" class="btn btn-info"><i class="fa fa-file-alt mr-1"></i>Print</a>
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

       <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
            <div class="alert alert-primary success-alert" role="alert">
                 <i class="fa fa-check"> <?= $_SESSION['pesan']; ?></i>
              </div>
        <?php } $_SESSION['pesan'] = ''; ?>

            <table id="example1" class="table table-bordered table-striped" style="background-color: ">
                <thead>
                <tr align="center"></tr>
                    <th>No</th>
                    <th>NPM/NIM/NIS</th>
                    <th>Nama</th>
                    <th>Prodi/Jurusan</th>
                    <th>Bagian</th>
                    <th>Nilai</th>
                    <th>Pilihan</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM daftarpkl AS dp 
                        LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
                        LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
                        LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing
                      WHERE dp.id_pembimbing");
                        while ($row = $data->fetch_array()) {
                     ?>
                    <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $row['npm'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['prodi'] ?></td>
                    <td><?= $row['nama_bagian'] ?></td>
                    <td><?= $row['nilaipkl'] ?></td>
                        <td align="center">
                            <a href="detailnilai?id=<?= $row['id_daftar'] ?>" class="btn btn-success btn-sm" title="Detail"><i class="fa fa-user-edit"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>   
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
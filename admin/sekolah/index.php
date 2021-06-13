<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';
    // if ($_SESSION['role'] !== 'Admin') {
    //   echo "<script>window.history.back();</script>";
    // }else{
      
      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Sekolah</h1>
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
                <a href="print" class="btn btn-info" target="blank"><i class="fa fa-print mr-1"></i>Print</a>
                <a href="create" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Tambah Data Sekolah</a>
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
                    <th>Nama Sekolah</th>
                    <th>Nama Kepsek Sekolah</th>
                    <th>Alamat Sekolah</th>
                    <th>No. Telp Sekolah</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Pilihan</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM sekolah ORDER BY id_sekolah ASC");
                        while ($row = $data->fetch_array()) {
                            $jmlmhs = $koneksi->query("SELECT COUNT(id_mhs) AS jml FROM daftarppl WHERE id_sekolah = '$row[id_sekolah]' GROUP BY id_sekolah")->fetch_array();
                     ?>
                    <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $row['nama_sekolah'] ?></td>
                    <td><?= $row['nama_kepsek'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['no_telp'] ?></td>
                    <td><?= $jmlmhs['jml'] ?></td>
                        <td align="center">
                            <a href="edit?id=<?= $row['id_sekolah'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="delete?id=<?= $row['id_sekolah'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
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
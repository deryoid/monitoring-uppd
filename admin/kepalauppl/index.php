<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';

    include '../../templates/head.php'; 
    include '../../templates/navbar.php';
    include '../../templates/sidebar.php';  

?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Kepala UPPL</h1>
        </div>

        </div>
    </div>
    </div>

<section class="content">
<div class="container-fluid">
<div class="row">
    <div class="col-12">

    <div class="card">
        <!-- <div class="card-header">
            <h3 class="card-title">
                <a href="create" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Tambah Kepala UPPL</a>
            </h3>
        </div> -->

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
                    <th>NIP/NIK/NIDN</th>
                    <th>Kepala UPPL</th>
                    <th>Jabatan</th>
                    <th>Pilihan</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM ttd_uppl ORDER BY idTtd ASC");
                        while ($row = $data->fetch_array()) {
                     ?>
                    <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $row['nip'] ?></td>
                    <td><?= $row['kepalaUppl'] ?></td>
                    <td><?= $row['jabatan'] ?></td>
                        <td align="center">
                            <a href="edit?id=<?= $row['idTtd'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                            <!-- <a href="delete?id=<?= $row['idTtd'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a> -->
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
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
            <h1 class="m-0 text-dark">Data Dosen</h1>
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
                <!-- <a href="create" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Tambah Data Dosen</a> -->
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
                    <!-- <th>No</th> -->
                    <th>NIDN/NIK</th>
                    <th>Nama Dosen</th>
                    <th>Prodi Mengajar</th>
                    <th>No. User</th>
                    <th>Pilihan</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM dosen AS d LEFT JOIN user AS u ON d.id_user = u.id_user ORDER BY d.id_dosen ASC");
                        while ($row = $data->fetch_array()) {
                     ?>
                    <tr>
                    <!-- <td align="center"><?= $no++; ?></td> -->
                    <td><?= $row['nidn'] ?></td>
                    <td><?= $row['nama_dosen'] ?></td>
                    <td><?= $row['prodi_dosen'] ?></td>
                    <td align="center"><span class="badge badge-success"><?= $row['id_user'] ?></span> / <span class="badge badge-info"><?= $row['username'] ?></span></td>
                        <td align="center">
                            <a href="edit?id=<?= $row['id_dosen'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="delete?id=<?= $row['id_dosen'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
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
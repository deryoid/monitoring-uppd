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
            <h1 class="m-0 text-dark">Data Surat Masuk</h1>
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
                <a href="create" class="btn btn-primary"><i class="fa fa-plus-circle mr-1"></i>Tambah Data Surat Masuk</a>
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
                    <th>Tanggal Surat Masuk</th>
                    <th>No. Surat</th>
                    <th>Isi Surat</th>
                    <th>Tanggal Tertera</th>
                    <th>Pilihan</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM surat_masuk  ORDER BY id_sm DESC");
                        while ($row = $data->fetch_array()) {
                     ?>
                    <tr>
                    <!-- <td align="center"><?= $no++; ?></td> -->
                    <td><span class="badge badge-success"><?= tgl_indo($row['tgl_sm']) ?></span></td>
                    <td><?= $row['no_sm'] ?></td>
                    <td><?= $row['isi_sm'] ?></td>
                    <td><?= tgl_indo($row['tgl_t_sm']) ?></td>
                        <td align="center">
                            <a href="edit?id=<?= $row['id_sm'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="delete?id=<?= $row['id_sm'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
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
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
            <h1 class="m-0 text-dark">Data Daftar PPL</h1>
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
                <a href="#" class="btn btn-info" target="blank" data-toggle="modal" data-target="#modal_print"><i class="fa fa-print mr-1"></i>Print</a>
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
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Dosen Pembimbing</th>
                    <th>Sekolah</th>
                    <th>Tanggal PPL</th>
                    <th>No.Telp</th>
                    <th>Verifikasi</th>
                    <th>Pilihan</th>
                </tr>
                </thead>

                <tbody>
                    <?php 
                        $no = 1;
                        $data = $koneksi->query("SELECT * FROM daftarppl AS dp 
                                                    LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                                                    LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                                                    LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen
                                                  ORDER BY dp.id_daftar DESC");
                        while ($row = $data->fetch_array()) {
                     ?>
                    <tr>
                    <!-- <td align="center"><?= $no++; ?></td> -->
                    <td><?= $row['npm'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['prodi'] ?></td>
                    <td><?= $row['nama_dosen'] ?></td>
                    <td><?= $row['nama_sekolah'] ?></td>
                    <td>
                        <?php if($row['tgl_awal']=='0000-00-00' OR $row['tgl_akhir']=='0000-00-00'){
                            echo " - "; } else { echo tgl_indo($row['tgl_awal'])." S/d ".tgl_indo($row['tgl_akhir']); } 
                        ?>
                    </td>
                    <td><?= $row['telp']?></td>
                    <!-- <td align="center">
                        <img width="70px" height="57px" src="<?= base_url(); ?>/fotoslipbayar/<?= $row['slip_bayar']?>" readonly>
                    </td> -->
                    <td>
                        <?php if ($row['status'] == "Belum Terverifikasi") { ?>
                        <span class="badge badge-danger"><?= $row['status'] ?></span>
                        <?php } else { ?>
                        <span class="badge badge-success"><?= $row['status'] ?></span>
                        <?php } ?>
                    </td>
                        <td align="center">
                            <a href="edit?id=<?= $row['id_daftar'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="delete?id=<?= $row['id_daftar'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
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

 <!-- MODAL Print -->
 <div id="modal_print" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="print" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">Pilih Status </label>
                                            <div class="col-sm-5">
                                                <select class="form-control" name="status" required="">
                                                <option value="">-Pilih-</option>
                                                <option value="Terverifikasi">Terverifikasi</option>
                                                <option value="Belum Terverifikasi">Belum Terverifikasi</option>
                                              </select>
                                            </div>
                                        </div>

                                        <input type="submit" name="print" class="btn btn-success" value="Print">

                                </form>
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
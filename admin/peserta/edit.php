<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';


      
      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

      $id = $_GET['id'];
      $data = $koneksi->query("SELECT * FROM daftarppl AS dp 
                                LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                                LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
                                LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen
                                WHERE dp.id_daftar = '$id'");
      $row = $data->fetch_array();
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Form Verifikasi Daftar PPL</h1>
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
                    <h3 class="card-title">Form Verifikasi Daftar PPL</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NPM</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="npm"  value="<?= $row['npm'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama"  value="<?= $row['nama'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="prodi"  value="<?= $row['prodi'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-4">
                            <select class="form-control select2" data-placeholder="Pilih Dosen" id="id_dosen" name="id_dosen" >
                                <option value=""></option>
                                <?php
                                $data1 = $koneksi->query("SELECT * FROM dosen ORDER BY id_dosen ASC");
                                while ($dsn = $data1->fetch_array()) {
                                ?>
                                  <option value="<?= $dsn['id_dosen'] ?>" <?php if ($dsn['id_dosen'] == $row['id_dosen']) {
                                                                          echo "selected";
                                                                        } ?>><?= $dsn['nama_dosen'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Sekolah</label>
                        <div class="col-sm-4">
                            <select class="form-control select2" data-placeholder="Pilih Sekolah" id="id_sekolah" name="id_sekolah" >
                                <option value=""></option>
                                <?php
                                $data2 = $koneksi->query("SELECT * FROM sekolah ORDER BY id_sekolah ASC");
                                while ($skh = $data2->fetch_array()) {
                                ?>
                                  <option value="<?= $skh['id_sekolah'] ?>" <?php if ($skh['id_sekolah'] == $row['id_sekolah']) {
                                                                          echo "selected";
                                                                        } ?>><?= $skh['nama_sekolah'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Mulai</label>
                        <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl_awal"  value="<?= $row['tgl_awal'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl_akhir"  value="<?= $row['tgl_akhir'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                        <div class="col-sm-3">
                        <a href="<?= base_url(); ?>/fotoslipbayar/<?= $row['slip_bayar']?>" data-toggle="lightbox" data-title="Slip Pembayaran" data-gallery="galery" title="Lihat"> <img width="70px" height="57px" src="<?= base_url(); ?>/fotoslipbayar/<?= $row['slip_bayar']?>" readonly></a>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-2">
                            <select class="form-control select2" data-placeholder="Pilih Status" id="status" name="status" >
                                    <option value="Belum Terverifikasi" <?php if ($row['status'] == "Belum Terverifikasi") {
                                                              echo "selected";
                                                            } ?>>Belum Terverifikasi</option>
                                    <option value="Terverifikasi" <?php if ($row['status'] == "Terverifikasi") {
                                                                echo "selected";
                                                              } ?>>Terverifikasi</option>
                            </select>
                        </div>
                    </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Simpan</button>
                        <a href="../mahasiswa/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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

<script>
  $(document).ready(function(){       
        $('.form-cek').click(function(){
            if($(this).is(':checked')){
                $('.form-pass').attr('type','text');
            }else{
                $('.form-pass').attr('type','password');
            }
        });
    });

 

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });




</script>

<?php 
    if (isset($_POST['submit'])) {
        $id_sekolah     = $_POST['id_sekolah'];
        $id_dosen       = $_POST['id_dosen'];
        $tgl_awal       = $_POST['tgl_awal'];
        $tgl_akhir      = $_POST['tgl_akhir'];
        $status         = $_POST['status'];

    $submit = $koneksi->query("UPDATE daftarppl SET  id_sekolah = '$id_sekolah', id_dosen = '$id_dosen', tgl_awal = '$tgl_awal', tgl_akhir = '$tgl_akhir',   status = '$status' WHERE id_daftar = '$id'");

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../mahasiswa/');</script>";
    }
}

?>


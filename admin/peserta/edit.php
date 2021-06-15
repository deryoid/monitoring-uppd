<?php 
    require '../../config/config.php';
    include '../../config/koneksi.php';


      
      include '../../templates/head.php'; 
      include '../../templates/navbar.php';
      include '../../templates/sidebar.php';  

      $id = $_GET['id'];
      $data = $koneksi->query("SELECT * FROM daftarpkl AS dp 
                                LEFT JOIN peserta AS m  ON dp.id_peserta = m.id_peserta
                                LEFT JOIN bagian AS s ON dp.id_bagian = s.id_bagian
                                LEFT JOIN pembimbing AS d ON dp.id_pembimbing = d.id_pembimbing
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
                    <h3 class="card-title">Form Verifikasi Daftar PKL</h3>
                </div>

            <form class="form-horizontal" method="post" action="">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NPM/NIM/NIS</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="npm"  value="<?= $row['npm'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama"  value="<?= $row['nama'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prodi/Jurusan</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="prodi"  value="<?= $row['prodi'] ?>" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Pembimbing</label>
                        <div class="col-sm-4">
                            <select class="form-control select2" data-placeholder="Pilih Pembimbing" id="id_pembimbing" name="id_pembimbing" >
                                <option value=""></option>
                                <?php
                                $data1 = $koneksi->query("SELECT * FROM pembimbing ORDER BY id_pembimbing ASC");
                                while ($dsn = $data1->fetch_array()) {
                                ?>
                                  <option value="<?= $dsn['id_pembimbing'] ?>" <?php if ($dsn['id_pembimbing'] == $row['id_pembimbing']) {
                                                                          echo "selected";
                                                                        } ?>><?= $dsn['nama_pembimbing'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Bagian</label>
                        <div class="col-sm-4">
                            <select class="form-control select2" data-placeholder="Pilih Bagian" id="id_bagian" name="id_bagian" >
                                <option value=""></option>
                                <?php
                                $data2 = $koneksi->query("SELECT * FROM bagian ORDER BY id_bagian ASC");
                                while ($skh = $data2->fetch_array()) {
                                ?>
                                  <option value="<?= $skh['id_bagian'] ?>" <?php if ($skh['id_bagian'] == $row['id_bagian']) {
                                                                          echo "selected";
                                                                        } ?>><?= $skh['nama_bagian'] ?></option>
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
                        <label class="col-sm-2 col-form-label">Scan Surat Pengantar PKL</label>
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
                        <a href="../peserta/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $id_bagian     = $_POST['id_bagian'];
        $id_pembimbing       = $_POST['id_pembimbing'];
        $tgl_awal       = $_POST['tgl_awal'];
        $tgl_akhir      = $_POST['tgl_akhir'];
        $status         = $_POST['status'];

    $submit = $koneksi->query("UPDATE daftarpkl SET  id_bagian = '$id_bagian', id_pembimbing = '$id_pembimbing', tgl_awal = '$tgl_awal', tgl_akhir = '$tgl_akhir',   status = '$status' WHERE id_daftar = '$id'");

    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../peserta/');</script>";
    }
}

?>


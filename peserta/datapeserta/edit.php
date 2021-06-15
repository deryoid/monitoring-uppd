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
            <h1 class="m-0 text-dark">Formulir Peserta</h1>
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
                    <h3 class="card-title">Formulir Peserta</h3>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="saveformulir">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NPM/NIM/NIS</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="npm" required="" value="<?= $data['npm'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama" required="" value="<?= $data['nama'] ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prodi/Jurusan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="prodi" required="" value="<?= $data['prodi'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">JK</label>
                        <div class="col-sm-4">
                            <select class="form-control select2" data-placeholder="Pilih JK" id="jk" name="jk" required="">
                            <option value=""></option>
                                    <option value="Laki-laki" <?php if ($data['jk'] == "Laki-laki") {
                                                              echo "selected";
                                                            } ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if ($data['jk'] == "Perempuan") {
                                                                echo "selected";
                                                              } ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-4">
                            <select class="form-control select2" data-placeholder="Pilih Agama" id="agama" name="agama" required="">
                                    <option value=""></option>
                                    <option value="Islam" <?php if ($data['agama'] == "Islam") {
                                                              echo "selected";
                                                            } ?>>Islam</option>
                                    <option value="Kristen" <?php if ($data['agama'] == "Kristen") {
                                                                echo "selected";
                                                              } ?>>Kristen</option>
                                    <option value="Hindu" <?php if ($data['agama'] == "Hindu") {
                                                                echo "selected";
                                                              } ?>>Hindu</option>
                                    <option value="Budha" <?php if ($data['agama'] == "Budha") {
                                                                echo "selected";
                                                              } ?>>Budha</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                        <textarea type="text" class="form-control" name="alamat" required="" ><?= $data['alamat'] ?></textarea>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Telp/No. Whatsapp</label>
                        <div class="col-sm-4">
                        <input type="number" class="form-control" name="telp" pattern="[0-9]+" placeholder="" autofocus required oninvalid="this.setCustomValidity('Input hanya boleh Angka tanpa spasi!')" value="<?= $data['telp'] ?>">
                        </div>
                    </div>


<!--                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="foto">
                                <label class="custom-file-label" for="customFile">
                                  <p style="color:red; font-size:15px;"><i>**Masukkan Foto</i></p>
                                </label>
                              </div>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 500px; height: 250px;">
                                    <img src="<?= base_url() ?>/fotomhs/<?= $data['foto']?>" alt="">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 250px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn btn-success btn-file">
                                        <span class="fileupload-new">
                                            <i class="fa fa-images"> Upload Foto</i>
                                        </span>
                                        <span class="fileupload-exists">
                                            <i class="fa fa-images"> Ubah Foto</i>
                                        </span>
                                        <input type="file" name="foto" >
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i> Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>                   

                     <div class="form-group row">
                        <label for="slip_bayar" class="col-sm-2 col-form-label">Surat Magang dari Kampus/Sekolah</label>
                        <div class="col-sm-10">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 500px; height: 250px;">
                                    <img src="<?= base_url() ?>/fotoslipbayar/<?= $data['slip_bayar']?>" alt="">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 250px; line-height: 20px;"></div>
                                <div>
                                    <span class="btn btn btn-success btn-file">
                                        <span class="fileupload-new">
                                            <i class="fa fa-images"> Upload Surat</i>
                                        </span>
                                        <span class="fileupload-exists">
                                            <i class="fa fa-images"> Ubah Surat</i>
                                        </span>
                                        <input type="file" name="slip_bayar" >
                                    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                        <i class="fa fa-times"></i> Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                 </div>

                    <div class="card-footer">
                        <button name="submit" class="btn btn-success" ><i class="fa fa-save mr-2"></i>Daftar PKL</button>
                        <!-- onclick="return saveformulir();" -->
                        <a href="../datamhs/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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



<?php 
    if (isset($_POST['submit'])) {
        $npm            = $_POST['npm'];
        $nama           = $_POST['nama'];
        $jk             = $_POST['jk'];
        $prodi          = $_POST['prodi'];
        $agama          = $_POST['agama'];
        $alamat         = $_POST['alamat'];
        $telp           = $_POST['telp'];


//upload foto mhs
        $e = "";
// CEK APAKAH FOTO DIGANTI
        if (!empty($_FILES['foto']['name'])) {
            $fotolama = $data['foto'];

            // UPLOAD FOTO PEMOHON
            $foto      = $_FILES['foto']['name'];
            $x_foto    = explode('.', $foto);
            $ext_foto  = end($x_foto);
            $nama_foto = rand(1, 99999) . '.' . $ext_foto;
            $size_foto = $_FILES['foto']['size'];
            $tmp_foto  = $_FILES['foto']['tmp_name'];
            $dir_foto  = '../../fotomhs/';
            $allow_ext        = array('png', 'jpg', 'jpeg');
            $allow_size       = 1024 * 1024 * 1;
            // var_dump($nama_foto); die();

            if (in_array($ext_foto, $allow_ext) === true) {
                if ($size_foto <= $allow_size) {
                    move_uploaded_file($tmp_foto, $dir_foto . $nama_foto);
                    if (file_exists($dir_foto . $fotolama)) {
                        unlink($dir_foto . $fotolama);
                    }
                    $e .= "Upload Success"; 
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran Foto Mahasiswa Terlalu Besar, Maksimal 1 Mb',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
                </script>";
                }
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Foto Mahasiswa Tidak Didukung',
                    text:  'Format File Foto Mahasiswa Harus Berupa PNG atau JPG',
                    type: 'warning',
                    timer: 3000,
                    showConfirmButton: true
                });     
            },10);  
            window.setTimeout(function(){ 
                window.history.back();
            } ,2000);   
            </script>";
            }
        } else {    
            $nama_foto = $data['foto']; 
            $e .= "Upload Success!"; 
        }


// upload slip bayar
       $es = "";
// CEK APAKAH FOTO DIGANTI
        if (!empty($_FILES['slip_bayar']['name'])) {
            $slip_bayarlama = $data['slip_bayar'];

            // UPLOAD FOTO PEMOHON
            $slip_bayar      = $_FILES['slip_bayar']['name'];
            $x_slip_bayar    = explode('.', $slip_bayar);
            $ext_slip_bayar  = end($x_slip_bayar);
            $nama_slip_bayar = rand(1, 99999) . '.' . $ext_slip_bayar;
            $size_slip_bayar = $_FILES['slip_bayar']['size'];
            $tmp_slip_bayar  = $_FILES['slip_bayar']['tmp_name'];
            $dir_slip_bayar  = '../../fotoslipbayar/';
            $allow_ext        = array('png', 'jpg', 'jpeg');
            $allow_size       = 1024 * 1024 * 1;
            // var_dump($nama_foto); die();

            if (in_array($ext_slip_bayar, $allow_ext) === true) {
                if ($size_slip_bayar <= $allow_size) {
                    move_uploaded_file($tmp_slip_bayar, $dir_slip_bayar . $nama_slip_bayar);
                    if (file_exists($dir_slip_bayar . $slip_bayarlama)) {
                        unlink($dir_slip_bayar . $slip_bayarlama);
                    }
                    $es .= "Upload Success"; 
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran Foto Slip Pembayar Terlalu Besar, Maksimal 1 Mb',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
                </script>";
                }
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Foto Slip Pembayar Tidak Didukung',
                    text:  'Format File Foto Slip Pembayar Harus Berupa PNG atau JPG',
                    type: 'warning',
                    timer: 3000,
                    showConfirmButton: true
                });     
            },10);  
            window.setTimeout(function(){ 
                window.history.back();
            } ,2000);   
            </script>";
            }
        } else {    
            $nama_slip_bayar = $data['slip_bayar']; 
            $es .= "Upload Success!"; 
        }

if (!empty($e) AND !empty($es)) {
    

    $submit = $koneksi->query("UPDATE peserta SET 
                            npm = '$npm',
                            nama = '$nama',
                            jk = '$jk',
                            prodi = '$prodi', 
                            agama = '$agama', 
                            alamat = '$alamat', 
                            telp = '$telp', 
                            foto = '$nama_foto', 
                            slip_bayar = '$nama_slip_bayar' 
                            WHERE id_peserta = '$data[id_peserta]'");



    if ($submit) {
        

        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../datapeserta/');</script>";
    }
}

}
?>




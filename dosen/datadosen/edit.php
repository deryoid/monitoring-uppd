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
            <h1 class="m-0 text-dark">Data Dosen</h1>
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
                    <h3 class="card-title">Data Dosen</h3>
                </div>

            <form class="form-horizontal" method="post" action="" enctype="multipart/form-data" id="saveformulir">
                    <div class="card-body">

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIDN/NIK</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nidn" required="" value="<?= $data2['nidn'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Dosen</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="nama_dosen" required="" value="<?= $data2['nama_dosen'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-3">
                            <select class="form-control select2" data-placeholder="Pilih Agama" id="agama" name="agama" required="">
                                    <option value="Islam" <?php if ($data2['agama'] == "Islam") {
                                                              echo "selected";
                                                            } ?>>Islam</option>
                                    <option value="Kristen" <?php if ($data2['agama'] == "Kristen") {
                                                                echo "selected";
                                                              } ?>>Kristen</option>
                                    <option value="Hindu" <?php if ($data2['agama'] == "Hindu") {
                                                                echo "selected";
                                                              } ?>>Hindu</option>
                                    <option value="Budha" <?php if ($data2['agama'] == "Budha") {
                                                                echo "selected";
                                                              } ?>>Budha</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="tmp_lahir" required="" value="<?= $data2['tmp_lahir'] ?>">
                        </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-3">
                        <input type="date" class="form-control" name="tgl_lahir" required="" value="<?= $data2['tgl_lahir'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Prodi Mengajar</label>
                        <div class="col-sm-3">
                            <select class="form-control select2" data-placeholder="Pilih Prodi" id="prodi_dosen" name="prodi_dosen" required="">
                                    <option value="Pendidikan Olahraga" <?php if ($data2['prodi_dosen'] == "Pendidikan Olahraga") {
                                                              echo "selected";
                                                            } ?>>Pendidikan Olahraga</option>
                                    <option value="Pendidikan Kimia" <?php if ($data2['prodi_dosen'] == "Pendidikan Kimia") {
                                                                echo "selected";
                                                              } ?>>Pendidikan Kimia</option>
                                    <option value="Pendidikan Bahasa Inggris" <?php if ($data2['prodi_dosen'] == "Pendidikan Bahasa Inggris") {
                                                                echo "selected";
                                                              } ?>>Pendidikan Bahasa Inggris</option>
                                    <option value="Bimbingan dan Konseling" <?php if ($data2['prodi_dosen'] == "Bimbingan dan Konseling") {
                                                                echo "selected";
                                                              } ?>>Bimbingan dan Konseling</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Telp/No. Whatsapp</label>
                        <div class="col-sm-4">
                        <input type="number" class="form-control" name="hp_dosen" pattern="[0-9]+" placeholder="" autofocus required oninvalid="this.setCustomValidity('Input hanya boleh Angka tanpa spasi!')" value="<?= $data2['hp_dosen'] ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                        <input type="text" class="form-control" name="alamat_dosen" required="" value="<?= $data2['alamat_dosen'] ?>">
                        </div>
                    </div>                    

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="email" required="" value="<?= $data2['email'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-3">
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



                 </div>

                    <div class="card-footer">
                        <button name="submit" class="btn btn-success" ><i class="fa fa-save mr-2"></i>Simpan</button>
                        <!-- onclick="return saveformulir();" -->
                        <a href="../datadosen/" class="btn btn-default"><i class="fa fa-arrow-circle-left mr-2"></i>Batal</a>
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
        $nidn                    = $_POST['nidn'];
        $nama_dosen              = $_POST['nama_dosen'];
        $agama                   = $_POST['agama'];
        $tmp_lahir               = $_POST['tmp_lahir'];
        $tgl_lahir               = $_POST['tgl_lahir'];
        $prodi_dosen             = $_POST['prodi_dosen'];
        $hp_dosen                = $_POST['hp_dosen'];
        $alamat_dosen            = $_POST['alamat_dosen'];
        $email                   = $_POST['email'];

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
            $dir_foto  = '../../fotodosen/';
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
                        text:  'Ukuran Foto Dosen Terlalu Besar, Maksimal 1 Mb',
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
                    title: 'Format File Foto Dosen Tidak Didukung',
                    text:  'Format File Foto Dosen Harus Berupa PNG atau JPG',
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


    
    if  (!empty($e)){ 

    $submit = $koneksi->query("UPDATE dosen SET 
                            nidn = '$nidn',
                            nama_dosen = '$nama_dosen',
                            agama = '$agama', 
                            tmp_lahir = '$tmp_lahir', 
                            tgl_lahir = '$tgl_lahir', 
                            prodi_dosen = '$prodi_dosen', 
                            hp_dosen = '$hp_dosen', 
                            alamat_dosen = '$alamat_dosen', 
                            email = '$email',
                            foto = '$nama_foto'
                            WHERE id_dosen = '$data2[id_dosen]'");


    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../datadosen/');</script>";
    }
}
    }

?>




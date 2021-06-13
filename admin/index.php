<?php 
    require '../config/config.php';
    include '../config/koneksi.php';
      
  include '../templates/head.php'; 
  include '../templates/navbar.php';
  include '../templates/sidebar.php'; 
?>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard </li>
            </ol>
        </div>

        </div>
    </div>
    </div>

          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="alert alert-success" role="alert">
          <h5><b>
            <i class="fa fa-info-circle"></i>
            "Selamat Datang Di Aplikasi Administrasi PLP UNISKA BANJARMASIN"
          </b></h5>
        </div>
        
        <div class="row">
        <div class="card col-md-12">
          <div class="card-header">
            <center><h3>Data Mahasiswa Per-Sekolah</h3></center>
          </div>
            <div class="card-body">
            <table id="" class="table table-bordered table-striped" style="background-color: ">
                    <thead>
                    <tr align="center"></tr>
                        <th>Sekolah</th>
                        <th>Jumlah Mahasiswa</th>
                    </tr>
                    </thead>

                    <tbody>
                        <?php 
                            $no = 1;
                            $data = $koneksi->query("SELECT * FROM daftarppl AS dp 
                                                        LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
                                                        LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah GROUP BY dp.id_sekolah");
                            while ($row = $data->fetch_array()) {
                              $hitungmhs = $koneksi->query("SELECT COUNT(id_daftar) AS total FROM daftarppl WHERE id_sekolah = '".$row['id_sekolah']."'");
                              $total = mysqli_fetch_array($hitungmhs);
                        ?>
                        <tr>
                          <td><?= $row['nama_sekolah'] ?></td>
                          <td><?= $total['total'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

    
      <div class="col-md-12">

        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>


<?php 
    include '../templates/footer.php'; 

?>

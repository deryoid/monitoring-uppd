<?php 
    require '../config/config.php';
    include '../config/koneksi.php';
      
  include '../templates/head.php'; 
  include '../templates/navbar.php';
  include '../templates/sidebar.php'; 

  $datappl = $koneksi->query("SELECT * FROM daftarppl AS dp 
  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_dosen = '$_SESSION[id_dosen]'");

  $jumlah = mysqli_num_rows($datappl);


  $databelum = $koneksi->query("SELECT * FROM daftarppl AS dp 
  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_dosen = '$_SESSION[id_dosen]' AND dp.status_akhir = 'Belum Selesai'");

  $jumlahbelum = mysqli_num_rows($databelum);

  $dataselesai = $koneksi->query("SELECT * FROM daftarppl AS dp 
  LEFT JOIN mahasiswa AS m  ON dp.id_mhs = m.id_mhs
  LEFT JOIN sekolah AS s ON dp.id_sekolah = s.id_sekolah
  LEFT JOIN dosen AS d ON dp.id_dosen = d.id_dosen WHERE dp.id_dosen = '$_SESSION[id_dosen]' AND dp.status_akhir = 'Selesai'");

  $jumlahselesai = mysqli_num_rows($dataselesai);


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
            "Selamat Datang <?php echo $data2['nama_dosen']; ?>"
          </b></h5>
        </div>

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jumlah; ?></h3>

                <p>Jumlah Mahasiswa Bimbingan</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jumlahbelum; ?></h3>

                <p>Jumlah Mahasiswa Belum Selesai</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jumlahselesai; ?></h3>

                <p>Jumlah Mahasiswa Selesai</p>
              </div>
              <div class="icon">
                <!-- <i class="ion ion-bag"></i> -->
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->

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

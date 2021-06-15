  <aside class="main-sidebar sidebar-dark-green elevation-4">
  <!-- dark-primary  -->
    <!-- Brand Logo -->
  <a href="#" class="brand-link">
      <img src="<?=base_url()?>/assets/dist/img/logo-kalsel.png" style="width: 30px;" alt="#" class="brand-image"
        style="opacity: .8">
      <span class="brand-text font-weight-light"><b>Monitoring PKL</b></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 d-flex">
        <div class="image">
          <!-- <img src="<?=base_url()?>/assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <i class="fa fa-user mr-2"> 
              <?php 
                if ($_SESSION['role'] == "Admin"){
                  echo "Admin";

                  }elseif ($_SESSION['role'] == "Peserta") {
                    $data = $koneksi->query("SELECT * FROM peserta WHERE id_peserta = '$_SESSION[id_peserta]'")->fetch_array();
                    echo $data['nama'];
                  }  
              ?>
          </i>
        </a>
        </div>
      </div>




      <?php if ($_SESSION['role'] == "Admin"){ ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('admin/index')?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
              <a href="<?=base_url('admin/user/')?>" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/kepalauppd/')?>" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Kepala UPPD
                  </p>
                </a>
              </li> 
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/pengumuman/')?>" class="nav-link">
                  <i class="nav-icon fas fa-list-alt"></i>
                  <p>
                    Pengumuman
                  </p>
                </a>
              </li> 
            </ul>
          </li>          

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Peserta
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/peserta/')?>" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Daftar PKL
                  </p>
                </a>
              </li> 
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=base_url('admin/statusakhirpeserta/')?>" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Status Akhir PKL
                  </p>
                </a>
              </li> 
            </ul>
          </li>

         

          <li class="nav-item">
            <a href="<?=base_url('admin/bagian/')?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Bagian
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=base_url('admin/pembimbing/')?>" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Pembimbing
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/agendapeserta/')?>" class="nav-link">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Agenda Peserta
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/nilaipeserta/')?>" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Penilaian PKL
              </p>
            </a>
          </li>

          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Surat
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
              <a href="<?=base_url('admin/suratmasuk/')?>" class="nav-link">
                  <i class="fas fa-envelope-square nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>            
              </li>
              <li class="nav-item">
              <a href="<?=base_url('admin/suratkeluar/')?>" class="nav-link">
                  <i class="fas fa-envelope-square nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>            
              </li>

            </ul>
          </li>   -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->



    <?php }elseif ($_SESSION['role'] == "Peserta") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('peserta/index')?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="<?=base_url('peserta/datapeserta/')?>" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Formulir
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                PKL
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
<!--               <a href="<?=base_url('peserta/daftarpkl/')?>" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Surat Pengantar PPL</p>
                </a>
              </li> -->

              <li class="nav-item">
              <a href="<?=base_url('peserta/daftarpkl/')?>" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Status PKL</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Kegiatan PKL
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
              <a href="<?=base_url('peserta/agendapeserta/')?>" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Agenda PKL</p>
                </a>
              </li>              
              <li class="nav-item">
              <a href="<?=base_url('peserta/nilaipeserta/')?>" class="nav-link">
                  <i class="fas fa-minus nav-icon"></i>
                  <p>Penilaian Laporan</p>
                </a>
              </li>

            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } ?>

    </div>
    <!-- /.sidebar -->
  </aside>

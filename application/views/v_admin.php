<?php
if(!empty($this->session->userdata('filter'))){
  $filter = $this->session->filter;
}else{
  $filter = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/_variables.scss" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/_bootswatch.scss" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.slim.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <!-- Custom styles for this template-->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" style="color:white;">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user" style="font-size: 20px;"></i>
        </div>
        <div class="sidebar-brand-text mx-2" style="font-size: 12px;"><?php echo $_SESSION['nama']?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!-- <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profil</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <br>
      <?php if($this->uri->segment(3)){ ?>
        <!-- Nav Item - Zakat -->
      <li class="nav-item">
        <a class="nav-link" href="../../c_zakat/zakatAdmin">
          <i class="fas fa-fw fa-table"></i>
          <span>Zakat</span></a>
      </li>

      <!-- Nav Item - Infaq -->
      <li class="nav-item">
        <a class="nav-link" href="../../c_zakat/infaqAdmin">
          <i class="fas fa-fw fa-table"></i>
          <span>Infaq</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../../c_zakat/chart">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <?php } else{ ?>
        <!-- Nav Item - Zakat -->
      <li class="nav-item">
        <a class="nav-link" href="../c_zakat/zakatAdmin">
          <i class="fas fa-fw fa-table"></i>
          <span>Zakat</span></a>
      </li>

      <!-- Nav Item - Infaq -->
      <li class="nav-item">
        <a class="nav-link" href="../c_zakat/infaqAdmin">
          <i class="fas fa-fw fa-table"></i>
          <span>Infaq</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../c_zakat/chart">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <?php } ?>
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <?php if($content_view == "v_zakatAdmin.php"){?>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="<?php echo base_url().'index.php/c_zakat/zakatAdmin'?>">
            <div class="input-group">
              <input type="search" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2" name="username" value="<?php echo $filter;?>">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
                <?php 
                $attrs = array(
                  'class' => 'btn btn-primary',
                  'role' => 'button',
                  'aria-pressed' => "true"
                );
                echo anchor('C_zakat/unset_session_search','Clear Search',$attrs);
                ?>
              </div>
            </div>
          </form>
          <?php } ?>

          <?php if($content_view == "v_infaqAdmin.php"){?>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="<?php echo base_url().'index.php/c_zakat/infaqAdmin'?>">
            <div class="input-group">
              <input type="search" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2" name="username" value="<?php echo $filter;?>">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
                <?php 
                $attrs = array(
                  'class' => 'btn btn-primary',
                  'role' => 'button',
                  'aria-pressed' => "true"
                );
                echo anchor('C_zakat/unset_session_search_infaq','Clear Search',$attrs);
                ?>
              </div>
            </div>
          </form>
          <?php } ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user" style="margin-right: 10px;"></i>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../c_zakat/disprofil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php if($content_view == "v_zakatAdmin.php"){
          ?>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <?php
              echo form_open_multipart('c_zakat/print_admin_zakat');
            ?>
              <select name="bulan">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <select name="tahun">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <button type="submit" class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50"></i> Download Pdf</button>
              <!-- <a href="../c_zakat/print_admin_zakat" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Pdf</a> -->
            <?php
              echo form_close();
            ?>
          </div>
          <?php } ?>
          <!-- Content Row -->
          <?php if($content_view == "v_infaqAdmin.php"){ ?>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <?php
              echo form_open_multipart('c_zakat/print_admin_infaq');
            ?>
              <select name="bulan">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
              <select name="tahun">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
              </select>
              <button type="submit" class="btn btn-primary"><i class="fas fa-download fa-sm text-white-50"></i> Download Pdf</button>
              <!-- <a href="../c_zakat/print_admin_infaq" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Pdf</a> -->
            <?php
              echo form_close();
            ?>
          </div>
          <?php } ?>

          <div class="row" style="overflow-x: auto">
              <div class="container custom-body">
                <?php $this->load->view($content_view) ?>
              </div>
          </div>
        <!-- /.container-fluid -->

      </div>
    </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sarijadi 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" jika anda ingin keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary btn-sm" type="button"><?php echo anchor('c_akun/logout','Logout',array('class' => 'nav-link'))?></button>
        </div>
      </div>
    </div>
  </div>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>

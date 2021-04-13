<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/upr.png" type="image/ico" />

    <title> Sistem Informasi Karyawan </title>

    <!-- Bootstrap -->
    <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <center>
            &nbsp; <a href="index.php" class="" style="color:#fff;"><span><font size="4.95" color="white" face="Helvetica Neue">APLIKASI DATA KARYAWAN</font></span></a>
            </center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="assets/images/user.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>User</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> HOME <span class="fa fa-chevron"></span></a>
                  </li>
                  <li><a href="#"><i class="fa fa-desktop"></i> EMPLOYEE <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil1">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah1">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> DEPARTMENT <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil2">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah2">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> DEPT LOCATION <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil3">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah3">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> PROJECT <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil4">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah4">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> WORKS ON <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil5">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah5">Tambah Data</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> DEPENDENT <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php?page=tampil6">Tampil Data</a></li>
                      <li><a href="index.php?page=tambah6">Tambah Data</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
           
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- page content - HALAMAN UTAMA ISI DISINI -->
        <div class="right_col" role="main">
      <?php
      $queries = array();
      parse_str($_SERVER['QUERY_STRING'], $queries);
      error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
      switch ($queries['page']) {
        # employee
      	case 'tampil1':
      		# code...
      		include 'tampil.php';
      		break;

      	case 'tambah1':
      		# code...
      		include 'tambah.php';
      		break;

        case 'edit1':
        		# code...
        	include 'edit.php';
        	break;

        case 'edit1save':
          		# code...
          include 'edit.php';
          break;
        # Department
          case 'tampil2':
            # code...
            include 'tampil2.php';
            break;

          case 'tambah2':
            # code...
            include 'tambah2.php';
            break;

          case 'edit2':
              # code...
            include 'edit2.php';
            break;

          case 'edit2save':
                # code...
            include 'edit2.php';
            break;

            # deptlocation
          case 'tampil3':
            # code...
            include 'tampil3.php';
            break;

          case 'tambah3':
            # code...
            include 'tambah3.php';
            break;

          case 'edit3':
              # code...
            include 'edit3.php';
            break;

          case 'edit3save':
                # code...
            include 'edit3.php';
            break; 
            

            # project
          case 'tampil4':
            # code...
            include 'tampil4.php';
            break;

          case 'tambah4':
            # code...
            include 'tambah4.php';
            break;

          case 'edit4':
              # code...
            include 'edit4.php';
            break;

          case 'edit4save':
                # code...
            include 'edit4.php';
            break; 
        

            # works on
          case 'tampil5':
            # code...
            include 'tampil5.php';
            break;

          case 'tambah5':
            # code...
            include 'tambah5.php';
            break;

          case 'edit5':
              # code...
            include 'edit5.php';
            break;

          case 'edit5save':
                # code...
            include 'edit5.php';
            break; 
            # Dependent
        case 'tampil6':
          # code...
          include 'tampil6.php';
          break;
    
        case 'tambah6':
          # code...
          include 'tambah6.php';
          break;
    
        case 'edit6':
            # code...
          include 'edit6.php';
          break;
    
        case 'edit6save':
              # code...
          include 'edit6.php';
          break; 
          #home
        default:
		          #code...
		      include 'home.php';
		      break;
        }
        ?>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="assets/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/skycons/skycons.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="assets/js/custom.min.js"></script>

  </body>
</html>

<?php
session_start(); // memulai session
include "../koneksi.php";// memanggil koneksi

if($_SESSION['id_user']) { // jika sudah ada session admin atau session operator, maka ke halaman index

?>
<?php
  
    $userlogin = $_SESSION['id_user']; 
    $query = "select * from tb_pendaftaran where id_peserta = '$userlogin'";
    $sql = mysql_query($query) or die(mysql_error());
    $log = mysql_fetch_array($sql);
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../foto/logo/icon.png" type="image/x-icon" />

    <title>Disnakerperinkopukm | Kudus</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css" >
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css" >
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- NProgress -->
    <link rel="stylesheet" href="../vendors/nprogress/nprogress.css" >
    <!-- iCheck -->
    <link rel="stylesheet" href="../vendors/iCheck/skins/flat/green.css" >
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/iCheck/all.css">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>SISFO Pelatihan</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../foto/user/<?php echo $log['foto_diri']; ?>" alt="User Image" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><p><?php echo $log['nama_peserta']; ?></p></h2>
                  <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $log['status']; ?></a>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu Navigasi</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a></li>
                  <!-- <li><a><i class="fa fa-edit"></i> Data Penjadwalan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=data_periode"> Periode</a></li>
                      <li><a href="?page=data_daftarpelatihan"> Jenis Pelatihan</a></li>
                    </ul>
                  </li> -->
                  <!-- <li><a href="?page=data_pesertacalon"><i class="fa fa-child"></i> Data Calon Peserta </a></li>
                  <li><a href="?page=data_kehadiran"><i class="fa fa-building-o"></i> <span>Kehadiran Peserta</span></a></li>
                  <li><a href="?page=data_penilaian"><i class="fa fa-pencil"></i> <span>Penilaian Pelatihan</span></a></li>
                  <li><a><i class="fa fa-desktop"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=data_user">Data User</a></li> -->
                      <li><a href="?page=data_peserta"><i class="fa fa-apple"></i> <span>Data Peserta</span></a></li>
                      <!-- <li><a href="?page=data_pendamping">Data Pendamping</a></li>
                    </ul>
                  </li>
                  <li><a href="?page=data_pelatihan"><i class="fa fa-android"></i> Pelatihan </a></li>
                  <li><a><i class="fa fa-newspaper-o"></i>Laporan <span class="fa fa-chevron-down"></span></a> -->
                    <ul class="nav child_menu">
                      <li><a href="?page=laporan_jenispelatihan">Data Laporan Jenis Pelatihan</a></li>
                      <li><a href="?page=laporan_peserta">Data Laporan Peserta</a></li>
                       <li><a href="?page=laporan_pendamping"> Data Laporan Pendamping</a></li>
                       <li><a href="?page=laporan_pelatihan"> Data Laporan Pelatihan</a></li>
                       <li><a href="?page=laporan_kehadiran"> Data Laporan Kehadiran</a></li>
                       <li><a href="?page=laporan_penilaian"> Data Laporan Penilaian</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
             
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>


  <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="../foto/user/<?php echo $log['foto_diri']; ?>" alt="User Image">
                    <span class="hidden-xs"><?php echo $log['nama_peserta']; ?></span>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper"> 
    <!-- Content Header (Page header) -->
    <?php
      include "bukafile.php";
    ?>
    <!-- /.content -->
  </div>     

        <!-- page content -->
        
          <!-- /top tiles -->

            

        <!-- /page content -->
        <!--   </div> -->
        <!--   </div> -->
        <!--   </div> -->
            <!--   </div> -->
        <!--   </div> -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <b>Disnakerperinkopukm kudus</b> by <a href="https://colorlib.com">Copyright &copy; 2018</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- CK Editor -->
    <script src="../ckeditor1/ckeditor.js"></script>
     <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    
  })
</script>

<script>
  $(function () 
  {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    $(document).ready(function() 
    {
      $('.cari_id_jenispelatihan').trigger('change');
    });
    $('.cari_id_jenispelatihan').on('change',function() 
    {
      if ($(this).val()) 
      {
        var tempat = $('.cari_id_jenispelatihan_'+$(this).val()).attr('tempat');
        var jadwal = $('.cari_id_jenispelatihan_'+$(this).val()).attr('jadwal');
        $('.tempat_tampil').val(tempat);
        $('.jadwal_tampil').val(jadwal);
        <?php 
        if (@$_GET['page']!='edit_pelatihan') 
        {
          ?>
          $.ajax({
            url: 'pelatihan/pendamping_free.php',
            type: 'POST',
            // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
            data: {post: jadwal},
            success: function(html) 
            {
              $('.pendamping_free').html(html).show();
            }
          })
          .done(function() {
            console.log("success");
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
          <?php
        }
        ?>

        $.ajax({
          url: 'pelatihan/tampil_daftar_peserta.php',
          type: 'POST',
          // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {post: $(this).val()},
          success: function(html) 
          {
            $('.tampil_daftar_peserta').html(html).show();
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });

         $.ajax({
          url: 'penilaian/tampil_penilaian.php',
          type: 'POST',
          // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {post: $(this).val()},
          success: function(html) 
          {
            $('.tampil_penilaian').html(html).show();
          }
        })
        .done(function() {
          console.log("success");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
        
      }
    });

</script>
  
  </body>
</html>
<?php
}else{
    header("location: ../login.php");
}
?>

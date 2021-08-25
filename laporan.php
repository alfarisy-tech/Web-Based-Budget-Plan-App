
<?php 
session_start();
include 'koneksi.php';
if (!empty($_SESSION["username"]) && !empty($_SESSION['password'])) {

  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>RAB - DINAS PERHUBUNGAN KOTA PALEMBANG</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->

    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
<!--     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
-->    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-red">
  <!-- Page Loader -->
  <div class="page-loader-wrapper">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer pl-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Please wait...</p>
    </div>
  </div>
  <!-- #END# Page Loader -->
  <!-- Overlay For Sidebars -->
  <div class="overlay"></div>
  <!-- #END# Overlay For Sidebars -->
  <!-- Search Bar -->
  <div class="search-bar">
    <div class="search-icon">
      <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
      <i class="material-icons">close</i>
    </div>
  </div>
  <!-- #END# Search Bar -->
  <!-- Top Bar -->
  <nav class="navbar">
    <?php 
    include 'layout/topbar.php';
    ?>
  </nav>
  <!-- #Top Bar -->
  <section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
      <?php include 'layout/sidebar.php'; ?>
    </aside>
    <!-- #END# Left Sidebar -->

  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="block-header">
        <h2>RINCIAN</h2>
      </div>

      <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="card">
            <div class="header">
              <h2>
               Laporan Rencana Anggaran Belanja - DISHUB KOTA PALEMBANG
             </h2>
             <br>
             <hr>
             <form class="form-horizontal" method="get" action="">
              <div class="row">
                <div class="col-lg-4">

                  <div class="form-group row input-group-sm">
                    <label class="col-sm-4 col-form-label">Mulai:</label>
                    <div class="col-sm-8">
                      <input value="<?php if (isset($_GET['tanggal_dari'])) {
                        echo $_GET['tanggal_dari'];
                        } else {
                          echo "";
                        } ?>" name="tanggal_dari" type="date" class="form-control input-group-sm" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group row input-group-sm">
                      <label class="col-sm-4 col-form-label">Sampai:</label>
                      <div class="col-sm-8">
                        <input value="<?php if (isset($_GET['tanggal_sampai'])) {
                          echo $_GET['tanggal_sampai'];
                          } else {
                            echo "";
                          } ?>" name="tanggal_sampai" type="date" class="form-control input-group-sm" placeholder="Email">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="form-group row input-group-sm">

                        <div class="col-sm-4">
                          <input value="Filter" type="submit" class="form-control btn btn-sm btn-info" placeholder="filter" name="cari">
                        </div>
                        <a style="float: ;" href="laporan" class="btn btn-warning">reset</a>

                      </div>
                    </div>

                  </div>


                </form>
              </div>
              <div class="body">
                <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover dataTable " id="example1">
                    <thead>
                      <tr>
                       <th>No</th>
                       <th>ID Proyek</th>
                       <th>Judul</th>
                       <th>Divisi</th>
                       <th>Jumlah Rincian</th>
                       <th>Total Anggaran</th>
                       <th>Tanggal</th>
                       <th>Option</th>

                     </tr>
                   </thead>
                   <tfoot>
                    <tr>
                      <th>No</th>
                      <th>ID Proyek</th>
                      <th>Judul</th>
                      <th>Divisi</th>
                      <th>Jumlah Rincian</th>
                      <th>Total Anggaran</th>
                      <th>Tanggal</th>
                      <th>Option</th>
                    </tr>
                  </tfoot>
                  <tbody>



                   <?php
                   $no = 1;
                   if (isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari'])) {
                    $tgl_dari = $_GET['tanggal_dari'];
                    $tgl_sampai = $_GET['tanggal_sampai'];


                            // $lap = mysqli_query($koneksi, "SELECT SUM(tbl_order.harga) as harga,tbl_order.id_order,tbl_order.kd_order,tbl_order.id_user,tbl_order.kode_brg,tbl_order.jumlah,tbl_order.tgl_order,tbl_barang.kode_brg,tbl_barang.nama_brg,tbl_user.nama_user FROM tbl_order JOIN tbl_barang ON tbl_order.kode_brg = tbl_barang.kode_brg JOIN tbl_user ON tbl_order.id_user=tbl_user.id_user WHERE date(tgl_order) >= '$tgl_dari' AND date(tgl_order) <= '$tgl_sampai' GROUP BY tgl_order ORDER BY tgl_order DESC");

                    $data = mysqli_query($koneksi,"SELECT tbl_rincian.* ,tbl_proyek.*  FROM tbl_proyek join tbl_rincian ON tbl_proyek.id_proyek=tbl_rincian.id_proyek WHERE date(tanggal) >= '$tgl_dari' AND date(tanggal) <= '$tgl_sampai'  GROUP BY tbl_rincian.id_proyek ORDER BY tanggal DESC");
                  } else {

                            // $lap = mysqli_query($koneksi, "SELECT SUM(tbl_order.harga) as harga,tbl_order.id_order,tbl_order.kd_order,tbl_order.id_user,tbl_order.kode_brg,tbl_order.jumlah,tbl_order.tgl_order,tbl_barang.kode_brg,tbl_barang.nama_brg,tbl_user.nama_user FROM tbl_order JOIN tbl_barang ON tbl_order.kode_brg = tbl_barang.kode_brg JOIN tbl_user ON tbl_order.id_user=tbl_user.id_user GROUP BY tgl_order ORDER BY tgl_order DESC");

                    $data = mysqli_query($koneksi,"SELECT tbl_rincian.* ,tbl_proyek.*  FROM tbl_proyek join tbl_rincian ON tbl_proyek.id_proyek=tbl_rincian.id_proyek GROUP BY tbl_rincian.id_proyek");
                  }

                  while ($row = mysqli_fetch_array($data)){
                    $jumlah =  mysqli_query($koneksi, "SELECT id_proyek FROM tbl_rincian WHERE id_proyek = '" . $row['id_proyek'] . "'
                     ");
                    $tot_rincian = mysqli_num_rows($jumlah);
                    $total =  mysqli_query($koneksi, "SELECT SUM(total) as tot_biaya FROM tbl_rincian WHERE id_proyek = '" . $row['id_proyek'] . "'
                     ");
                    $i = mysqli_fetch_array($total);
                    ?>



                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['kode_proyek']; ?></td>
                      <td><?= $row['judul']; ?></td>
                      <td><?= $row['divisi']; ?></td>
                      <td><?= $tot_rincian; ?></td>
                      <td><?php echo "Rp " . number_format($i['tot_biaya']) ?></td>
                      <td><?= $row['tanggal']; ?></td>
                      <td>                           
                       <a class="btn bg-blue waves-effect" href="detail_laporan.php?id=<?= $row['kode_proyek']; ?>" >Lihat Rincian dan Cetak</a>

                     </td>
                   </tr>
                 <?php } ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>

 </div>
 <textarea class="text-capitalize" hidden name="" id="tgl" cols="30" rows="10">
  <div>
    <img src="images/logo.png" height="70px" width="70px" style="float: left;margin-left: 100px">
    <br>
    <h3 style="margin-top: -4px;margin-left: 200px;float: center;">DINAS PERHUBUNGAN KOTA PALEMBANG</h3>
    <h5 style="margin-top: -4px;margin-left: 200px;float: center;">Alamat: Jl. Pangeran Sido Ing Lautan, 35 Ilir, Kec. Ilir Bar. II, Kota Palembang, Sumatera Selatan 30131</h5>
  </div>
 <hr style="border: 2px solid blue;">
  <div>
  <pre>Nama Laporan : RAB - DISHUB KOTA PALEMBANG</pre>
  <?php if (!isset($tgl_sampai) && !isset($tgl_dari)) {?>
   <pre>Periode : - sampai -</pre>
 <?php }else{?>


  <pre>Periode : <?= strftime("%d / %m / %Y", strtotime($tgl_dari)); ?> sampai <?= strftime("%d /%m /%Y", strtotime($tgl_sampai)); ?></pre> 


<?php } ?>


<pre>Tanggal Cetak : <?= date('d / m / Y'); ?></pre>

</div>


</textarea>
<textarea class="text-capitalize" hidden name="" id="ttd" cols="30" rows="10">
<div style="float: right;">
  <br>
  Yang mengetahui,
  <br>
  Palembang, <?= date('d  M  Y'); ?>
  <br>
  <br>
  <br>
  <u>(Nama)</u>
  <br>
 (Jabatan)
</div>





</textarea>
<textarea style="text-align: center;" id="kop" hidden="">

 <br>


</textarea>

</section>


<!-- JS -->
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"> </script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<!-- Custom Js -->
<script src="js/admin.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var tgl = $("#tgl").text()
    var ttd = $("#ttd").text()
    var kop = $("#kop").text()

    $('#example1').DataTable( {
      dom: 'Bfrtip',
      buttons: [
      {
        title: "",
        extend: 'print',
        messageTop: ("\n", tgl),
        messageBottom: ("\n", ttd),
        exportOptions: {
          columns: ':visible'
        },

      },
      'colvis'
      ], 


    } );
  } );
</script>

<!-- Demo Js -->
<!-- //JS -->
</body>

</html>
<?php }else{

  echo "<script>  alert('Anda harus login dahulu !'); location.href='index.php' </script>";
}


?>

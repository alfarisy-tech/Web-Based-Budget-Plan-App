
<?php 
session_start();
include 'koneksi.php';
if (!empty($_SESSION["username"]) && !empty($_SESSION['password'])) {

    $id = $_GET['id'];

    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>RAB - DINAS PERHUBUNGAN KOTA kjbjkkjbjkPALEMBANG</title>
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
                <h2> DETAIL LAPORAN [RAB] Dishub Kota Palembang
                </h2>
            </div>
            <?php 
            $data1 = mysqli_query ($koneksi,"SELECT * FROM tbl_proyek WHERE kode_proyek='$id'");
            $i = mysqli_fetch_array($data1);
            ?>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                         <a class="btn bg-red waves-effect" href="laporan" >Kembali</a>
                         <br>
                         <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_2">Kode [RAB]  :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input disabled="" value="<?= $i['kode_proyek'] ?>" name="judul" type="text" id="password_2" class="form-control" placeholder="Enter your title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_2">Judul [RAB]  :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input disabled="" value="<?= $i['judul'] ?>" name="judul" type="text" id="password_2" class="form-control" placeholder="Enter your title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_2">Divisi [RAB]  :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input disabled="" value="<?= $i['divisi'] ?>" name="judul" type="text" id="password_2" class="form-control" placeholder="Enter your title">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password_2">Tanggal [RAB]  :</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input disabled="" value="<?= $i['tanggal'] ?>" name="judul" type="text" id="password_2" class="form-control" placeholder="Enter your title">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="font-family: Arial;" class="table table-bordered table-striped table-hover dataTable" id="example1">
                                <thead>
                                    <tr>
                                       <th>No</th>
                                       <th>Bahan</th>
                                       <th>Satuan</th>
                                       <th>Jumlah </th>
                                       <th>Harga</th>
                                       <th>Total</th>
                                   </tr>
                               </thead>
                               <tfoot>
                                <tr>
                                  <th>No</th>
                                  <th>Bahan</th>
                                  <th>Satuan</th>
                                  <th>Jumlah </th>
                                  <th>Harga</th>
                                  <th>Total</th>
                              </tr>
                          </tfoot>
                          <tbody>
                           <?php 
                           include 'koneksi.php';
                           $no=1;
                           $data = mysqli_query($koneksi,"SELECT tbl_rincian.* ,tbl_proyek.*  FROM tbl_proyek join tbl_rincian ON tbl_proyek.id_proyek=tbl_rincian.id_proyek WHERE tbl_proyek.kode_proyek = '$id'
                             ");
                           while ($row = mysqli_fetch_array($data)){

                             $total =  mysqli_query($koneksi, "SELECT SUM(total) as tot_biaya FROM tbl_rincian WHERE id_proyek = '" . $row['id_proyek'] . "'
                               ");
                             $p = mysqli_fetch_array($total);
                             ?>
                             <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['bahan']; ?></td>
                                <td><?= $row['satuan']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                                <td>
                                    <?php echo "Rp " . number_format($row['harga']) ?>
                                </td>
                                <td>                                
                                    <?php echo "Rp " . number_format($row['total']) ?>
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
</section>
<!-- JS -->
<textarea class="text-capitalize" hidden name="" id="tgl" cols="30" rows="10">
  <div>
    <img src="images/logo.png" height="70px" width="70px" style="float: left;margin-left: 100px">
    <br>
    <h3 style="margin-top: -4px;margin-left: 200px;float: center;">DINAS PERHUBUNGAN KOTA PALEMBANG</h3>
    <h5 style="margin-top: -4px;margin-left: 200px;float: center;">Alamat: Jl. Pangeran Sido Ing Lautan, 35 Ilir, Kec. Ilir Bar. II, Kota Palembang, Sumatera Selatan 30131</h5>
</div>
<hr style="border: 2px solid blue;">
<div> 
  <pre>
    Nama Laporan           : RAB - DISHUB KOTA PALEMBANG
    ID Proyek/RAB          : <?= $i['kode_proyek'] ?>

    Judul Proyek/RAB       : <?= $i['judul'] ?>

    Divisi Proyek/RAB      : <?= $i['divisi'] ?>

    Tanggal Proyek/RAB     : <?= $i['tanggal'] ?>

    Total Biaya Proyek/RAB : <?php echo "Rp " . number_format($p['tot_biaya']) ?>

    Tanggal Cetak          : <?= date('d / m / Y'); ?>
</pre>

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
        fontFamily: 'tahoma',
        fontSize:15,
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

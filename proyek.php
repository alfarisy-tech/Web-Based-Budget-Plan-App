
<?php 
session_start();
include 'koneksi.php';
if (!empty($_SESSION["username"]) && !empty($_SESSION['password'])) {
    include 'layout/header.php';
    ?>
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
                    <h2>PROYEK</h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Input Data Proyek
                                </h2>

                            </div>
                            <?php 
                            $date = date("ymd");
                            $query = "SELECT max(kode_proyek) as maxKode FROM tbl_proyek";
                            $hasil = $koneksi->query($query);
                            $data = mysqli_fetch_array($hasil);
                            $kodePesan = $data['maxKode'];
                            $noUrut = (int) substr($kodePesan, 9, 3);
                            $noUrut++;
                            $char = "RAB";
                            $kodePesanan = $char . $date . sprintf("%03s", $noUrut);
                            $id_orders = $kodePesanan;
                            ?>
                            <div class="body">
                                <form class="form-horizontal" method="POST" action="proses/proyek_add_act">
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="email_address_2">ID Proyek</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="id" readonly  value="<?= $kodePesanan; ?>" type="text" id="email_address_2" class="form-control" placeholder="Enter your email address">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password_2">Judul Proyek</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="judul" required="" type="text" id="password_2" class="form-control" placeholder="Enter your title">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password_2">Divisi Proyek</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input name="divisi" required="" type="text" id="password_2" class="form-control" placeholder="Enter your division">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password_2">Tanggal Proyek</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required="" name="tanggal" type="date" id="password_2" class="form-control" placeholder="Enter your password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                            <button type="submit" name="tambah" class="btn btn-success m-t-15 waves-effect">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Data Proyek Dishub Kota Palembang 
                                </h2>

                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable" id="example1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Proyek</th>
                                                <th>Judul</th>
                                                <th>Divisi</th>
                                                <th>Tanggal</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                         <?php 
                                         $no=1;
                                         $data = mysqli_query($koneksi,"SELECT * FROM tbl_proyek");
                                         while ($row = mysqli_fetch_array($data)){
                                             ?>
                                             <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['kode_proyek']; ?></td>
                                                <td><?= $row['judul']; ?></td>
                                                <td><?= $row['divisi']; ?></td>
                                                <td><?= $row['tanggal']; ?></td>
                                                <td>                           
                                                   <a class="btn bg-blue waves-effect" data-toggle="modal" data-target="#defaultModal<?= $row['kode_proyek']; ?>" >Edit</a>
                                                   <a class="btn bg-red waves-effect" href="proses/proyek_del_act.php?id=<?= $row['kode_proyek']; ?>" >Delete</a>

                                                   <div class="modal fade" id="defaultModal<?= $row['kode_proyek']; ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="defaultModalLabel">Edit Proyek</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="proses/proyek_edit_act.php?id=<?= $row['kode_proyek']; ?>">
                                                                   <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="email_address_2">ID Proyek</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input name="id" readonly  value="<?= $row['kode_proyek']; ?>" type="text" id="email_address_2" class="form-control" placeholder="Enter your email address">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="password_2">Judul Proyek</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input required="" value="<?= $row['judul']; ?>" name="judul" type="text" id="password_2" class="form-control" placeholder="Enter your title">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="password_2">Divisi Proyek</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input required="" value="<?= $row['divisi']; ?>" name="divisi" type="text" id="password_2" class="form-control" placeholder="Enter your division">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row clearfix">
                                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                                        <label for="password_2">Tanggal Proyek</label>
                                                                    </div>
                                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                                        <div class="form-group">
                                                                            <div class="form-line">
                                                                                <input required="" value="<?= $row['tanggal']; ?>" name="tanggal" type="date" id="password_2" class="form-control" placeholder="Enter your password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button name="edit" type="submit" class="btn btn-link waves-effect">SAVE CHANGES</button>
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
    

    $('#example1').DataTable( {
      responsive : true,
     


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


<?php 
session_start();
include 'koneksi.php';
if (!empty($_SESSION["username"]) && !empty($_SESSION['password'])) {
    include 'layout/header.php';
    $id = $_GET['id'];

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
                    <h2> DETAIL RINCIAN [RAB] Dishub Kota Palembang
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
                               <a class="btn bg-red waves-effect" href="rincian" >Kembali</a>
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
                                <table class="table table-bordered table-striped table-hoveR dataTable" id="example1">
                                    <thead>
                                        <tr>
                                         <th>No</th>
                                         <th>Bahan</th>
                                         <th>Satuan</th>
                                         <th>Jumlah </th>
                                         <th>Harga</th>
                                         <th>Total</th>
                                         <th>Option</th>
                                     </tr>
                                 </thead>
                                
                              <tbody>
                                 <?php 
                                 include 'koneksi.php';
                                 $no=1;
                                 $data = mysqli_query($koneksi,"SELECT tbl_rincian.* ,tbl_proyek.*  FROM tbl_proyek join tbl_rincian ON tbl_proyek.id_proyek=tbl_rincian.id_proyek WHERE tbl_proyek.kode_proyek = '$id'
                                   ");
                                 while ($row = mysqli_fetch_array($data)){

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

                                    <td>                           
                                       <a class="btn bg-blue waves-effect" data-toggle="modal" data-target="#defaultModal<?= $row['id_rincian']; ?>" >Edit</a>

                                       <a class="btn bg-red waves-effect" href="proses/rincian_del_act.php?id=<?= $row['id_rincian']; ?>" >Delete</a>

                                       <div class="modal fade" id="defaultModal<?= $row['id_rincian']; ?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="defaultModalLabel">Edit Proyek</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="proses/rincian_edit_act.php">
                                                        <input hidden="" type="" name="id_rincian" value="<?= $row['id_rincian']; ?>">
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
                                                            <label for="password_2">Bahan</label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input value="<?= $row['bahan']; ?>" name="bahan" type="text" id="password_2" class="form-control" placeholder="Enter your title">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row clearfix">
                                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                            <label for="password_2">Satuan </label>
                                                        </div>
                                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input value="<?= $row['satuan']; ?>" name="satuan" type="text" id="password_2" class="form-control" placeholder="Enter your division">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function sum() {
                                                          var jumlah = document.getElementById('jumlah').value;
                                                          var harga = document.getElementById('harga').value;
                                                          var result =parseInt(jumlah) * parseInt(harga);
                                                          if (!isNaN(result)) {
                                                            document.getElementById('tot').value = result;
                                                        }
                                                    }
                                                </script>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="password_2">Jumlah </label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input onkeyup="sum();" id="jumlah" name="jumlah" type="number" value="<?= $row['jumlah'] ?>"  class="form-control" placeholder="Enter your quantity">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="password_2">Harga </label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input name="harga" id="harga" value="<?= $row['harga'] ?>" onkeyup="sum();" type="number"  class="form-control" placeholder="Enter your price">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                        <label for="password_2">Total Biaya </label>
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input disabled=""  type="number" name="totall"  readonly="" id="tot"  class="form-control" >
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

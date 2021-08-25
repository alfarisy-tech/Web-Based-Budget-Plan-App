
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
                    <h2>RINCIAN</h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Input Data Rincian Proyek
                                </h2>

                            </div>

                            <div class="body">
                                <form class="form-horizontal" method="POST" action="proses/rincian_add_act">
                                  <div class="row clearfix">
                                     <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Judul-ID Proyek</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select required="" name="id_proyek" class="form-control show-tick">
                                                    <option selected="" value="">-- Please select --</option>
                                                    <?php 
                                                    $data = mysqli_query ($koneksi,"SELECT * FROM tbl_proyek");
                                                    while ($i=mysqli_fetch_array($data)) {


                                                      ?>

                                                      <option value="<?= $i['id_proyek'] ?>"><?= $i['judul'] ?> - <?= $i['kode_proyek'] ?></option>

                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password_2">Bahan </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line"> 
                                            <input name="bahan" type="text" required="" id="password_2" class="form-control" placeholder="Enter your tool">
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
                                            <input name="satuan" type="text" required="" id="password_2" class="form-control" placeholder="Enter your division">
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
                                        <input onkeyup="sum();" id="jumlah" required="" name="jumlah" type="number"   class="form-control" placeholder="Enter your quantity">
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
                                        <input name="harga" id="harga" onkeyup="sum();" type="number" required="" class="form-control" placeholder="Enter your price">
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
                                        <input  type="number" name="total" value="0" readonly="" required="" id="tot"  class="form-control" placeholder="Enter your password">
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
                        Data Detail Rincian Proyek Dishub Kota Palembang 
                    </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable" id="example1">
                            <thead>
                                <tr>
                                   <th>No</th>
                                   <th>ID Proyek</th>
                                   <th>Total Anggaran</th>
                                   <th>Jumlah Rincian</th>
                                   <th>Tanggal</th>
                                   <th>Option</th>

                               </tr>
                           </thead>
                          
                        <tbody>
                           <?php 
                           include 'koneksi.php';
                           $no=1;
                           $data = mysqli_query($koneksi,"SELECT tbl_rincian.* ,tbl_proyek.*  FROM tbl_proyek join tbl_rincian ON tbl_proyek.id_proyek=tbl_rincian.id_proyek GROUP BY tbl_rincian.id_proyek");
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
                                <td><?php echo "Rp " . number_format($i['tot_biaya']) ?></td>
                                <td><?= $tot_rincian; ?></td>
                                <td><?= $row['tanggal']; ?></td>
                                <td>                           
                                 <a class="btn bg-orange waves-effect" href="detail_rincian.php?id=<?= $row['kode_proyek']; ?>" >Lihat Rincian</a>

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

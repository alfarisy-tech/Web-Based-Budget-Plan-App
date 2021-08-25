
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
          <h2>Manajemen Pengguna</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
              <div class="header">
                <h2>
                  Input Pengguna Baru
                </h2>

              </div>

              <div class="body">
                <form class="form-horizontal" method="POST" action="proses/user_add_act">

                  <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="password_2">Username</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                        <div class="form-line"> 
                          <input name="username" type="text" required="" id="password_2" class="form-control" placeholder="Enter your username">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="password_2">Password </label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                        <div class="form-line">
                          <input name="password" type="password" required="" id="password_2" class="form-control" placeholder="Enter your password">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="password_2">Nama </label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                        <div class="form-line">
                          <input id="jumlah" required="" name="nama" type="text"   class="form-control" placeholder="Enter your name">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row clearfix">
                   <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="password_2">Role</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                      <div class="form-line">
                        <select required="" name="role" class="form-control show-tick">
                          <option selected="" value="">-- Please select --</option>
                          <option  value="admin">Admin</option>
                          <option  value="user">User</option>

                        </select>
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
                <table class="table table-bordered table-striped table-hover" id="example1">
                  <thead>
                    <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Username</th>
                     <th>Role</th>
                     <th>Option</th>


                   </tr>
                 </thead>

                 <tbody>
                   <?php 
                   include 'koneksi.php';
                   $no=1;
                   $data = mysqli_query($koneksi,"SELECT * FROM tbl_user");
                   while ($row = mysqli_fetch_array($data)){

                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['nama']; ?></td>
                      <td><?= $row['username'] ?></td>
                      <td><?= $row['role']; ?></td>
                      <td> 
                        <a class="btn bg-blue waves-effect" data-toggle="modal" data-target="#defaultModal<?= $row['id_user']; ?>" >Edit</a>
                        <a class="btn bg-red waves-effect" href="proses/user_del_act.php?id=<?= $row['id_user']; ?>" >Delete</a>
                        <div class="modal fade" id="defaultModal<?= $row['id_user']; ?>" tabindex="-1" role="dialog">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="defaultModalLabel">Edit Proyek</h4>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="proses/user_edit_act">
                                  <input type="" hidden="" name="id" value="<?= $row['id_user']; ?>">
                                 <div class="row clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password_2">Username</label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                      <div class="form-line"> 
                                        <input name="username" value="<?= $row['username'] ?>" type="text" required="" id="password_2" class="form-control" placeholder="Enter your username">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password_2">Password </label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                      <div class="form-line">
                                        <input name="password" value="<?= $row['password'] ?>"  type="text" required="" id="password_2" class="form-control" placeholder="Enter your password">
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="row clearfix">
                                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password_2">Nama </label>
                                  </div>
                                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                      <div class="form-line">
                                        <input id="jumlah" required="" value="<?= $row['nama'] ?>"  name="nama" type="text"   class="form-control" placeholder="Enter your name">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row clearfix">
                                 <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                  <label for="password_2">Role</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                  <div class="form-group">
                                    <div class="form-line">
                                      <select required="" name="role" class="form-control show-tick">
                                        <option  value="<?= $row['role'] ?>"><?= $row['role'] ?> </option>
                                        <option  value="admin">Admin</option>
                                        <option  value="user">User</option>

                                      </select>
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

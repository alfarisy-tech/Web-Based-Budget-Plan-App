
<?php 
session_start();
include 'koneksi.php';
if (!empty($_SESSION["username"]) && !empty($_SESSION['password'])) {
  include 'layout/header.php';

  $data = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE id_user='$_SESSION[id_user]'");
  $i=mysqli_fetch_array($data);



 if (isset($_POST['pass'])) {
        $a = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE id_user='" . $_SESSION['id_user'] . "' ");
        $b = mysqli_fetch_array($a);
        $c = $b['password'];
        $d = md5($_POST['pl']);
        if ($c == $d) {
            $e = mysqli_query($koneksi, "UPDATE tbl_user SET password='" . md5($_POST['pb']) . "' WHERE id_user = '" . $b['id_user'] . "' ");
            if ($e) {
        echo "<script>  alert('Data Password berhasil diubah !!'); location.href='profile' </script>";
            }
        } else {
        echo "<script>  alert('Data Password Gagal diubah !!'); location.href='profile' </script>";
        }
    }
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
          <h2>Manajemen Profile</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
              <div class="header">
                <h2>
                  Edit Data Diri
                </h2>

              </div>

              <div class="body">
                <form class="form-horizontal" method="POST" action="proses/profile_edit_act">
              <input type="" hidden="" name="id" value="<?= $i['id_user'] ?>">

                  <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                      <label for="password_2">Username</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                      <div class="form-group">
                        <div class="form-line"> 
                          <input name="username" value="<?= $i['username'] ?>" type="text" required="" id="password_2" class="form-control" placeholder="Enter your username">
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
                          <input id="jumlah" required="" value="<?= $i['nama'] ?>" name="nama" type="text"   class="form-control" placeholder="Enter your name">
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
                          <option selected="" value="<?= $i['role'] ?>"><?= $i['role'] ?></option>
                          <option  value="admin">Admin</option>
                          <option  value="user">User</option>

                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row clearfix">
                  <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                    <button type="submit" name="edit" class="btn btn-success m-t-15 waves-effect">Ubah</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <div class="card">
            <div class="header">
              <h2>
               Ubah Password
             </h2>

           </div>

           <div class="body">
            <form class="form-horizontal" method="POST" action="">
              <input type="" hidden="" name="id" value="<?= $i['id_user'] ?>">
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="password_2">Password Lama</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line"> 
                      <input name="pl" type="text" required="" id="password_2" class="form-control" placeholder="Enter your username">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="password_2">Password Baru </label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input name="pb" type="password" required="" id="password_2" class="form-control" placeholder="Enter your password">
                    </div>
                  </div>
                </div>
              </div>



              <div class="row clearfix">
                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                  <button type="submit" name="pass" class="btn btn-success m-t-15 waves-effect">Ubah</button>
                </div>
              </div>
            </form>
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

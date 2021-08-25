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
        </div>
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
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <?php 
                        $ab=mysqli_query($koneksi,"SELECT COUNT(id_proyek) as jab FROM tbl_proyek");
                        $rab = mysqli_fetch_array($ab);

                        ?>
                        <div class="content">
                            <div class="text">JUMLAH ANGGARAN</div>
                            <div class="number count-to" data-from="0" data-to="<?= $rab['jab'] ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <?php 
                        $ar=mysqli_query($koneksi,"SELECT COUNT(id_rincian) as rinci FROM tbl_rincian");
                        $rin = mysqli_fetch_array($ar);

                        ?>
                        <div class="content">
                            <div class="text">JUMLAH RINCIAN</div>
                            <div class="number count-to" data-from="0" data-to="<?= $rin['rinci'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">money</i>
                        </div>
                        <?php 
                        $data=mysqli_query($koneksi,"SELECT SUM(total) as tot FROM tbl_rincian");
                        $rinda = mysqli_fetch_array($data);

                        ?>
                        <div class="content">
                            <div class="text">TOTAL ANGGARAN</div>
                            <div class="number count-to" data-from="0" data-to="<?= $rinda['tot'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <?php 
                        $user=mysqli_query($koneksi,"SELECT SUM(id_user) as totuse FROM tbl_user");
                        $i = mysqli_fetch_array($user);

                        ?>
                        <div class="content">
                            <div class="text">JUMLAH PENGGUNA</div>
                            <div class="number count-to" data-from="0" data-to="<?= $i['totuse'] ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12">
                                    <h2 class="text-center">SELAMAT DATANG DI</h2>
                                </div>

                            </div>

                        </div>
                        <div class="body">
                            <p class="text-center"><img src="images/logo.png"></p>
                            <h2 class="text-center">SISTEM INFORMASI RENCANA ANGGARAN BIAYA BERBABIS WEB PADA DINAS PERHUBUNGAN KOTA PALEMBANG</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# CPU Usage -->

            <!-- #END# Browser Usage -->
        </div>
    </div>
</section>
<!-- JS -->
<?php
include 'layout/js.php';
?>
<!-- //JS -->
</body>

</html>
<?php }else{

    echo "<script>  alert('Anda harus login dahulu !'); location.href='index.php' </script>";
}


?>
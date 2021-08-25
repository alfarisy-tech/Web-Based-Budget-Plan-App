<!-- User Info -->
<div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['role']; ?></div>
                    <div class="email"><?= $_SESSION['nama']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                           
                            <li role="separator" class="divider"></li>
                            <li><a href="proses/logout_act"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="home">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                  
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">map</i>
                            <span>Rancangan Anggaran Belanja</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="proyek">Proyek</a>
                            </li>
                            <li>
                                <a href="rincian">Rincian</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="laporan">
                            <i class="material-icons">assignment</i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <?php if ($_SESSION['role']=="admin"){ ?>
                        <li>
                        <a href="user">
                            <i class="material-icons">group</i>
                            <span>Manajemen Pengguna</span>
                        </a>
                         </li>
                        <?php } ?>
                   
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
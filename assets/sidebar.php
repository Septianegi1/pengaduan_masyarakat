<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="../../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <?php if ($_SESSION['level'] == 'admin') { ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-profile">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-pengaduan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Pengaduan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-tanggapan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Tanggapan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-masyarakat">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Masyarakat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-petugas">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                        </div>
                        <span class="nav-link-text ms-1">Petugas</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-auth/logout.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Log Out</span>
                    </a>
                </li>

            </ul>
        <?php } ?>

        <?php if ($_SESSION['level'] == 'petugas') { ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-profile">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-pengaduan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Pengaduan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-tanggapan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Tanggapan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-auth/logout.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Log Out</span>
                    </a>
                </li>

            </ul>
        <?php } ?>

        <?php if ($_SESSION['level'] == 'masyarakat') { ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-profile">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-pengaduan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Pengaduan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-tanggapan">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Tanggapan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white " href="http://<?= $_SERVER['SERVER_NAME'] ?>/pengaduan_masyarakat_egi/UKK-2023/modul/modul-auth/logout.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">login</i>
                        </div>
                        <span class="nav-link-text ms-1">Log Out</span>
                    </a>
                </li>

            </ul>
        <?php } ?>
    </div>

</aside>
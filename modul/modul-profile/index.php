<!DOCTYPE html>
<html lang="en">

<?php include('../../assets/header.php') ?>


<body class="g-sidenav-show  bg-gray-200">

    <!-- Sidebar -->
    <?php include('../../assets/sidebar.php') ?>
    <!-- end sidebar -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Profile</h6>
                </nav>

            </div>
        </nav>
        <!-- End Navbar -->

        <?php if ($_SESSION['level'] == 'masyarakat') { ?>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-7 mt-4">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Personal Information</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm"><?= $_SESSION['nama'] ?></h6>
                                            <span class="mb-2 text-xs">Username: <span class="text-dark font-weight-bold ms-sm-2"><?= $_SESSION['username'] ?></span></span>
                                            <span class="mb-2 text-xs">Nomor Induk Kependudukan: <span class="text-dark ms-sm-2 font-weight-bold"><?= $_SESSION['nik'] ?></span></span>
                                            <span class="text-xs">No Telepon: <span class="text-dark ms-sm-2 font-weight-bold"><?= $_SESSION['telp'] ?></span></span>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>

        <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'petugas') { ?>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-7 mt-4">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Personal Information</h6>
                            </div>
                            <div class="card-body pt-4 p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-3 text-sm"><?= $_SESSION['nama_petugas'] ?></h6>
                                            <span class="mb-2 text-xs">Username: <span class="text-dark font-weight-bold ms-sm-2"><?= $_SESSION['username'] ?></span></span>
                                            <span class="mb-2 text-xs">ID Petugas: <span class="text-dark ms-sm-2 font-weight-bold"><?= $_SESSION['id_petugas'] ?></span></span>
                                            <span class="text-xs">No Telepon: <span class="text-dark ms-sm-2 font-weight-bold"><?= $_SESSION['telp'] ?></span></span>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php } ?>

        <?php include('../../assets/footer.php') ?>


</body>

</html>
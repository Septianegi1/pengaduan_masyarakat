<!DOCTYPE html>
<html lang="en">
<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
	@header('location:../modul-auth/index.php');
}
// CRUD


if (isset($_POST['hapus'])) {
	$idLama = $_POST['idLama'];
	$q = mysqli_query($con, "DELETE FROM `petugas` WHERE id_petugas = '$idLama'");
}
if (isset($_POST['update'])) {
	$idLama = $_POST['idLama'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$telp = $_POST['telp'];
	$password = md5($_POST['password']);
	if ($password == '') {
		$q = mysqli_query($con, "UPDATE `petugas` SET id_petugas = '$idLama', nama _petugas= '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
	} else {
		$q = mysqli_query($con, "UPDATE `petugas` SET `password` = '$password', id_petugas = '$idLama', nama_petugas = '$nama', username = '$username', telp = '$telp' WHERE id_petugas = '$idLama'");
	}
}

?>
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Petugas</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Petugas</h6>
                </nav>

            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Petugas Info</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Petugas</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Petugas</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Telp</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $q = mysqli_query($con, "SELECT * FROM `petugas`");
                                        $no = 1;
                                        while ($d = mysqli_fetch_object($q)) { ?>
                                            <tr>
                                                <td >
                                                    <h6 class="mb-0 text-sm "><?= $d->id_petugas ?></h6>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $d->nama_petugas ?></p>

                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success"><?= $d->username ?></span>

                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">
                                                <?= $d->telp ?>
                                                </span>
                                                </td>

                                                <td class="align-middle text-center text-sm"><button data-toggle="modal" data-target="#modal-xl<?= $d->id_petugas ?>" class="btn btn-success"><i class="fa fa-pen"></i></button></td>
                                                <td class="align-middle text-center text-sm">
                                                    <form action="" method="post"><input type="hidden" name="idLama" value="<?= $d->id_petugas ?>"><button name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                                </td>
                                            </tr>

                                            <!-- modal start -->
                                            <div class="modal fade" id="modal-xl<?= $d->id_petugas ?>">
                                                <div class="modal-dialog modal-xl<?= $d->id_petugas ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Data</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="idLama" value="<?= $d->id_petugas ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group"><label for="nama">Nama</label>
                                                                    <input class="form-control" type="text" name="nama" value="<?= $d->nama_petugas ?>">
                                                                </div>
                                                                <div class="form-group"><label for="username">Username</label>
                                                                    <input class="form-control" type="text" name="username" value="<?= $d->username ?>">
                                                                </div>
                                                                <div class="form-group"><label for="username">New Password</label>
                                                                    <input class="form-control" type="password" name="password" value="">
                                                                </div>
                                                                <div class="form-group"><label for="username">Telepon</label>
                                                                    <input class="form-control" type="number" name="telp" value="<?= $d->telp ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" name="update" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- modal - ends -->

                                        <?php $no++;
                                        }
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php include('../../assets/footer.php') ?>


</body>

</html>
<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
} else {
    if ($_SESSION['level'] == 'masyarakat') {
        $nik = $_SESSION['nik'];
    }
}
// CRUD
if (isset($_POST['tambahPengaduan'])) {
    $isi_laporan = $_POST['isi_laporan'];
    $tgl = $_POST['tgl_pengaduan'];
    //upload
    $ekstensi_diperbolehkan = array('jpg', 'png');
    $foto = $_FILES['foto']['name'];
    $x = explode(".", $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    if (!empty($foto)) {
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '$foto', '0')";
            $r = mysqli_query($con, $q);
            if ($r) {
                move_uploaded_file($file_tmp, '../../assets/images/masyarakat/' . $foto);
            }
        }
    } else {
        $q = "INSERT INTO `pengaduan`(id_pengaduan, tgl_pengaduan, nik, isi_laporan, foto, `status`) VALUES ('', '$tgl', '$nik', '$isi_laporan', '', '0')";
        $r = mysqli_query($con, $q);
    }
}

// hapus pengaduan
if (isset($_POST['hapus'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    if ($id_pengaduan != '') {
        $q = "SELECT `foto` FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
        $r = mysqli_query($con, $q);
        $d = mysqli_fetch_object($r);
        unlink('../../assets/images/masyarakat/' . $d->foto);
    }
    $q = "DELETE FROM `pengaduan` WHERE id_pengaduan = $id_pengaduan";
    $r = mysqli_query($con, $q);
}

// rubah status pengaduan
if (isset($_POST['proses_pengaduan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $status = $_POST['status'];
    $q = "UPDATE `pengaduan` SET status = '$status' WHERE id_pengaduan = '$id_pengaduan'";
    $r = mysqli_query($con, $q);
}
?>

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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Pengaduan</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Pengaduan</h6>
                </nav>

            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Laporan
                        </button>
                    <?php } ?>

                    <!-- Modal -->
                    <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                            Add</span>
                                        <span class="fw-light">
                                            Laporan
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Isi Laporan</label>
                                                    <textarea name="isi_laporan" class="form-control" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal</label>
                                                    <input id="addPosition" type="date" name="tgl_pengaduan" class="form-control" placeholder="ketikan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Foto</label>
                                                    <input id="addOffice" type="file" name="foto" class="form-control" placeholder="ketikan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" name="tambahPengaduan" value="simpan" id="addRowButton" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Pengaduan Info</h6>
                            </div>



                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIK</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Isi Laporan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                            <?php if ($_SESSION['level'] == 'masyarakat') { ?>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus</th>
                                            <?php } ?>
                                            <?php if ($_SESSION['level'] == 'petugas') { ?>

                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Proses Pengaduan</th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($_SESSION['level'] == 'masyarakat') {
                                            $q = "SELECT * FROM `pengaduan` WHERE `nik` = $nik";
                                        } else {
                                            $q = "SELECT * FROM `pengaduan`";
                                        }
                                        $r = mysqli_query($con, $q);
                                        $no = 1;
                                        while ($d = mysqli_fetch_object($r)) {
                                        ?>
                                            <tr>

                                                <td>
                                                    <h6 class="mb-0 text-sm "><?= $d->tgl_pengaduan ?></h6>

                                                </td>
                                                <td class="">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $d->nik ?></p>

                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success"><?= $d->isi_laporan ?></span>

                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold"><?php if ($d->foto == '') {
                                                                                                                echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/no-foto.png">';
                                                                                                            } else {
                                                                                                                echo '<img style="max-height:100px" class="img img-thumbnail" src="../../assets/images/masyarakat/' . $d->foto . '">';
                                                                                                            } ?></span>


                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <?= $d->status ?>
                                                </td>
                                                <?php if ($_SESSION['level'] == 'masyarakat') { ?>

                                                    <td class="align-middle text-center text-sm">
                                                        <form action="" method="post"><input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>"><button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i></button></form>
                                                    </td>
                                                <?php } ?>
                                                <?php if ($_SESSION['level'] == 'petugas') { ?>

                                                    <td class="align-middle text-center text-sm">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id_pengaduan" value="<?= $d->id_pengaduan ?>">
                                                            <select class="form-control" name="status">
                                                                <option value="0"> 0 </option>
                                                                <option value="proses"> proses </option>
                                                                <option value="selesai"> selesai </option>
                                                            </select><br>
                                                            <button type="submit" name="proses_pengaduan" class="btn btn-success form-control">ubah</button>
                                                        </form>
                                                    </td>
                                                <?php } ?>

                                            </tr>
                                        <?php $no++;
                                        } ?>



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
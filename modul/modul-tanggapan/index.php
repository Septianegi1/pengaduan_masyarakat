<?php
// SESSION
session_start();
include('../../config/database.php');
if (empty($_SESSION['username'])) {
    @header('location:../modul-auth/index.php');
} else {
    if ($_SESSION['level'] == 'masyarakat') {
        $nik = $_SESSION['nik'];
    } else {
        $id_petugas = $_SESSION['id_petugas'];
    }
}
// tambah tanggapan
if (isset($_POST['tambah_tanggapan'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $id_petugas = $_POST['id_petugas'];
    $tanggapan = $_POST['tanggapan'];
    $q = "INSERT INTO `tanggapan` (id_tanggapan, id_pengaduan, tgl_tanggapan, tanggapan, id_petugas) VALUES ('','$id_pengaduan', '$tgl_tanggapan', '$tanggapan', '$id_petugas')";
    $r = mysqli_query($con, $q);
}
// hapus tanggapan
if (isset($_POST['hapusTanggapan'])) {
    $id_tanggapan = $_POST['id_tanggapan'];
    mysqli_query($con, "DELETE FROM `tanggapan` WHERE id_tanggapan = '$id_tanggapan'");
}
// update tanggapan
if (isset($_POST['ubahTanggapan'])) {
    $id_tanggapan =  $_POST['id_tanggapan'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $tanggapan = $_POST['tanggapan'];
    mysqli_query($con, "UPDATE `tanggapan` SET tgl_tanggapan = '$tgl_tanggapan', tanggapan = '$tanggapan' WHERE `id_tanggapan` = '$id_tanggapan'");
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tanggapan</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Tanggapan</h6>
                </nav>

            </div>
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <?php if ($_SESSION['level'] == 'petugas') { ?>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Tanggapan
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
													Tanggapan
												</span>
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="" method="post">
												<div class="row">
													<div class="col-sm-12">
														<input class="form-control" name="id_tanggapan" type="hidden">
														<div class="form-group form-group-default">
															<label for="id_pengaduan"> Beri Tanggapan</label>
															<textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"></textarea>
														</div>

														<div class="form-group form-group-default">
															<label for="id_pengaduan"> Pilih Id Pengaduan</label>
															<select name="id_pengaduan" class="form-control">
																<?php
																$q = "SELECT * FROM pengaduan JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik";
																$r = mysqli_query($con, $q);
																while ($d = mysqli_fetch_object($r)) { ?>
																	<option value="<?= $d->id_pengaduan ?>"><?= $d->id_pengaduan . '|' . $d->nik . '|' . $d->nama ?></option>
																<?php } ?>
															</select>
														</div>
													</div>
													<div class="col-md-6 pr-0">
														<div class="form-group form-group-default">
															<label>Tanggal</label>
															<input class="form-control" type="date" name="tgl_tanggapan">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group form-group-default">
															<label>ID Petugas</label>
															<input name="id_petugas" type="text" class="form-control" value="<?= $id_petugas ?>" readonly>
														</div>
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button name="tambah_tanggapan" type="submit" id="addRowButton" class="btn btn-primary">Tambahkan</button>
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
                                <h6 class="text-white text-capitalize ps-3">Tanggapan Info</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Pengaduan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Tanggapan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Isi Tanggapan</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Petugas</th>
                                            <?php if ($_SESSION['level'] == 'petugas') { ?>
                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hapus</th>
                                            <?php } ?>
                                            <?php if ($_SESSION['level'] == 'petugas') { ?>

                                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                                            <?php } ?>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $q = "SELECT * FROM `tanggapan` JOIN `petugas` JOIN `pengaduan`
                             WHERE tanggapan.id_petugas = petugas.id_petugas 
                             AND tanggapan.id_pengaduan = pengaduan.id_pengaduan";
                                        $r = mysqli_query($con, $q);
                                        while ($d = mysqli_fetch_object($r)) { ?>
                                            <tr>
                                                <td>
                                                    <h6 class="mb-0 text-sm "><?= $d->id_pengaduan ?></h6>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-xs font-weight-bold mb-0"><?= $d->tgl_tanggapan ?></p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success"><?= $d->tanggapan ?></span>


                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-secondary text-xs font-weight-bold"><?= $d->nama_petugas ?></span>

                                                </td>
                                                <?php if ($_SESSION['level'] == 'petugas') { ?>
                                                    <td class="align-middle text-center text-sm">
                                                        <form action="" method="post"><input type="hidden" name="id_tanggapan" value="<?= $d->id_tanggapan ?>"><button name="hapusTanggapan" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i>&nbsp;hapus</button></form>
                                                    </td>
                                                <?php } ?>
                                                <?php if ($_SESSION['level'] == 'petugas') { ?>
                                                    <td class="align-middle text-center text-sm">
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg<?= $d->id_pengaduan ?>" class="btn btn-success"><i class="fa fa-pen"></i>&nbsp;Edit</button>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                            <div class="modal fade" id="modal-lg<?= $d->id_pengaduan ?>">
                                                <div class="modal-dialog modal-lg<?= $d->id_pengaduan ?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            Edit Pengaduan
                                                        </div>
                                                        <form a ction="" method="post">
                                                            <div class="modal-body">
                                                                <input class="form-control" name="id_tanggapan" type="hidden" value="<?= $d->id_tanggapan ?>">
                                                                <label for="id_pengaduan">ID Pengaduan</label><br>
                                                                <select class="form-control" name="id_pengaduan">
                                                                    <?php
                                                                    $result = mysqli_query($con, "SELECT * FROM `pengaduan` JOIN `masyarakat` WHERE pengaduan.nik = masyarakat.nik");
                                                                    while ($data = mysqli_fetch_object($result)) { ?>
                                                                        <option value="<?= $data->id_pengaduan ?>" <?php if ($d->id_pengaduan == $data->id_pengaduan) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>><?= $data->id_pengaduan . '|' . $data->nik . '|' . $data->nama ?></option>
                                                                    <?php } ?>
                                                                </select><br>
                                                                <label for="tgl_tanggapan">Tanggal Tanggapan</label>
                                                                <input class="form-control" name="tgl_tanggapan" class="form-control" type="date" name="" value="<?= $d->tgl_tanggapan ?>">
                                                                <label for="tanggapan">Tanggapan</label>
                                                                <textarea class="form-control" name="tanggapan" id="" cols="30" rows="10"><?= $d->tanggapan ?></textarea>
                                                                <br>
                                                                <button name="ubahTanggapan" type="submit" class="btn btn-info">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
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
<?php
session_start();
include('koneksi.php');
if (!isset($_SESSION['session_username'])) {
    header("location:login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DWITRI - Agenda Pimpinan</title>

    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include('include/navbar.php')
        ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('include/header.php')
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Agenda Umum</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Table Agenda Umum</h6>
                            <a href="#" data-toggle="modal" data-target="#tambahModal" class="mt-2 btn btn-primary shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: .8rem;">
                                    <thead>
                                        <!-- Topbar Search -->
                                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                            <div class="input-group">
                                                <input type="text" class="form-control w-25 bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Umum</th>
                                            <th>Hari</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Kegiatan</th>
                                            <th>Ruangan</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $tampil = mysqli_query($koneksi, "SELECT * FROM agenda_umum ORDER BY id_umum ASC");
                                        // Jika ada data, tampilkan dalam tabel
                                        while ($data = mysqli_fetch_array($tampil)) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nama_umum'] ?></td>
                                                <td><?= $data['hari'] ?></td>
                                                <td><?= $data['tanggal'] ?></td>
                                                <td><?= $data['jam'] ?></td>
                                                <td><?= $data['kegiatan'] ?></td>
                                                <td><?= $data['ruangan'] ?></td>
                                                <td>
                                                    <a class='btn btn-success' style="font-size: .8rem;" href="#" data-toggle="modal" data-target="#editModal<?= $no ?>">Edit</a>
                                                </td>
                                                <td>
                                                    <a class='btn btn-danger' style="font-size: .8rem;" href="#" data-toggle="modal" data-target="#hapusModal<?= $no ?>">Hapus</a>
                                                </td>
                                            </tr>

                                            <!-- Awal Modal Edit -->
                                            <div class="modal fade" id="editModal<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Agenda Umum</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" id="formEditBarang" action="prosesumum.php">
                                                                <input type="hidden" name="id_umum" value="<?= $data['id_umum'] ?>">
                                                                <label for="nama_umum">Masukkan Nama Umum:</label><br>
                                                                <input type="text" id="nama_umum" name="nama_umum" class="form-control" value="<?= $data['nama_umum'] ?>">
                                                                <br>
                                                                <label for="hari">Pilih Hari:</label><br>
                                                                <select class="form-control" aria-label="Default select example" id="hari" name="hari">
                                                                    <option value="<?= $data['hari'] ?>" selected><?= $data['hari'] ?></option>
                                                                    <option value="Minggu">Minggu</option>
                                                                    <option value="Senin">Senin</option>
                                                                    <option value="Selasa">Selasa</option>
                                                                    <option value="Rabu">Rabu</option>
                                                                    <option value="Kamis">Kamis</option>
                                                                    <option value="Jumat">Jumat</option>
                                                                    <option value="Sabtu">Sabtu</option>
                                                                </select>
                                                                <br>
                                                                <label for="tanggal">Masukkan Tanggal:</label><br>
                                                                <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>">
                                                                <br>
                                                                <label for="jam">Masukkan Jam:</label><br>
                                                                <input type="text" id="jam" name="jam" class="form-control" value="<?= $data['jam'] ?>">
                                                                <br>
                                                                <label for="kegiatan">Kegiatan:</label><br>
                                                                <textarea name="kegiatan" id="kegiatan" rows="5" class="form-control"><?= $data['kegiatan'] ?></textarea>
                                                                <br>
                                                                <label for="ruangan">Ruangan:</label><br>
                                                                <textarea name="ruangan" id="ruangan" rows="5" class="form-control"><?= $data['ruangan'] ?></textarea>
                                                                <br>
                                                                <button type="submit" name="bubah" class="btn btn-success">Edit</button>
                                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Edit -->

                                            <!-- Awal Modal Hapus -->
                                            <div class="modal fade" id="hapusModal<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus Data Barang</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" id="formEditBarang" action="prosesumum.php">
                                                                <input type="hidden" name="id_umum" value="<?= $data['id_umum'] ?>">

                                                                <h5 class="text-center">Apakah Anda yakin Menghapus Data ini?
                                                                    <br>
                                                                    <span class="text-danger"><?= $data['nama_umum'] ?> - <?= $data['hari'] ?> - <?= $data['kegiatan'] ?> - <?= $data['ruangan'] ?></span>
                                                                </h5>
                                                                <br>
                                                                <button type="submit" name="bhapus" class="btn btn-danger">Ya, Hapus Saja</button>
                                                                <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Hapus -->
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            include('include/footer.php')
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" Jika kamu sudah selesai.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Logout Modal-->

    <!-- Tambah Modal -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Agenda Umum</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formTambahBarang" action="prosesumum.php">
                        <label for="nama_umum">Masukkan Nama Umum:</label><br>
                        <input type="text" id="nama_umum" name="nama_umum" class="form-control">
                        <br>
                        <label for="hari">Pilih Hari:</label><br>
                        <select class="form-control" aria-label="Default select example" id="hari" name="hari">
                            <option selected disabled>Pilih Hari</option>
                            <option value="Minggu">Minggu</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                        <br>
                        <label for="tanggal">Pilih tanggal:</label><br>
                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                        <br>
                        <label for="jam">Masukkan Jam:</label><br>
                        <input type="time" id="jam" name="jam" class="form-control">
                        <br>
                        <label for="kegiatan">Kegiatan:</label><br>
                        <textarea name="kegiatan" id="kegiatan" rows="5" class="form-control"></textarea>
                        <br>
                        <label for="ruangan">Ruangan:</label><br>
                        <textarea name="ruangan" id="ruangan" rows="5" class="form-control"></textarea>
                        <br>
                        <button type="submit" name="bsimpan" class="btn btn-success">Tambah</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- End Tambah Modal -->

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>
</body>

</html>
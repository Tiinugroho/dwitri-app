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

    <title>DWITRI - About</title>

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
                        <h1 class="h3 mb-0 text-gray-800">About</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <h2>Apa Itu Website?</h2>
                    <br>
                    <p>
                        Website adalah sebuah halaman atau sekumpulan halaman web yang saling terhubung dan dapat
                        <br>
                        diakses dari seluruh dunia, selama terkoneksi ke jaringan internet.
                        <br>
                        Setiap halaman website memiliki alamat unik yang dikenal sebagai URL (Uniform Resource Locator).
                        <br>
                        Situs web dapat berisi berbagai jenis informasi, misalnya teks, gambar, video, dan audio. Selain
                        <br>
                        itu, website juga bisa memuat fitur interaktif seperti form kontak, komentar, atau chatting.
                    </p>
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
                    <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Agenda Pimpinan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="formTambahBarang" action="prosespimpinan.php">
                        <label for="nama_pimpinan">Masukkan Nama Pimpinan:</label><br>
                        <input type="text" id="nama_pimpinan" name="nama_pimpinan" class="form-control">
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
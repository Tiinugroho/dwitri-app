<?php
include_once('koneksi.php');

include('koneksi.php');

if (isset($_POST['bsimpan'])) {
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $kegiatan = $_POST['kegiatan'];
    $ruangan = $_POST['ruangan'];


    $simpan = "INSERT INTO dataruang (hari,tanggal,jam,kegiatan,ruangan) VALUES
    ('$hari','$tanggal','$jam','$kegiatan','$ruangan')";

    if ($conn->query($simpan) === TRUE) {
        echo "<script>
                alert('Simpan Data Sukses!');
                document.location='dataRuang.php';
            </script>";
    } else {
        echo "<script>
                alert('Simpan Data Gagal!');
                document.location='dataRuang.php';
            </script>";
    }

    // Tutup koneksi ke database setelah selesai
    $conn->close();
}

if (isset($_POST['bubah'])) {
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $kegiatan = $_POST['kegiatan'];
    $ruangan = $_POST['ruangan'];


    $ubah = "UPDATE dataruang SET 
    hari='$_POST[hari]',
    tanggal='$_POST[tanggal]',
    jam='$_POST[jam]',
    kegiatan='$_POST[kegiatan]',
    ruangan='$_POST[ruangan]'


    WHERE id_dataruang = '$_POST[id_dataruang]'
    ";

    if ($conn->query($ubah) === TRUE) {
        echo "<script>
                alert('Ubah Data Sukses!');
                document.location='dataRuang.php';
            </script>";
    } else {
        echo "<script>
                alert('Ubah Data Gagal!');
                document.location='dataRuang.php';
            </script>";
    }

    // Tutup koneksi ke database setelah selesai
    $conn->close();
}

if (isset($_POST['bhapus'])) {
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $hari = $_POST['hari'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $kegiatan = $_POST['kegiatan'];
    $ruangan = $_POST['ruangan'];


    $hapus = "DELETE FROM dataruang WHERE id_dataruang = '$_POST[id_dataruang]' ";

    if ($conn->query($hapus) === TRUE) {
        echo "<script>
                alert('Hapus Data Sukses!');
                document.location='dataRuang.php';
            </script>";
    } else {
        echo "<script>
                alert('Hapus Data Gagal!');
                document.location='dataRuang.php';
            </script>";
    }

    // Tutup koneksi ke database setelah selesai
    $conn->close();
}

?>
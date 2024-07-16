<?php
session_start();

include('koneksi.php');

$err = ''; // Inisialisasi variabel error

if (isset($_COOKIE['cookie_username'])) {
    $cookie_username = $_COOKIE['cookie_username'];
    $sql1   = "SELECT * FROM login WHERE username = '$cookie_username'";
    $q1     = mysqli_query($koneksi, $sql1);
    $r1     = mysqli_fetch_array($q1);

    // Periksa apakah password dari cookie sesuai dengan password dari database
    if ($r1 && $r1['password'] == $cookie_password) {
        $_SESSION['session_username'] = $cookie_username;
        $_SESSION['session_password'] = $cookie_password;
    }
}

if (isset($_SESSION['session_username'])) {
    header("location:dashboard.php");
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' or $password == '') {
        $err .= "<li> Silahkan Masukkan Username dan Juga Password </li>";
    } else {
        $sql1   = "SELECT * FROM login WHERE username = '$username'";
        $q1     = mysqli_query($koneksi, $sql1);
        $r1     = mysqli_fetch_array($q1);

        if (!$r1 || $r1['username'] == '') {
            $err .= "Username <b>$username</b> Tidak Tersedia!";
        } elseif ($r1['password'] != md5($password)) {
            $err .= "Password Salah !";
        }

        if (empty($err)) {
            $_SESSION['session_username'] = $username;
            $_SESSION['session_password'] = md5($password);

            // Jika ingin mengatur cookie
            if ($ingataku == 1) {
                
                $cookie_name = "cookie_username";
                $cookie_value = $username;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");

                $cookie_name = "cookie_password";
                $cookie_value = $password;
                $cookie_time = time() + (60 * 60 * 24 * 30);
                setcookie($cookie_name, $cookie_value, $cookie_time, "/");
            }
            echo "<script>
                alert('Login Sukses!');
                document.location='dashboard.php';
            </script>";
        }
    }
}

// Setelah proses login berhasil
// Simpan informasi pengguna dan peran di sesi
// $_SESSION['session_username'] = $username;
// $_SESSION['session_password'] = md5($password);
// $_SESSION['session_role'] = $r1['role']; // Gantilah dengan nama kolom yang sesuai di tabel login

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="style/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="login-container">

        <form id="loginform" action="" method="POST" role="form">
            <h2>LOGIN</h2>
            <div class="input-group">
                <label for="username">USERNAME</label>
                <input type="text" id="username" name="username" placeholder="Masukkan Username" required>
            </div>
            <div class="input-group">
                <label for="password">PASSWORD</label>
                <input type="password" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <div class="input-group">
                <label for=""></label>
                <input type="checkbox" id="login-remember" name="ingataku" placeholder="Masukkan Password" value="1" <?php if ($ingataku == '1') echo "checked" ?>>Ingat Aku
            </div>
            <input type="submit" name="login" value="login">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Login Successful!',
                    text: 'Welcome back!',
                    showConfirmButton: true,
                    timer: 2000
                });
            <?php } ?>

            <?php if (!empty($err)) { ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '<?php echo $err; ?>',
                    showConfirmButton: true
                });
            <?php } ?>
        });
    </script>

</body>

</html>
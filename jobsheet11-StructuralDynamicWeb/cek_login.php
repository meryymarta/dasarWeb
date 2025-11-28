<?php 
if (session_status() === PHP_SESSION_NONE)
    session_start();

// Asumsi: Path sudah benar dan file ada
include "config/koneksi.php";
include "fungsi/pesan_kilat.php";
include "fungsi/anti_injection.php";

$username = anti_injection($koneksi, $_POST['username']);
$password = anti_injection($koneksi, $_POST['password']);

$query = "SELECT username, level, salt, password as hashed_password FROM \"user\" WHERE username = '$username'";
// PERBAIKAN: Ganti mysqli_query() menjadi pg_query()
$result = pg_query($koneksi, $query); 

// PERBAIKAN: Ganti mysqli_fetch_assoc() menjadi pg_fetch_assoc()
$row = pg_fetch_assoc($result);

// PERBAIKAN: Ganti mysqli_close() menjadi pg_close()
pg_close($koneksi); 

$salt = $row['salt'];
$hashed_password = $row['hashed_password'];

if ($salt !== null && $hashed_password !== null) {
    $combined_password = $salt . $password;

    if (password_verify($combined_password, $hashed_password)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['level']      = $row['level'];
        header("Location: index.php");
    } else {
        pesan('danger', "Login gagal. Password Anda salah");
        header("Location: login.php");
    }
} else {
    pesan('warning', "Username tidak ditemukan");
    header("Location: login.php");
}
?>
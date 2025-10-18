<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "1234") {
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["status"] = 'login';

        echo "Anda berhasil login. Silahkan menuju <a href='homeSession.php'>Halaman Home</a>";
    } else {
        echo "Gagal login. Silahkan coba lagi <a href='sessionLoginForm.html'>Disini</a>";
    }
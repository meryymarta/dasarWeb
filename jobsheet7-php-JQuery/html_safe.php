<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil input nama
    $nama = $_POST['nama'];
    $nama = htmlspecialchars($nama, ENT_QUOTES, 'UTF-8');
    
    echo "Hasil input yang sudah difilter: " . $nama . "<br>";

    // Ambil input email
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email valid: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    } else {
        echo "Email tidak valid. Masukkan email yang benar!";
    }
}
?>

<form method="post">
    <label for="nama">Nama:</label><br>
    <input type="text" name="nama" id="nama" required><br><br>

    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>

    <input type="submit" name="submit" value="Submit">
</form>

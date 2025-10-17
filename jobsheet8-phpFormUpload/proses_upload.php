<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "images/";

// Periksa apakah direktori penyimpanan ada, jika tidak maka buat
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Periksa apakah ada file yang diunggah
if ($_FILES['images']['name'][0]) {
    $totalFiles = count($_FILES['images']['name']);
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");


    // Loop melalui semua file yang diunggah
    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['images']['name'][$i];
        $fileTmp = $_FILES['images']['tmp_name'][$i];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $targetFile = $targetDirectory . $fileName;

        // Pindahkan file yang diunggah ke direktori penyimpanan
        if (in_array($fileExtension, $allowedExtensions)) {
            if (move_uploaded_file($fileTmp, $targetFile)) {
                echo "Gambar " . $fileName . " berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah gambar " . $fileName . ".<br>";
            }
        } else {
            echo "File " . $fileName . " bukan gambar yang diperbolehkan.<br>";
        }
    }
} else {
    echo "Tidak ada gambar yang diunggah.";
}
?>

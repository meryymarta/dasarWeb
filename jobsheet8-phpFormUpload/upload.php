<?php
if(isset($_POST['submit'])){
    $targetdir = "uploads/"; //direktori tujuan untuk menyimpan file
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtensions = array("txt", "pdf", "doc", "docx");
    $maxsize = 5*1024*1024;

    if(in_array($fileType, $allowedExtensions)&& $_FILES["myfile"]["size"] <=$maxsize)
        {
        if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)){
            echo "File berhasil diunggah";

            // //kode tambahan untuk tumbnail

            // $targetWidth = 200;

            // list($originalWidth, $originalHeight) = getimagesize($targetfile);

            // $targetHeight = round(($originalHeight / $originalWidth) * $targetWidth);

            // $thumbnail = imagecreatetruecolor($targetWidth, $targetHeight);

            // //fungsi pembuatan gambar berdasarkan tipe file
            // if($fileType == "jpg" || $fileType == "jpeg"){
            //     $sourceImage = imagecreatefromjpeg($targetfile);
            // } else if ($fileType == "png"){
            //     $sourceImage = imagecreatefrompng($targetfile);
            // } else if ($fileType == "gif"){
            //     $sourceImage = imagecreatefromgif($targetfile);
            // } else {
            //     $sourceImage = false;
            // } 
            // if ($sourceImage){
            //     imagecopyresampled($thumbnail, $sourceImage, 0, 0, 0, 0, $targetWidth, $targetHeight, $originalWidth, $originalHeight);

            //     //timpa file asli dengan versi thumbnail 200px
            //     imagejpeg($thumbnail, $targetfile);

            //     echo "<br>Thumbnail berhasil dibuat";
            //     echo "<br><img src='" . $targetfile . "' width='" . $targetWidth . "' height='" . $targetHeight . "'>";

            //     imagedestroy($sourceImage);
            //     imagedestroy($thumbnail);        
            // }


        } else {
            echo "Gagal mengunggah file";
    }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum yang diinginkan";
    }
}
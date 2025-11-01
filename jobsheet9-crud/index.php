<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Anggota</title>
</head>
<body>

<div class="container">
    <h2>Data Anggota</h2>
    <a href="create.php" class="btn">Tambah Anggota</a>

<?php

include 'koneksi.php';

$query = "SELECT * FROM anggota order by id desc";
$result = pg_query($koneksi, $query);

if (pg_num_rows($result) > 0) {
    echo '
<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>No. Telp</th>
        <th>Aksi</th>
    </tr>';

    while ($row = pg_fetch_array($result)) {
        $kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan';
        echo '
    <tr>
        <td>'. $row['id'] .'</td>
        <td>'. $row['nama'] .'</td>
        <td>'. $kelamin .'</td>
        <td>'. $row['alamat'] .'</td>
        <td>'. $row['no_telp'] .'</td>
        <td>
            <a href="edit.php?id='. $row['id'] .'">Edit</a> | 
            <a href="#" onclick="konfirmasihapus('. $row['id'] .', \''. $row['nama'] .'\')">Hapus</a>
        </td>
    </tr>';
    }

    echo '</table>';
} else {
    echo "Tidak ada data.";
}

pg_close($koneksi);

?>

</div>

<script>
function konfirmasihapus(id, nama) {
    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data dengan nama " + nama + "?");
    if (konfirmasi) {
        window.location.href = "proses.php?aksi=hapus&id=" + id;
    }
}
</script>
</body>
</html>
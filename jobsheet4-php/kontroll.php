<?php
$nilai = [85, 92, 78, 64, 90, 75, 88, 79, 70, 96];


sort($nilai);

$total = 0;
$jumlahData = 0;

for ($i = 2; $i < count($nilai) - 2; $i++) {
    $total += $nilai[$i];
    $jumlahData++;
}


$rataRata = $total / $jumlahData;


echo "Total nilai dengan mengabaikan 2 tertinggi & 2 terendah: $total <br>";
echo "Rata-rata nilai: $rataRata";
?>

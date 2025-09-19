<?php
$hargaAwal = 120000;
$diskon = 0;

if ($hargaAwal > 100000) {
    $diskon = 0.20 * $hargaAwal; 
}

$hargaAkhir = $hargaAwal - $diskon;

echo "Harga awal: Rp $hargaAwal <br>";
echo "Diskon: Rp $diskon <br>";
echo "Harga yang harus dibayar: Rp $hargaAkhir";
?>

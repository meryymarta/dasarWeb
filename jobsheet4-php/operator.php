<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "Nilai a: $a <br>";
echo "Nilai b: $b <br>";

echo "<br>";

echo "Hasil Penjumlahan: $hasilTambah <br>";
echo "Hasil Pengurangan: $hasilKurang <br>";     
echo "Hasil Perkalian: $hasilKali <br>";
echo "Hasil Pembagian: $hasilBagi <br>";
echo "Hasil Modulus: $sisaBagi <br>";
echo "Hasil Pangkat: $pangkat <br>";


echo "<br>";
$hasilSama = $a == $b;
$hasilTidakSama = $a !=$b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "Hasil Sama: ";
var_dump($hasilSama);
echo "<br>";

echo "Tidak Sama: ";
var_dump($hasilTidakSama);
echo "<br>";

echo "Lebih Kecil: ";
var_dump($hasilLebihKecil);
echo "<br>";

echo "Lebih Besar: ";
var_dump($hasilLebihBesar);
echo "<br>";

echo "Lebih Kecil Sama Dengan: ";
var_dump($hasilLebihKecilSama);
echo "<br>";

echo "Lebih Besar Sama Dengan: ";
var_dump($hasilLebihBesarSama);
echo "<br>";


$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "<br>";
echo "Hasil AND (a && b): ";
var_dump($hasilAnd);
echo "<br>";

echo "Hasil OR (a || b): ";
var_dump($hasilOr);
echo "<br>";

echo "Hasil NOT a (!a): ";
var_dump($hasilNotA);
echo "<br>";

echo "Hasil NOT b (!b): ";
var_dump($hasilNotB);
echo "<br>";


$a = 10;
$b = 5;

echo "Nilai awal a: 10 <br>";
echo "Nilai b: 5 <br><br>";

$a += $b; 
echo "Setelah a += b, nilai a: $a <br>";

$a -= $b; 
echo "Setelah a -= b, nilai a: $a <br>";

$a *= $b; 
echo "Setelah a *= b, nilai a: $a <br>";


$a /= $b; 
echo "Setelah a /= b, nilai a: $a <br>";


$a %= $b; 
echo "Setelah a %= b, nilai a: $a <br>";

echo "<br>";

$hasilIdentik = $a === $b;
$hasilTidakIdentik = $a !== $b;
echo "Apakah a identik dengan b (a === b)? ";
var_dump($hasilIdentik);
echo "<br>";

echo "Apakah a tidak identik dengan b (a !== b)? ";
var_dump($hasilTidakIdentik);
echo "<br>";

echo "<br>";

?>



<?php
$totalSeats = 45;      
$occupied = 28;      
$empty = $totalSeats - $occupied; 

$percentageEmpty = ($empty / $totalSeats) * 100;
echo "Total kursi: $totalSeats <br>";
echo "Kursi terisi: $occupied <br>";
echo "Kursi kosong: $empty <br>";
echo "Persentase kursi kosong: $percentageEmpty%<br>";
?>

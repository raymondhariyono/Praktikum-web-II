<?php
$jari_jari = 4.2;
$tinggi = 5.4;
$panjang = 8.9;
$lebar = 14.7;
$sisi = 7.9;

$alas = $panjang;
$tinggiSegitiga = $lebar;
$tinggiPrisma = $tinggi;
$volumePrismaAlasSegitiga = 0.5 * $alas * $tinggiSegitiga * $tinggiPrisma;

echo "Volume Bangun Ruang prisma alas segitiga: " . number_format($volumePrismaAlasSegitiga, 3) . " cm3 <br>";
?>
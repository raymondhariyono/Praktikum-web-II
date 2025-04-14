<?php
$hasil = "";

if (isset($_POST['submit'])) {
    $nilai = $_POST['nilai'];

    if (!is_numeric($nilai) || $nilai < 0) {
        $hasil = "Input tidak valid.";
    } elseif ($nilai > 999) {
        $hasil = "Anda Menginput Melebihi Limit Bilangan";
    } elseif ($nilai == 0) {
        $hasil = "Nol";
    } elseif ($nilai >= 1 && $nilai <= 9) {
        $hasil = "Satuan";
    } elseif ($nilai >= 10 && $nilai <= 19) {
        $hasil = "Belasan";
    } elseif ($nilai >= 20 && $nilai <= 99) {
        $hasil = "Puluhan";
    } elseif ($nilai >= 100 && $nilai <= 999) {
        $hasil = "Ratusan";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>PRAK204</title>
</head>

<body>

    <form method="post" action="">
        <label>Nilai :</label>
        <input type="text" name="nilai" value="<?php if (isset($_POST['nilai']))
            echo $_POST['nilai']; ?>">
        <input type="submit" name="submit" value="Konversi">
    </form>

    <?php if ($hasil): ?>
        <h3>Hasil: <?= strtolower($hasil) ?></h3>
    <?php endif; ?>

</body>

</html>
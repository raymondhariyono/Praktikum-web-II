<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prak 302</title>
</head>

<body>
    <form method="post">
        <label>Tinggi</label>
        <input type="number" name="angka" required value="<?php echo isset($_POST['angka']) ? $_POST['angka'] : ''; ?>">
        <br>
        <label>Alamat gambar</label>
        <input type="url" name="link" required value="<?php echo isset($_POST['link']) ? $_POST['link'] : ''; ?>">
        <br>
        <input type="submit" name="submit" value="Cetak">
    </form>
</body>

<?php
if (isset($_POST['submit'])) {
    $tinggi = $_POST['angka'];
    $link = $_POST['link'];
    $i = $tinggi;

    while ($i >= 1) {
        $j = 1;
        while ($j <= $tinggi - $i) {
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            $j++;
        }
        $j = 1;
        while ($j <= $i) {
            echo "<img src='$link' height='20px' width='20px'> ";
            $j++;
        }
        echo "<br>";
        $i--;
    }
}
?>

</html>
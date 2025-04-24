<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .label-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form method="post">
        <label>Masukkan inputan:</label>
        <input type="text" name="jumlahKarakter"
            value="<?php echo isset($_POST['jumlahKarakter']) ? $_POST['jumlahKarakter'] : ''; ?>" required>
        <br><br>
        <input type="submit" name="submit" value="Cetak">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $jumlahKarakter = $_POST['jumlahKarakter'];
        $arrayKarakter = str_split($jumlahKarakter);
        $jumlahHuruf = count($arrayKarakter);

        echo "<p class='label-bold'>Input:</p>";
        echo "<p>$jumlahKarakter</p>";

        echo "<p class='label-bold'>Output:</p><p>";
        for ($i = 0; $i < $jumlahHuruf; $i++) {
            for ($j = 0; $j < $jumlahHuruf; $j++) {
                if ($j == 0) {
                    echo strtoupper($arrayKarakter[$i]);
                } else {
                    echo strtolower($arrayKarakter[$i]);
                }
            }
        }
        echo "</p>";
    }
    ?>
</body>

</html>
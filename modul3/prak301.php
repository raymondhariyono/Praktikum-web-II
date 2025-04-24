<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prak301</title>
    <style>
        .genap {
            color: green;
            font-weight: bold;
            font-size: larger;
        }

        .ganjil {
            color: red;
            font-weight: bold;
            font-size: larger;
        }
    </style>
</head>

<body>
    <form method="post">
        <label>Jumlah peserta</label>
        <input type="number" name="angka" required>
        <br>
        <input type="submit" name="submit" value="Cetak">
    </form>


    <?php

    if (isset($_POST['submit'])) {
        $index = 1;
        $peserta = $_POST['angka'];
        while ($index <= $peserta) {
            if ($index % 2 == 0) {
                echo "<span class='genap'>Peserta ke-$index</span><br><br>";
            } else {
                echo "<span class='ganjil'>Peserta ke-$index</span><br><br>";
            }
            $index++;
        }
    }

    ?>
</body>

</html>
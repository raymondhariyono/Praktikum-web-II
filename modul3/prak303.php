<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prak301</title>
</head>

<body>
    <form method="post">
        <label>batas bawah</label>
        <input type="number" name="batas-bawah"
            value="<?php echo isset($_POST['batas-bawah']) ? $_POST['batas-bawah'] : ''; ?>" required>
        <br>
        <label>batas atas</label>
        <input type="number" name="batas-atas"
            value="<?php echo isset($_POST['batas-atas']) ? $_POST['batas-atas'] : ''; ?>" required>
        <br>
        <input type="submit" name="submit" value="Cetak">
    </form>

    <?php
    //comment
    if (isset($_POST['submit'])) {

        $batas_bawah = $_POST['batas-bawah'];
        $batas_atas = $_POST['batas-atas'];
        $i = $batas_bawah;
        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='bintang.png' height='20px' width='20px'>  ";
            } else {
                echo $i . " ";
            }
            $i++;
        } while ($i <= $batas_atas);
    }
    ?>
</body>

</html>
<!---->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>prak1104</title>
</head>

<body>
    <form method="post">
        <?php

        if (isset($_POST['submit']) || isset($_POST['kurang']) || isset($_POST['tambah'])) {
            $jumlahBintang = isset($_POST['jumlah-bintang']) ? (int) $_POST['jumlah-bintang'] : 0;

            if (isset($_POST['tambah'])) {
                $jumlahBintang++;
            } elseif (isset($_POST['kurang'])) {
                $jumlahBintang = max(0, $jumlahBintang - 1);
            }

            echo "<p>Jumlah Bintang: $jumlahBintang</p>";
            echo "<input type='hidden' name='jumlah-bintang' value='$jumlahBintang'>";
        } else {
            echo "<label>Jumlah Bintang</label>";
            echo "<input type='number' name='jumlah-bintang' required>";
            echo "<br><input type='submit' name='submit' value='Submit'>";
        }
        ?>
    </form>

    <?php
    if (isset($jumlahBintang)) {
        echo "<br>";
        for ($i = 1; $i <= $jumlahBintang; $i++) {
            echo "<img src='bintang.png' height='30px' width='30px'> ";
        }

        echo "<br><br>";
        echo "<form method='post' style='display:inline;'>";
        echo "<input type='hidden' name='jumlah-bintang' value='$jumlahBintang'>";
        echo "<input type='submit' name='tambah' value='Tambah'>";
        echo "</form> ";

        echo "<form method='post' style='display:inline;'>";
        echo "<input type='hidden' name='jumlah-bintang' value='$jumlahBintang'>";
        echo "<input type='submit' name='kurang' value='Kurang'>";
        echo "</form>";
    }
    ?>

</body>

</html>
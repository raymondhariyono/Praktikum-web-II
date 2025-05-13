<?php
if (isset($_POST['submit'])) {
    $panjangMatriks = $_POST['row'];
    $lebarMatriks = $_POST['column'];
    $nilaiMatriks = explode(" ", $_POST['nilai']);

    $index = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Matriks</title>
</head>

<body>
    <form method="post">
        <label>Panjang:</label>
        <input type="number" name="row" value="<?php echo isset($_POST['row']) ? $_POST['row'] : ''; ?>" required>
        <br>
        <label>Lebar:</label>
        <input type="number" name="column" value="<?php echo isset($_POST['column']) ? $_POST['column'] : ''; ?>"
            required>
        <br>
        <label>Nilai:</label>
        <input type="text" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>" required>
        <br>
        <input type="submit" name="submit" value="Cetak">
    </form>

    <?php if (isset($_POST['submit'])): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <?php
            $index = 0;
            if (count($nilaiMatriks) <= $panjangMatriks * $lebarMatriks) {
                for ($i = 0; $i < $panjangMatriks; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < $lebarMatriks; $j++) {
                        $nilai = ($index < count($nilaiMatriks)) ? $nilaiMatriks[$index] : "";
                        echo "<td>" . $nilai . "</td>";
                        $index++;
                    }
                    echo "</tr>";
                }
            } elseif (count($nilaiMatriks) != $panjangMatriks * $lebarMatriks) {
                echo "jumlah matriks tidak sesuai";
            }
            ?>
        </table>
    <?php endif; ?>
</body>

</html>
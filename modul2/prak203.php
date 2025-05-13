<?php
if (isset($_POST['submit'])) {
    $nilai = $_POST['nilai'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    if ($from === $to) {
        $result = $nilai;
    } elseif (is_numeric($nilai)) {
        switch ($from) {
            case 'Celcius':
                if ($to === 'Fahrenheit')
                    $result = ($nilai * 9 / 5) + 32;
                elseif ($to === 'Reamur')
                    $result = $nilai * 4 / 5;
                elseif ($to === 'Kelvin')
                    $result = $nilai + 273.15;
                break;
            case 'Fahrenheit':
                if ($to === 'Celcius')
                    $result = ($nilai - 32) * 5 / 9;
                elseif ($to === 'Reamur')
                    $result = ($nilai - 32) * 4 / 9;
                elseif ($to === 'Kelvin')
                    $result = ($nilai - 32) * 5 / 9 + 273.15;
                break;
            case 'Reamur':
                if ($to === 'Celcius')
                    $result = $nilai * 5 / 4;
                elseif ($to === 'Fahrenheit')
                    $result = ($nilai * 9 / 4) + 32;
                elseif ($to === 'Kelvin')
                    $result = ($nilai * 5 / 4) + 273.15;
                break;
            case 'Kelvin':
                if ($to === 'Celcius')
                    $result = $nilai - 273.15;
                elseif ($to === 'Fahrenheit')
                    $result = ($nilai - 273.15) * 9 / 5 + 32;
                elseif ($to === 'Reamur')
                    $result = ($nilai - 273.15) * 4 / 5;
                break;
        }
    } elseif ($from === $to) {
        $result = $nilai;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAK203</title>
</head>

<body>
    <p>Output Yang diinginkan</p>
    <form action="" method="post">
        <label>Nilai</label>
        <input type="text" name="nilai" value=""><br>

        <label>Dari:</label><br>
        <input type="radio" name="from" value="Celcius">Celcius<br>
        <input type="radio" name="from" value="Fahrenheit">Fahrenheit<br>
        <input type="radio" name="from" value="Reamur">Reamur<br>
        <input type="radio" name="from" value="Kelvin">Kelvin<br>

        <label>Ke:</label><br>
        <input type="radio" name="to" value="Celcius">Celcius<br>
        <input type="radio" name="to" value="Fahrenheit">Fahrenheit<br>
        <input type="radio" name="to" value="Reamur">Reamur<br>
        <input type="radio" name="to" value="Kelvin">Kelvin<br><br>

        <button type="submit" name="submit">Konversi</button>
    </form>

    <p>Output</p>
    <p>
        <?php if (isset($result)): ?>
        <h2>Hasil konversi <?= $from ?> ke <? $to ?> adalah: <?= number_format($result, 1) ?></h2>
    <?php endif; ?>


</body>

</html>
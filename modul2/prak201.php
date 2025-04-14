<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Prak101</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>

<body>

    <form action="" method="post">
        Nama 1 :
        <input type="text" name="name1"><br>
        Nama 2 :
        <input type="text" name="name2"><br>
        Nama 3 :
        <input type="text" name="name3"><br>
        <button type="submit" name="Sort">Submit</button>
    </form>

    <?php
    if (isset($_POST["Sort"])) {
        $nama = array(
            $_POST["name1"],
            $_POST["name2"],
            $_POST["name3"]
        );
        sort($nama);
        echo "<h2>Nama yang sudah diurutkan</h2>";
        foreach ($nama as $n) {
            echo htmlspecialchars($n) . "<br>";
        }
    }
    ?>
</body>

</html>
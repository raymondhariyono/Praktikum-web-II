<?php
$errorMessage = [];
$name = $NIM = $gender = "";

if (isset($_POST["submit"])) {
    if (empty($_POST["name"])) {
        $errorMessage['name'] = "Nama tidak boleh kosong";
    } else {
        $name = htmlspecialchars(trim($_POST["name"]));
    }

    if (empty($_POST["NIM"])) {
        $errorMessage['NIM'] = "NIM tidak boleh kosong";
    } else {
        $NIM = htmlspecialchars(trim($_POST["NIM"]));
    }

    if (empty($_POST["gender"])) {
        $errorMessage['gender'] = "Jenis Kelamin tidak boleh kosong";
    } else {
        $gender = $_POST["gender"];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Prak202</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        .error {
            color: red;
        }

        .asterisk {
            color: red;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <form action="" method="post">
            <label>
                Nama: <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="asterisk">*</span>
                <span class="error"><?php echo $errorMessage['name'] ?? ''; ?></span>
            </label>
            <br>

            <label>
                NIM: <input type="text" name="NIM" value="<?php echo $email; ?>">
                <span class="asterisk">*</span>
                <span class="error"><?php echo $errorMessage['NIM'] ?? ''; ?></span>
            </label>
            <br>

            Jenis Kelamin:
            <span class="asterisk">*</span>
            <span class="error"><?php echo $errorMessage['gender'] ?? ''; ?></span>
            <br>
            <input type="radio" name="gender" value="Laki-laki" <?php if ($gender == "Laki-laki")
                echo "checked"; ?>>
            Laki-laki
            <br>
            <input type="radio" name="gender" value="Perempuan" <?php if ($gender == "Perempuan")
                echo "checked"; ?>>
            Perempuan
            <br>

            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
        if (isset($_POST["submit"]) && empty($errorMessage)) {
            echo "<h2>Output</h2>";
            echo "Nama: " . htmlspecialchars($name) . "<br>";
            echo "NIM: " . htmlspecialchars($email) . "<br>";
            echo "Jenis Kelamin: " . htmlspecialchars($gender) . "<br>";
        }
        ?>
</body>

</html>
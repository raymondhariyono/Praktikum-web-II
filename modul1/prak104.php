<?php
$tipehp = [
    "Samsung Galaxy S22",
    "Samsung Galaxy S22+",
    "Samsung Galaxy A03",
    "Samsung Galaxy Xcover 5"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prak104</title>
    <style>
        .table {
            border: 1px solid black;
        }

        .table th,
        .table td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <div>
        <table class="table">
            <tr>
                <th>Daftar Tiper Hp Samsung</th>
            </tr>
            <?php foreach ($tipehp as $hp): ?>
                <tr>
                    <td><?php echo $hp; ?></td>
                </tr>
            <?php endforeach; ?>
            </tablec>
    </div>

</body>

</html>
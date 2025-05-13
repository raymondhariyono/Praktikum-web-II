<?php
$tipehp = [
    "samsung" => [
        "hp1" => "Samsung Galaxy S22",
        "hp2" => "Samsung Galaxy S22+",
        "hp3" => "Samsung Galaxy A03",
        "hp4" => "Samsung Galaxy Xcover 5"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prak105</title>
    <style>
        .table {
            border: 1px solid black;
        }

        .table th,
        .table td {
            border: 1px solid black;
        }

        .table .heading-table {
            background-color: red;
        }
    </style>
</head>

<body>

    <div>
        <table class="table">
            <tr class="heading-table">
                <th>
                    <h1>Daftar Tiper Hp Samsung</h1>
                </th>
            </tr>
            <?php foreach ($tipehp['samsung'] as $hp): ?>
                <tr>
                    <td><?php echo $hp ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

</body>

</html>
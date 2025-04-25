<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai Mahasiswa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }

        thead {
            background-color: rgb(133, 133, 133);
        }
    </style>
</head>

<body>
    <h1>Daftar Nilai Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Nilai Huruf</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataMahasiswa = [
                [
                    "Nama" => "Andi",
                    "NIM" => "2101001",
                    "Nilai UTS" => 87,
                    "Nilai UAS" => 65
                ],
                [
                    "Nama" => "Budi",
                    "NIM" => "2101002",
                    "Nilai UTS" => 76,
                    "Nilai UAS" => 79
                ],
                [
                    "Nama" => "Tono",
                    "NIM" => "2101003",
                    "Nilai UTS" => 50,
                    "Nilai UAS" => 41
                ],
                [
                    "Nama" => "Jessica",
                    "NIM" => "2101004",
                    "Nilai UTS" => 60,
                    "Nilai UAS" => 75
                ]
            ];

            foreach ($dataMahasiswa as &$mahasiswa) {
                $nilai_akhir = 0.4 * $mahasiswa["Nilai UTS"] + 0.6 * $mahasiswa["Nilai UAS"];
                $mahasiswa["nilai_akhir"] = $nilai_akhir;

                if ($nilai_akhir >= 80) {
                    $mahasiswa["nilai_huruf"] = "A";
                } elseif ($nilai_akhir >= 70) {
                    $mahasiswa["nilai_huruf"] = "B";
                } elseif ($nilai_akhir >= 60) {
                    $mahasiswa["nilai_huruf"] = "C";
                } elseif ($nilai_akhir >= 50) {
                    $mahasiswa["nilai_huruf"] = "D";
                } else {
                    $mahasiswa["nilai_huruf"] = "E";
                }
            }
            unset($mahasiswa); // Hapus referensi
            
            foreach ($dataMahasiswa as $mahasiswa) {
                echo "<tr>";
                echo "<td>" . $mahasiswa["Nama"] . "</td>";
                echo "<td>" . $mahasiswa["NIM"] . "</td>";
                echo "<td>" . $mahasiswa["Nilai UTS"] . "</td>";
                echo "<td>" . $mahasiswa["Nilai UAS"] . "</td>";
                echo "<td>" . number_format($mahasiswa["nilai_akhir"], 1) . "</td>";
                echo "<td>" . $mahasiswa["nilai_huruf"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
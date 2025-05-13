<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mata Kuliah Mahasiswa</title>
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

        .revisi {
            background-color: red;
            color: white;
        }

        .tidak-revisi {
            background-color: green;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Daftar Mata Kuliah Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Mata Kuliah Diambil</th>
                <th>SKS</th>
                <th>Total SKS</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Data mahasiswa dengan mata kuliah dan SKS yang diambil
            $dataMahasiswa = [
                "Ridho" => [
                    [
                        "mata_kuliah" => "Pemrograman I",
                        "sks" => 2
                    ],
                    [
                        "mata_kuliah" => "Praktikum Pemrograman I",
                        "sks" => 1
                    ],
                    [
                        "mata_kuliah" => "Pengantar Lingkungan Lahan Basah",
                        "sks" => 2
                    ],
                    [
                        "mata_kuliah" => "Arsitektur Komputer",
                        "sks" => 3
                    ]
                ],
                "Ratna" => [
                    [
                        "mata_kuliah" => "Basis Data I",
                        "sks" => 2
                    ],
                    [
                        "mata_kuliah" => "Praktikum Basis Data I",
                        "sks" => 1
                    ],
                    [
                        "mata_kuliah" => "Kalkulus",
                        "sks" => 3
                    ]
                ],
                "Tono" => [
                    [
                        "mata_kuliah" => "Rekayasa Perangkat Lunak",
                        "sks" => 3
                    ],
                    [
                        "mata_kuliah" => "Analisis dan Perancangan Sistem",
                        "sks" => 3
                    ],
                    [
                        "mata_kuliah" => "Komputasi Awan",
                        "sks" => 3
                    ],
                    [
                        "mata_kuliah" => "Kecerdasan Bisnis",
                        "sks" => 3
                    ]
                ]
            ];

            $no = 1;
            foreach ($dataMahasiswa as $nama => $mataKuliah) {
                $totalSks = 0;

                foreach ($mataKuliah as $kuliah) {
                    $totalSks += $kuliah["sks"];
                }

                $keterangan = ($totalSks < 7) ? "Revisi KRS" : "Tidak Revisi";
                $keteranganClass = ($totalSks < 7) ? "revisi" : "tidak-revisi";

                foreach ($mataKuliah as $kuliah) {
                    echo "<tr>";
                    if ($kuliah === reset($mataKuliah)) {
                        echo "<td rowspan='" . count($mataKuliah) . "'>$no</td>";
                        echo "<td rowspan='" . count($mataKuliah) . "'>$nama</td>";
                    }
                    echo "<td>" . $kuliah["mata_kuliah"] . "</td>";
                    echo "<td>" . $kuliah["sks"] . "</td>";

                    // Menampilkan total SKS dan keterangan hanya sekali untuk setiap mahasiswa
                    if ($kuliah === reset($mataKuliah)) {
                        echo "<td rowspan='" . count($mataKuliah) . "'>$totalSks</td>";
                        echo "<td rowspan='" . count($mataKuliah) . "' class='$keteranganClass'>$keterangan</td>";
                    }

                    echo "</tr>";
                }
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>
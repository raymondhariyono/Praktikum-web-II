<?php
require_once 'koneksi.php';
require_once 'model.php';
$model = new Model($pdo);

if (isset($_GET['id'])) {
    $model->delete('buku', ['id_buku' => $_GET['id']]);
    header("Location: buku.php");
    exit;
}
$buku = $model->read('buku');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-8">
    <button onclick="window.location.href='index.php'" class="bg-blue-500 text-white px-4 py-2 mb-4">Kembali</button>
    <h1 class="text-2xl font-bold mb-4">Data Buku</h1>
    <a href="formBuku.php" class="bg-blue-500 text-white px-4 py-2 mb-4 inline-block">Tambah Buku</a>
    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Penulis</th>
                <th class="border px-4 py-2">Penerbit</th>
                <th class="border px-4 py-2">Tahun</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buku as $b): ?>
                <tr>
                    <td class="border px-4 py-2"><?= $b['id_buku'] ?></td>
                    <td class="border px-4 py-2"><?= $b['judul_buku'] ?></td>
                    <td class="border px-4 py-2"><?= $b['penulis'] ?></td>
                    <td class="border px-4 py-2"><?= $b['penerbit'] ?></td>
                    <td class="border px-4 py-2"><?= $b['tahun_terbit'] ?></td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="formBuku.php?id=<?= $b['id_buku'] ?>" class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                        <a href="buku.php?table=buku&id=<?= $b['id_buku'] ?>" class="bg-red-500 text-white px-2 py-1"
                            onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
<?php
require_once 'koneksi.php';
require_once 'model.php';
$model = new Model($pdo);

if (isset($_GET['table']) && isset($_GET['id'])) {
    $model->delete($_GET['table'], ['id_' . $_GET['table'] => $_GET['id']]);
    header("Location: " . $_GET['table'] . ".php");
    exit;
}
$peminjaman = $model->read('peminjaman');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-8">
    <button onclick="window.location.href='index.php'" class="bg-blue-500 text-white px-4 py-2 mb-4">Kembali</button>
    <h1 class="text-2xl font-bold mb-4">Data Peminjaman</h1>
    <a href="formPeminjaman.php" class="bg-blue-500 text-white px-4 py-2 mb-4 inline-block">Tambah Peminjaman</a>
    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Tanggal Pinjam</th>
                <th class="border px-4 py-2">Tanggal Kembali</th>
                <th class="border px-4 py-2">ID Member</th>
                <th class="border px-4 py-2">ID Buku</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($peminjaman as $p): ?>
                <tr>
                    <td class="border px-4 py-2"><?= $p['id_peminjaman'] ?></td>
                    <td class="border px-4 py-2"><?= $p['tgl_minjam'] ?></td>
                    <td class="border px-4 py-2"><?= $p['tgl_kembali'] ?></td>
                    <td class="border px-4 py-2"><?= $p['id_member'] ?></td>
                    <td class="border px-4 py-2"><?= $p['id_buku'] ?></td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="formPeminjaman.php?id=<?= $p['id_peminjaman'] ?>"
                            class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                        <a href="peminjaman.php?table=peminjaman&id=<?= $p['id_peminjaman'] ?>"
                            class="bg-red-500 text-white px-2 py-1" onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
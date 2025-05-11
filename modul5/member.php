<?php
require_once 'koneksi.php';
require_once 'model.php';
$model = new Model($pdo);

if (isset($_GET['id'])) {
    $model->delete('member', ['id_member' => $_GET['id']]);
    header("Location: member.php");
    exit;
}

$members = $model->read('member');
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-8">
    <button onclick="window.location.href='index.php'" class="bg-blue-500 text-white px-4 py-2 mb-4">Kembali</button>
    <h1 class="text-2xl font-bold mb-4">Data Member</h1>
    <a href="formMember.php" class="bg-blue-500 text-white px-4 py-2 mb-4 inline-block">Tambah Member</a>
    <table class="table-auto w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-5 py-2">ID</th>
                <th class="border px-5 py-2">Nama</th>
                <th class="border px-5 py-2">Nomor</th>
                <th class="border px-5 py-2">Alamat</th>
                <th class="border px-5 py-2">Tgl Daftar</th>
                <th class="border px-5 py-2">Tgl Terakhir Daftar</th>
                <th class="border px-5 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $m): ?>
                <tr>
                    <td class="border px-5 py-2"><?= $m['id_member'] ?></td>
                    <td class="border px-5 py-2"><?= $m['nama_member'] ?></td>
                    <td class="border px-5 py-2"><?= $m['nomor_member'] ?></td>
                    <td class="border px-5 py-2"><?= $m['alamat'] ?></td>
                    <td class="border px-5 py-2"><?= $m['tgl_mendaftar'] ?></td>
                    <td class="border px-5 py-2"><?= $m['tgl_terakhir_mendaftar'] ?></td>
                    <td class="border px-5 py-2 space-x-2">
                        <a href="formMember.php?id=<?= $m['id_member'] ?>"
                            class="bg-yellow-500 text-white px-2 py-1">Edit</a>
                        <a href="member.php?table=member&id=<?= $m['id_member'] ?>" class="bg-red-500 text-white px-2 py-1"
                            onclick="return confirm('Yakin?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
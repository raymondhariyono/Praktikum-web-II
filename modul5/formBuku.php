<?php
require_once 'koneksi.php';
require_once 'model.php';

$model = new Model($pdo);
$buku = [
    'judul_buku' => '',
    'penulis' => '',
    'penerbit' => '',
    'tahun_terbit' => ''
];

$isEdit = isset($_GET['id']);
if ($isEdit) {
    $buku = $model->getById('buku', ['id_buku' => $_GET['id']]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'judul_buku' => $_POST['judul_buku'],
        'penulis' => $_POST['penulis'],
        'penerbit' => $_POST['penerbit'],
        'tahun_terbit' => $_POST['tahun_terbit']
    ];

    if ($isEdit) {
        $model->update('buku', $data, ['id_buku' => $_GET['id']]);
    } else {
        $model->upload('buku', $data);
    }

    header("Location: buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-10">
    <form method="POST" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4"><?= $isEdit ? 'Edit' : 'Tambah' ?> Buku</h1>

        <input name="judul_buku" placeholder="Judul Buku" class="w-full p-2 border" value="<?= $buku['judul_buku'] ?>">

        <input name="penulis" placeholder="Penulis" class="w-full p-2 border" value="<?= $buku['penulis'] ?>">

        <input name="penerbit" placeholder="Penerbit" class="w-full p-2 border" value="<?= $buku['penerbit'] ?>">

        <input name="tahun_terbit" type="number" placeholder="Tahun Terbit" class="w-full p-2 border"
            value="<?= $buku['tahun_terbit'] ?>">

        <button class="bg-blue-500 text-white px-4 py-2"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
        <a href="buku.php" class="ml-2 text-blue-600">Kembali</a>
    </form>
</body>

</html>
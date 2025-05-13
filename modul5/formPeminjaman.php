<?php
require_once 'koneksi.php';
require_once 'model.php';

$model = new Model($pdo);
$members = $model->read('member');
$buku = $model->read('buku');

$peminjaman = [
    'tgl_minjam' => '',
    'tgl_kembali' => '',
    'id_member' => '',
    'id_buku' => ''
];

$isEdit = isset($_GET['id']);
if ($isEdit) {
    $peminjaman = $model->getById('peminjaman', ['id_peminjaman' => $_GET['id']]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'tgl_minjam' => $_POST['tgl_minjam'],
        'tgl_kembali' => $_POST['tgl_kembali'],
        'id_member' => $_POST['id_member'],
        'id_buku' => $_POST['id_buku']
    ];

    if ($isEdit) {
        $model->update('peminjaman', $data, ['id_peminjaman' => $_GET['id']]);
    } else {
        $model->upload('peminjaman', $data);
    }

    header("Location: peminjaman.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Peminjaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-10">
    <form method="POST" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4"><?= $isEdit ? 'Edit' : 'Tambah' ?> Peminjaman</h1>
        <label class="block mb-2 font-bold">Tanggal Pinjam</label>
        <input type="date" name="tgl_minjam" class="w-full p-2 border" value="<?= $peminjaman['tgl_minjam'] ?>">

        <label class="block mb-2 font-bold">Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" class="w-full p-2 border" value="<?= $peminjaman['tgl_kembali'] ?>">

        <select name="id_member" class="w-full p-2 border">
            <option value="">-- Pilih Member --</option>
            <?php foreach ($members as $m): ?>
                <option value="<?= $m['id_member'] ?>" <?= $peminjaman['id_member'] == $m['id_member'] ? 'selected' : '' ?>>
                    <?= $m['nama_member'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="id_buku" class="w-full p-2 border">
            <option value="">-- Pilih Buku --</option>
            <?php foreach ($buku as $b): ?>
                <option value="<?= $b['id_buku'] ?>" <?= $peminjaman['id_buku'] == $b['id_buku'] ? 'selected' : '' ?>>
                    <?= $b['judul_buku'] ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button class="bg-blue-500 text-white px-4 py-2"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
        <a href="peminjaman.php" class="ml-2 text-blue-600">Kembali</a>
    </form>
</body>

</html>
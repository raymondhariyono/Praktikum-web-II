<?php
require_once 'koneksi.php';
require_once 'model.php';

$model = new Model($pdo);
$member = [
    'nama_member' => '',
    'nomor_member' => '',
    'alamat' => '',
    'tgl_mendaftar' => '',
    'tgl_terakhir_mendaftar' => ''
];

$isEdit = isset($_GET['id']);
if ($isEdit) {
    $member = $model->getById('member', ['id_member' => $_GET['id']]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nama_member' => $_POST['nama_member'],
        'nomor_member' => $_POST['nomor_member'],
        'alamat' => $_POST['alamat'],
        'tgl_mendaftar' => $_POST['tgl_mendaftar'],
        'tgl_terakhir_mendaftar' => $_POST['tgl_terakhir_mendaftar']
    ];

    if ($isEdit) {
        $model->update('member', $data, ['id_member' => $_GET['id']]);
    } else {
        $model->upload('member', $data);
    }

    header("Location: member.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Form Member</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-10">
    <form method="POST" class="space-y-4 max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4"><?= $isEdit ? 'Edit' : 'Tambah' ?> Member</h1>
        <input name="nama_member" placeholder="Nama" class="w-full p-2 border" value="<?= $member['nama_member'] ?>">

        <input name="nomor_member" placeholder="Nomor" class="w-full p-2 border" value="<?= $member['nomor_member'] ?>">

        <textarea name="alamat" placeholder="Alamat" class="w-full p-2 border"><?= $member['alamat'] ?></textarea>

        <input type="datetime-local" name="tgl_mendaftar" class="w-full p-2 border"
            value="<?= date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])) ?>">

        <input type="date" name="tgl_terakhir_mendaftar" class="w-full p-2 border"
            value="<?= $member['tgl_terakhir_mendaftar'] ?>">

        <button class="bg-blue-500 text-white px-4 py-2"><?= $isEdit ? 'Update' : 'Simpan' ?></button>
        <a href="member.php" class="ml-2 text-blue-600">Kembali</a>
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #66D2CE;
        }

        .btn-custom {
            background-color: #66D2CE;
            color: white;
        }

        .btn-custom:hover {
            background-color: #2DAA9E;
        }

        .btn-edit {
            background-color: #2DAA9E;
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background-color: #23968C;
        }

        .btn-delete {
            background-color: #E3D2C3;
            color: #000;
            border: none;
        }

        .btn-delete:hover {
            background-color: #cfbda8;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .action-row {
            background-color: #E3D2C3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="mb-4 text-center" style="color:#2DAA9E;">Daftar Buku</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php elseif (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <div class="mb-3 text-end">
            <a href="<?= base_url('buku/create') ?>" class="btn btn-custom">Tambah Buku</a>
            <a href="<?= base_url('/logout') ?>" class="btn btn-outline-secondary ms-2">Logout</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($buku as $b): ?>
                    <tr>
                        <td><?= $b['id'] ?></td>
                        <td><?= $b['judul'] ?></td>
                        <td><?= $b['pengarang'] ?></td>
                        <td><?= $b['penerbit'] ?></td>
                        <td><?= $b['tahun_terbit'] ?></td>
                    </tr>
                    <tr class="action-row">
                        <td colspan="5" class="text-center">
                            <a href="<?= base_url('buku/edit/' . $b['id']) ?>" class="btn btn-edit btn-sm me-2">Edit</a>

                            <form action="<?= base_url('buku/delete/' . $b['id']) ?>" method="post" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-delete btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
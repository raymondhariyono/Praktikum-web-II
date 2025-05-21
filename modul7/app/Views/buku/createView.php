<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #66D2CE;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            margin-top: 60px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-save {
            background-color: #2DAA9E;
            color: white;
            border: none;
        }

        .btn-save:hover {
            background-color: #23968C;
        }

        .btn-back {
            background-color: #E3D2C3;
            color: #000;
            border: none;
        }

        .btn-back:hover {
            background-color: #cfbda8;
        }
    </style>
</head>

<body>

    <div class="container col-md-6">
        <h2 class="text-center mb-4" style="color: #2DAA9E;">Tambah Buku</h2>

        <?php if (isset($validation)): ?>
            <div class="alert alert-warning">
                <strong>Inputan tidak sesuai, coba input kembali!</strong>
            </div>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('buku/store') ?>">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control" value="<?= old('judul') ?>" required>
            </div>

            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" name="pengarang" id="pengarang" class="form-control" value="<?= old('pengarang') ?>"
                    required>
            </div>

            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?= old('penerbit') ?>"
                    required>
            </div>

            <div class="mb-4">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" id="tahun_terbit" class="form-control"
                    value="<?= old('tahun_terbit') ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-save px-4 me-2">Simpan</button>
                <a href="<?= base_url('buku') ?>" class="btn btn-back px-4">Kembali</a>
            </div>
        </form>
    </div>

</body>

</html>
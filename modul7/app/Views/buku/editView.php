<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
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
            background-color: #2DAA9E;
            color: white;
            border: none;
        }

        .btn-back:hover {
            background-color: #23968C;
        }

        .form-label {
            font-weight: 500;
            color: #2DAA9E;
        }

        .text-muted {
            font-size: 0.875rem;
            margin-top: -5px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container col-md-6">
        <h2 class="text-center mb-4" style="color: #2DAA9E;">Edit Buku</h2>

        <?php if (isset($validation)): ?>
            <div class="alert alert-warning">
                <strong>Inputan tidak sesuai, edit buku gagal!</strong>
            </div>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= base_url('buku/update/' . $buku['id']) ?>">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label">Judul Baru</label>
                <input type="text" name="judul" class="form-control" placeholder="Masukkan judul baru">
                <div class="text-muted">Judul sebelumnya: <?= esc($buku['judul']) ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Pengarang Baru</label>
                <input type="text" name="pengarang" class="form-control" placeholder="Masukkan pengarang baru">
                <div class="text-muted">Pengarang sebelumnya: <?= esc($buku['pengarang']) ?></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Penerbit Baru</label>
                <input type="text" name="penerbit" class="form-control" placeholder="Masukkan penerbit baru">
                <div class="text-muted">Penerbit sebelumnya: <?= esc($buku['penerbit']) ?></div>
            </div>

            <div class="mb-4">
                <label class="form-label">Tahun Terbit Baru</label>
                <input type="number" name="tahun_terbit" class="form-control" placeholder="Masukkan tahun terbit baru">
                <div class="text-muted">Tahun sebelumnya: <?= esc($buku['tahun_terbit']) ?></div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-save px-4 me-2">Simpan Perubahan</button>
                <a href="<?= base_url('buku') ?>" class="btn btn-back px-4">Kembali</a>
            </div>
        </form>
    </div>
</body>

</html>
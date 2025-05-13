<!DOCTYPE html>
<html>

<head>
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <body style="background-color:rgb(131, 193, 255);">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Praktikum 6</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= service('uri')->getSegment(1) == '' ? 'active' : '' ?>"
                                href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= service('uri')->getSegment(1) == 'profil' ? 'active' : '' ?>"
                                href="/profil">Profil</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container mt-4">
            <h1>Selamat Datang!</h1>
            <p>Nama: <?= $mahasiswa['nama']; ?></p>
            <p>NIM: <?= $mahasiswa['nim']; ?></p>
        </div>
    </body>

</html>
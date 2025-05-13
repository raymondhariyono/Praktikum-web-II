<!DOCTYPE html>
<html>

<head>
  <title>Profil Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body style="background-color:rgb(131, 193, 255);">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">praktikum 6</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link <?= service('uri')->getSegment(1) == '' ? 'active' : '' ?>" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?= service('uri')->getSegment(1) == 'profil' ? 'active' : '' ?>"
              href="/profil">Profil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="card shadow" style="width: 28rem;">
      <div class="card-body text-center">
        <img src="<?= base_url($profil['gambar']); ?>" alt="Foto Profil" width="150" class="rounded-corner">

        <h4 class="card-title"><?= $profil['nama']; ?></h4>
        <h6 class="text-muted"><?= $profil['nim']; ?></h6>
        <p class="mt-3"><strong>Program Studi:</strong> <?= $profil['prodi']; ?></p>

        <p><strong><i class="fas fa-heart"></i> Hobi:</strong><br>
          <?php
          $hobi = explode(',', $profil['hobi']);
          foreach ($hobi as $h) {
            echo '<span class="badge bg-primary me-1">' . trim($h) . '</span>';
          }
          ?>
        </p>

        <p><strong><i class="fas fa-tools"></i> Skill:</strong><br>
          <?php
          $skill = explode(',', $profil['skill']);
          foreach ($skill as $s) {
            echo '<span class="badge bg-success me-1">' . trim($s) . '</span>';
          }
          ?>
        </p>
      </div>
    </div>
  </div>

</body>

</html>
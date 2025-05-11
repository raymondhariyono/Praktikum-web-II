<?php
require_once 'koneksi.php';
require_once 'model.php';
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Menu Index - Tailwind + Background Gambar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body class="
    min-h-screen
    flex
    items-center
    justify-center
    bg-cover
    bg-center
  " style="
    background-image: url('https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=1280&q=80');
  ">
    <div class="
      bg-white
      bg-opacity-80
      backdrop-blur
      rounded-lg
      shadow-lg
      p-8
      w-full
      max-w-md
      text-center
    ">
        <h1 class="
        text-3xl
        font-bold
        mb-6
      ">
            Menu
        </h1>

        <div class="
        space-y-4
      ">
            <a href="member.php" class="block">
                <button class="
            w-full
            bg-black
            text-white
            font-semibold
            py-2
          ">
                    Member
                </button>
            </a>

            <a href="buku.php" class="block">
                <button class="
            w-full
            bg-black
            text-white
            font-semibold
            py-2
            rounded
            transition
          ">
                    Buku
                </button>
            </a>

            <a href="peminjaman.php" class="block">
                <button class="
            w-full
            bg-black
            text-white
            font-semibold
            py-2
            rounded
            transition
          ">
                    Peminjaman
                </button>
            </a>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
<nav class="navbar">
    <div class="nav-left">
        <h1>Dashboard</h1>
        <button class="menu-toggle" onclick="toggleMenu()">☰
        </button>
    </div>
    <ul id="navLinks">
        <li><a href="index.php">Halaman Utama</a></li>
        <li><a href="daftar.php">Daftar Peserta</a></li>
        <li><a href="pembayaran.php">Pengelolaan Pembayaran</a></li>
        <li><a href="feedback.php">Feedback Acara</a></li>
    </ul>
</nav>

<div id="daftar" class="container">
    <h2>Formulir Pendaftaran</h2>
    <input type="text" id="name" placeholder="Nama Lengkap">
    <input type="email" id="email" placeholder="Email">
    <button onclick="register()">Daftar</button>

<footer>
    <p>
        &copy; 2025. All rights reserved. <br> Created by <span>ahmadauliafahlevi</span>
        <a href="https://www.instagram.com/ahmadauliafahlevi/"><i class="fab fa-instagram" style="color: white;"></i></a>
        <a href="https://www.tiktok.com/@ahmadauliafahlevi_/"><i class="fab fa-tiktok" style="color: white;"></i></a>
        <a href="https://github.com/lepii1/" class="social-icon"><i class="fab fa-github" style="color: white;"></i></a>    </p>
</footer>

</div>
</body>
</html>
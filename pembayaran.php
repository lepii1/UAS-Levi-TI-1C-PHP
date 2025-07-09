<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM pembayaran ORDER BY id DESC");
?>

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

<div id="pembayaran" class="container">
    <h2>Pengelolaan Pembayaran</h2>
    <p>Pembayaran tiket acara dapat dilakukan ke rekening berikut:</p>
    <ul>
        <li>Bank BSI - 123456789 a.n. Ahmad Aulia Fahlevi</li>
    </ul>
    <input type="text" id="buktiNama" placeholder="Nama Pengirim">
    <input type="file" id="buktiFile">
    <button onclick="uploadBukti()">Upload Bukti Pembayaran</button>
    <ul>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <li>
                    <?= htmlspecialchars($row['nama']) ?> -
                    <a href="/uploads"<?= urlencode($row['bukti']) ?>" target="_blank">Lihat Bukti</a>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            <li>Belum ada bukti pembayaran.</li>
        <?php endif; ?>
    </ul>
</div>

<footer>
    <p>
        &copy; 2025. All rights reserved. <br> Created by <span>ahmadauliafahlevi</span>
        <a href="https://www.instagram.com/ahmadauliafahlevi/"><i class="fab fa-instagram" style="color: white;"></i></a>
        <a href="https://www.tiktok.com/@ahmadauliafahlevi_/"><i class="fab fa-tiktok" style="color: white;"></i></a>
        <a href="https://github.com/lepii1/" class="social-icon"><i class="fab fa-github" style="color: white;"></i></a>    </p>
</footer>

</body>
</html>
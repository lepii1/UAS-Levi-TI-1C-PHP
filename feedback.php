<?php
include 'koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM feedback");
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
        <li><a href="peserta.php">Daftar Peserta</a></li>
        <li><a href="pembayaran.php">Pengelolaan Pembayaran</a></li>
        <li><a href="feedback.php">Feedback Acara</a></li>
    </ul>
</nav>

<div id="feedback" class="container">
    <h2>Feedback Acara</h2>
    <textarea id="feedbackInput" placeholder="Tulis feedback Anda di sini"></textarea>
    <button onclick="sendFeedback()">Kirim Feedback</button>
    <ul>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <li><?= htmlspecialchars($row['isi']) ?></li>
            <?php endwhile; ?>
        <?php else: ?>
            <li>Belum ada feedback.</li>
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
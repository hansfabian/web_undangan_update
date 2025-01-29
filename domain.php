<?php
// Assuming the session is started and user data is stored in session
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.html");
    exit();
}

// Fetch user data from session or database
$user_data = $_SESSION['user_data']; // Example, replace with your actual user data fetching mechanism
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invitely | Web Undangan Digital Terpercaya</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="layar-dalam">
            <div class="logo">
                <a href="index.html"><img src="asset/Invintely.png" class="putih" /></a>
                <a href="index.html"><img src="asset/Invintely.png" class="hitam" /></a>
            </div>
            <div class="menu">
                <a href="#" class="tombol-menu">
                    <span class="garis"></span>
                    <span class="garis"></span>
                    <span class="garis"></span>
                </a>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="buatweb.html">Buat Web</a></li>
                    <li><a href="template.html">Tema Undangan</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="login.html">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <br><br><br><br>
        <img src="asset/profile-picture.png" alt="">
        <p><?php echo htmlspecialchars($user_data['name']); ?></p>
        <br>
        <ul>
            <li><a href="#" onclick="showPage('pengaturan-umum')">Pengaturan Umum</a></li>
            <li><a href="#" onclick="showPage('pilih-tema')">Pilih Tema</a></li>
            <li><a href="#" onclick="showPage('mempelai-pria')">Mempelai Pria</a></li>
            <li><a href="#" onclick="showPage('mempelai-wanita')">Mempelai Wanita</a></li>
            <li><a href="#" onclick="showPage('cerita-cinta')">Cerita Cinta</a></li>
            <li><a href="#" onclick="showPage('informasi-acara')">Informasi Acara</a></li>
            <li><a href="#" onclick="showPage('informasi-undangan')">Informasi Undangan</a></li>
            <li><a href="#" onclick="showPage('rsvp-undangan')">RSVP Undangan</a></li>
            <li><a href="#" onclick="showPage('foto-galeri')">Foto Galeri</a></li>
            <li><a href="#" onclick="showPage('background-music')">Background Music</a></li>
            <li><a href="#" onclick="showPage('background-foto')">Background Foto</a></li>
            <li><a href="#" onclick="showPage('video-galeri')">Video Galeri</a></li>
        </ul>
    </div>
    <div class="content">
        <div id="pengaturan-umum" class="hidden">
            <br><br>
            <form action="proses_backend.php" method="post">
                <h2>Pengaturan Domain</h2>
                <label for="nama-domain">Nama Domain:</label>
                <input type="text" id="nama-domain" name="nama-domain" value="<?php echo htmlspecialchars($user_data['domain']); ?>"><br><br>
                
                <label for="judul-website">Judul Website:</label>
                <input type="text" id="judul-website" name="judul-website" value="<?php echo htmlspecialchars($user_data['website_title']); ?>"><br><br>
                
                <label for="deskripsi">Deskripsi:</label>
                <textarea id="deskripsi" name="deskripsi"><?php echo htmlspecialchars($user_data['description']); ?></textarea><br><br>
                
                <label for="kata-kunci">Kata Kunci:</label>
                <textarea id="kata-kunci" name="kata-kunci"><?php echo htmlspecialchars($user_data['keywords']); ?></textarea><br><br>
                
                <button type="submit">SIMPAN PERUBAHAN</button>
            </form>
        </div>
    </div>
</body>
</html>

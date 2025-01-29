<?php
session_start();
include 'config.php'; // Menggunakan file koneksi terpisah

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data user berdasarkan username
    $sql = "SELECT * FROM daftar_user_biasa WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password dengan password_verify()
        if (password_verify($password, $row['password'])) {
            // Login berhasil, buat sesi
            $_SESSION['username'] = $row['username'];

            // Menyimpan data user ke localStorage menggunakan JavaScript
            echo "<script>
                    localStorage.setItem('loggedInUser', '" . $row['username'] . "');
                    window.location.href = 'index.html';
                  </script>";
            exit;
        } else {
            echo "<script>alert('Kata sandi salah.'); window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan.'); window.location.href='login.php';</script>";
    }

    $stmt->close();
}
$conn->close();
?>

<?php
// Konfigurasi koneksi ke database
$servername = "localhost"; // Sesuaikan dengan host MySQL
$username = "root";       // Sesuaikan dengan username MySQL
$password = "";           // Sesuaikan dengan password MySQL
$dbname = "kontak_db";    // Nama database yang sudah dibuat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO kontak (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Menampilkan alert menggunakan JavaScript
        echo "<script>alert('Terima kasih atas saran Anda!');</script>";
        // Redirect kembali ke halaman form (opsional)
        echo "<script>window.location.href='../index.html';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $conn->error . "');</script>";
    }
}

// Menutup koneksi
$conn->close();
?>
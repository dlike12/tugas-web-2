<?php
// Koneksi database
$servername = "127.0.0.1";  // Ganti dengan host Anda jika perlu
$username = "root";         // Ganti dengan username MySQL Anda
$password = "";             // Ganti dengan password MySQL Anda
$dbname = "todo_app";       // Nama database yang sudah dibuat sebelumnya

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// Langkah 2: Koneksi ke database
$conn = new PDO('sqlite:database.db');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Langkah 3: Ambil data dari form
$deskripsi = $_POST['deskripsi'] ?? '';
$waktu = $_POST['waktu'] ?? 0;

// Langkah 4: Masukkan data ke database
$sql = 'INSERT INTO tugas(deskripsi, waktu) VALUES(:deskripsi, :waktu)';
$statement = $conn->prepare($sql);
$statement->execute([
    ':deskripsi' => $deskripsi,
    ':waktu' => $waktu
]);

$tugas_id = $conn->lastInsertId(); // bisa digunakan jika ingin ditampilkan

// Langkah 5: Redirect
header('Location: index.php');
exit;

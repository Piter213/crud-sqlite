<?php
// koneksi ke database, pastikan $conn sudah tersedia
$id = $_GET['id'] ?? null;  // ambil id dari query parameter

if ($id) {
    $sql = 'DELETE FROM tugas WHERE id = :id';

    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    if ($statement->execute()) {
        echo "Tugas dengan id $id berhasil dihapus!";
        // biasanya setelah hapus redirect ke halaman list tugas
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal menghapus tugas.";
    }
} else {
    echo "ID tugas tidak ditemukan.";
}
?>

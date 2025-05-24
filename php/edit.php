<?php
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}

// ambil data tugas dari DB
$sql = 'SELECT * FROM tugas WHERE id = :id';
$statement = $conn->prepare($sql);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
$tugas = $statement->fetch(PDO::FETCH_ASSOC);

if (!$tugas) {
    echo "Tugas tidak ditemukan.";
    exit;
}
?>

<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= $tugas['id'] ?>">
    <label>Deskripsi Tugas:</label><br>
    <input type="text" name="deskripsi" value="<?= htmlspecialchars($tugas['deskripsi']) ?>" required><br>
    <label>Lama Waktu (menit):</label><br>
    <input type="number" name="waktu" value="<?= $tugas['waktu'] ?>" required><br>
    <button type="submit">Update</button>
</form>

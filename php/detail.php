<?php
$conn = new PDO('sqlite:database.db');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? 0;

$sql = 'SELECT id, deskripsi, waktu FROM tugas WHERE id = :tugas_id';
$statement = $conn->prepare($sql);
$statement->bindParam(':tugas_id', $id, PDO::PARAM_INT);
$statement->execute();
$tugas = $statement->fetch(PDO::FETCH_ASSOC);
?>

<?php if ($tugas): ?>
    <h2><?= htmlspecialchars($tugas['deskripsi']) ?></h2>
    <p>Durasi: <?= $tugas['waktu'] ?> menit</p>
<?php else: ?>
    <p>Tugas tidak ditemukan.</p>
<?php endif; ?>

<?php
$conn = new PDO('sqlite:database.db');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT id, deskripsi, waktu FROM tugas';
$statement = $conn->query($sql);
$tugas = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<ul>
<?php foreach ($tugas as $t): ?>
    <li>
        <a href="detail.php?id=<?= $t['id'] ?>">
            <?= htmlspecialchars($t['deskripsi']) ?> (<?= $t['waktu'] ?> menit)
        </a>
    </li>
<?php endforeach; ?>
</ul>

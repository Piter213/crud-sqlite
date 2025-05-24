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

        <!-- Link Edit -->
        <a href="edit.php?id=<?= $t['id'] ?>" style="margin-left: 10px;">[Edit]</a>

        <!-- Link Hapus dengan konfirmasi -->
        <a href="delete.php?id=<?= $t['id'] ?>" 
           onclick="return confirm('Yakin ingin menghapus tugas ini?')" 
           style="color: red; margin-left: 10px;">
           [Hapus]
        </a>
    </li>
<?php endforeach; ?>
</ul>

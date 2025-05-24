<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $deskripsi = $_POST['deskripsi'];
    $waktu = $_POST['waktu'];

    $sql = 'UPDATE tugas SET deskripsi = :deskripsi, waktu = :waktu WHERE id = :id';

    $statement = $conn->prepare($sql);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':deskripsi', $deskripsi);
    $statement->bindParam(':waktu', $waktu, PDO::PARAM_INT);

    if ($statement->execute()) {
        // redirect ke halaman list tugas
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal mengubah tugas.";
    }
}
?>

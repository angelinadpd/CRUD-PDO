<?php

    require_once "koneksi.php";

    $sql = "SELECT * FROM  buku";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $buku = $stmt->fetchAll(PDO::FETCH_BOTH);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <a href="create.php" >Tambah</a>
    <table border="1">
        <tr>
            <th>Kode</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Hapus</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($buku as $buku)  : ?>
        <tr>
            <td><?= $buku['kode'] ?></td>
            <td><?= $buku['judul'] ?></td>
            <td><?= $buku['pengarang'] ?></td>
            <td><?= $buku['penerbit'] ?></td>
            <td><?= $buku['tahunterbit'] ?></td>
            <td>
                <a href="delete.php?kode=<?= $buku['kode']?>" title="">Hapus</a>
            </td>
            <td>
                <a href="edit.php?kode=<?= $buku['kode']?>" title="">Edit</a>
            </td>
        </tr>
        <?php endforeach ;?>
    </table>
</body>
</html>

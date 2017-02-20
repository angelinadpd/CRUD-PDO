<?php

    require_once "database/Connection.php";
    require_once "database/QueryBuilder.php";
    require_once "database/UserQuery.php";
    require_once "config/database.php";

    $connection = Connection::make($config);
    $db = new QueryBuilder($connection);
    $perpustakaan = $db->select('buku');
   
 ?>

 <!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <h2>Data Buku</h2>
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
        <?php foreach ($perpustakaan as $b)  : ?>
        <tr>
            <td><?= $b ->kode; ?></td>
            <td><?= $b ->judul; ?></td>
            <td><?= $b ->pengarang; ?></td>
            <td><?= $b ->penerbit; ?></td>
            <td><?= $b ->tahunterbit; ?></td>
            <td>
                <a href="delete.php?kode=<?= $b->kode; ?>" title="">Hapus</a>
            </td>
            <td>
                <a href="edit.php?kode=<?= $b->kode; ?>" title="">Edit</a>
            </td>
        </tr>
        <?php endforeach ;?>
    </table>
        </br><a href="logout.php?logout">Logout</a>
        </form>
</body>
</html>

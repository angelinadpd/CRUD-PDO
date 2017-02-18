<?php
    require_once "database/Connection.php";
    require_once "database/QueryBuilder.php";
    require_once "config/database.php";

    if(isset($_POST['submit'])){
        try {
            $connection = Connection::make($config);
            $db = new QueryBuilder($connection);
            $db->insert('buku', [
                'judul' => $_POST['judul'],
                'Pengarang' => $_POST['pengarang'],
                'penerbit' => $_POST['penerbit'],
                'tahunterbit' => $_POST['tahunterbit']
            ]);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Input Data Buku</title>
    <link rel="stylesheet" href="">
</head>
<body>
<h2>Input Data Buku</h2>
    <form action="create.php" method="post" accept-charset="utf-8">
        <p>Judul
          <input type="text" name="judul" value="" placeholder="" >
        </p>
        <p>Pengarang
          <input type="text" name="pengarang" value="" placeholder="" >
        </p>
        <p>Penerbit
          <input type="text" name="penerbit" value="" placeholder="" >
        </p>
        <p>Tahun terbit
          <input type="tahunterbit" name="tahunterbit" value="" placeholder="" >
        </p>
        <input type="submit" name="submit" value="submit"/>
        <input type="reset" name="reset" value="reset"/>
        <br>
        <br>
    </form>
</body>
</html>

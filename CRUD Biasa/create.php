<?php
    require_once "koneksi.php";

    if(isset($_POST['submit'])){
        try {

            $params  = [
                ':kode'   => $_POST['kode'],
                ':judul'   => $_POST['judul'],
                ':pengarang' => $_POST['pengarang'],
                ':penerbit'   => $_POST['penerbit'],
                ':tahunterbit'    => $_POST['tahunterbit'],
            ];

            $sql = "INSERT INTO buku (kode,judul,pengarang,penerbit,tahunterbit) VALUES  (:kode,:judul,:pengarang,:penerbit,:tahunterbit)";
            $stmt= $pdo->prepare($sql);
            $stmt->execute($params);

            header("location: index.php");
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
    <form action="create.php" method="post" accept-charset="utf-8">
        <p>Kode
          <input type="text" name="kode" value="" placeholder="" >
        </p>
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
        <input type="submit" name="submit" value="submit">
        <input type="reset" name="reset" value="reset"/>
        <br>
        <br>
    </form>
</body>
</html>

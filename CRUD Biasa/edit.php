<?php
    require_once "koneksi.php";

    if(isset($_GET["kode"])){
        $kode = $_GET['kode'];

        $sql = "SELECT * FROM buku WHERE kode =:kode";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':kode'=>$kode]);
        $buku = $stmt->fetch();

    }

    if(isset($_POST['submit'])){

        $buku_kode = $_POST['kode'];
        $sql = "SELECT * FROM buku WHERE kode =:kode";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':kode'=>$kode]);
        $buku = $stmt->fetch();


        $judul = is_null($_POST['judul']) ? $_POST['judul'] : $buku['judul'];

        try {

            $params =[
                'judul'       => $_POST['judul'],
                'pengarang'     => $_POST['pengarang'],
                'penerbit'        => $_POST['penerbit'],
                'tahunterbit'        => $_POST['tahunterbit'],
                'kode'    => $_POST['kode'],
            ];

            $sql = "UPDATE buku SET judul=:judul,pengarang=:pengarang,penerbit=:penerbit,tahunterbit=:tahunterbit WHERE kode=:kode ";

            $statement = $pdo->prepare($sql);
            $statement->execute($params);

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
    <title></title>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="edit.php" method="post" accept-charset="utf-8">
        <input type="hkodeden" name="kode" value="<?= $buku['kode']?>">
        <p>Judul
          <input type="text" name="judul" value="<?= $buku['judul']?>" placeholder="" >
        </p>
        <p>Pengarang
          <input type="text" name="pengarang" value="<?= $buku['pengarang']?>" placeholder="" >
        </p>
        <p>Penerbit
          <input type="text" name="penerbit" value="<?= $buku['penerbit']?>" placeholder="">
        </p>
        <p>Tahun Terbit
          <input type="text" name="tahunterbit" value="<?= $buku['tahunterbit']?>" placeholder="">
        </p>
        <input type="submit" name="submit" value="submit">
        <input type="reset" name="reset" value="reset"/>
        <br>
        <br>
    </form>
</body>
</html>

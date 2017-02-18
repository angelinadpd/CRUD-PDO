<?php
    require_once "database/Connection.php";
    require_once "database/QueryBuilder.php";
    require_once "config/database.php";

    $connection = Connection::make($config);
    $db = new QueryBuilder($connection);
    $perpustakaan = $db->find('buku',$_GET['kode']);
    
    if(isset($_POST['submit'])){
        $kode = $_GET['kode'];
        
        try {
            $db->update('buku', [
                'judul' => $_POST['judul'],
                'pengarang' => $_POST['pengarang'],
                'penerbit' => $_POST['penerbit'],
                'tahunterbit' => $_POST['tahunterbit']
            ],$kode);
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
</head>
<body>
    <form action="edit.php?kode=<?=$perpustakaan[0]->kode; ?>" method="post" accept-charset="utf-8">
        <p>Judul
        <input type="text" name="judul" value="<?=$perpustakaan[0]->judul ?>" placeholder="" ></p>
        <p>Pengarang
        <input type="text" name="pengarang" value="<?=$perpustakaan[0]->pengarang ?>" placeholder="" ></p>
        <p>Penerbit
        <input type="text" name="penerbit" value="<?=$perpustakaan[0]->penerbit?>" placeholder="" ></p>
        <p>Tahun terbit
        <input type="text" name="tahunterbit" value="<?=$perpustakaan[0]->tahunterbit ?>" placeholder="" ></p>
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
        <input type="reset" name="reset" value="reset"/>
    </form>
</body>
</html>
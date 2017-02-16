<?php
    require_once "koneksi.php";



    if(isset($_GET["kode"])){

        $buku_kode = $_GET['kode'];

        $sql = "DELETE FROM buku WHERE kode=:kode";
        $stmt =$pdo->prepare($sql);
        $stmt->execute([':kode'=>$buku_kode]);

        header("location: index.php");
    }

?>

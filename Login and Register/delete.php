<?php

	require_once "database/Connection.php";
	require_once "database/QueryBuilder.php";
	require_once "config/database.php";

	try{
			$connection = Connection::make($config);
			$db = new QueryBuilder($connection);
			$db->delete('buku',$_GET['kode']);
	 	}
		catch(PDOException $e){
		    echo $e->getMessage();
	    }
?>


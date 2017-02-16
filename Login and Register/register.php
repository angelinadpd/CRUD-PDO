<?php
    session_start();
    
    require_once "database/Connection.php";
    require_once "database/UserQuery.php";
    require_once "config/database.php";

    if(isset($_POST['submit'])){
        try {
            $connection = Connection::make($config);
            $db = new UserQuery($connection);
            $db->register([
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'nama' => $_POST['nama'],
                'email' => $_POST['email'],
            ]);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if (isset($_SESSION['user'])) {
        header("location: index.php");
    }else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
</head>
<body>
    <form action="register.php" method="post" accept-charset="utf-8">
        <p>Username
        <input type="text" name="username" value="" placeholder="username" required></p>
        <p>Password
        <input type="password" name="password" placeholder="password" required></p>
        <p>Nama
        <input type="nama" name="nama" placeholder="nama" required=""></p>
        <p>Email
        <input type="text" name="email" placeholder="example@email.com" required></p>
        
        <input type="submit" name="submit" value="submit">
        <input type="reset" name="reset" value="reset">
    </form>
    <a href="login.php">kembali ke halaman login</a>
</body>
</html>

<?php } ?>
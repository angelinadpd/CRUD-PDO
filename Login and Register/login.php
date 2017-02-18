<?php
    
    require_once "database/Connection.php";
    require_once "config/database.php";
    require_once "database/UserQuery.php";

    if(isset($_POST['submit'])){
        try {
            $connection = Connection::make($config);
            $db = new UserQuery($connection);
            $db->login($_POST['username'], $_POST['password']);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    if (isset($_SESSION['username'])) {
        header("location: index.php");
    }else{

    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
</head>
<body>
    <h2>Login</h2>
    <form class="login-form" action="" method="post">
    <?php if (isset($error)): ?>
        <div class="error">
            <?php echo $error ?>
        </div>
    <?php endif; ?>
    <span>Username : </span><input type="text" name="username" placeholder="username" required/></br></br>
    <span>Password : </span><input type="password" name="password" placeholder="password" required/></br></br>
    <button type="submit" name="submit">Login</button></br>
    </form>
    <a href="register.php">Daftar sekarang</a>
</body>
</html>
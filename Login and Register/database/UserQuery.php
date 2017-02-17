<?php
class UserQuery{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function login($user,$password)
    {
        $statement = $this->pdo->prepare("select * from user where username='{$user}'");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_CLASS);
        if (!empty($data[0]->username)) {
            if (password_verify($_POST['password'], $data[0]->password)) {
                session_start();
                $_SESSION['login'] = $data[0]->username;
                echo "<script> alert('Login sukses!');      
                        window.location.href='index.php';
                </script>";
            }else{
                echo "<script> alert('Username atau password salah!');      
                        window.location.href='login.php';
                </script>";
            }
        }else{
            header("location: index.php");
        }
    }
    public function logout($parameters)
    {
        session_unset($parameters);
    }
    public function getName($parameters)
    {
        $statement = $this->pdo->prepare("select * from user where username='{$parameters}'");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_CLASS);
        return $data[0]->username;
    }
    public function register($parameters)
    {
        $user = $parameters['username'];
        $statement = $this->pdo->prepare("select * from user where username='{$user}'");
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_CLASS);
        if (!empty($data)) {
            echo "<script> alert('Username telah terdaftar!');      
                    window.location.href='register.php';
            </script>";
        }else{
            $sql = sprintf(
                'insert into user (%s) values (%s)',
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
            );
            try {
                $statement = $this->pdo->prepare($sql);
                $statement->execute($parameters);
                
                header("location: login.php");
            } catch (\Exception $e) {
                return false;
            }
        }
    }
}
?>
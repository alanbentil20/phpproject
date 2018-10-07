<?php
    session_start();

    if(!empty($_SESSION['username'])){
        header('location: base.php');
    }
    require 'data.php';
    $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);

    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if(empty($user) || empty($pass)){
            $message = '<div class="alert alert-danger center" role="alert">All fields are required!</div>';
        }else{
            $query = $conn->prepare("SELECT usrname, password FROM tbl_studentlogin WHERE usrname=? AND password=? ");
            $query->execute(array($user,$pass));
            $row = $query->fetch(PDO::FETCH_BOTH);

            if($query->rowCount() > 0){
                $_SESSION['username'] = $user;
                header('location: base.php');
            }else{
                $message = '<div class="alert alert-danger" role="alert">Incorrect username/password! Please check and try again.</div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="background">
        <div class="col-lg-3 left"></div>
        <section class="col-lg-6 left login">
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
            <div class="display-4 red center">Login</div><br/>
            <div class="col-lg-12">
                <form action="#" method="post">
                    <label for="username" class="red"><b>Username:&nbsp;</b></label>
                    <input placeholder="Username" type="text"  name="username" class="form-control"><br/>
                    <label for="password" class="red"><b>Password:&nbsp;&nbsp;</b></label>
                    <input placeholder="Password" type="password" name="password" class="form-control"><br/>
                    <input type="submit" name="login" value="Login" class="btn btn-secondary right">
                </form>
            <p>Don't have an account? <br/><a href="signup.php" class="logout">SignUp Here.</a></p>
            </div>
        </section>
        <div class="col-lg-3 right"></div>
    </body>
</html>

<?php
    try{
        require 'data.php';
        $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $usrname = $name = $password = $email = '';
        $usrequired = $namerequired = $passrequired = $erequired = '';

        if(empty($_POST["usrname"])){
            $usrequired = "This field is required";
        }else{
            $usrname = test_input($_POST["usrname"]);
        }

        if(empty($_POST["name"])){
            $namerequired = "This field is required";
        }else{
            $name = test_input($_POST["name"]);
        }

        if(empty($_POST["password"])){
            $passrequired = "This field is required";
        }else{
            $password = test_input($_POST["password"]);
        }

        if(empty($_POST["email"])){
            $erequired = "";
        }else{
            $email = test_input($_POST["email"]);
        }

        if(isset($_POST['submit'])){
            if(empty($usrname) || empty($password) || empty($name)){
                $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
            }else{
                $sql = "INSERT INTO tbl_studentlogin (usrname, name, password, email) VALUES ('$usrname', '$name', '$password', '$email')";
                $conn->exec($sql);
                $reply = '<div class="alert alert-success" role="alert">ACCOUNT SUCCESSFULLY CREATED!</div>';
            }
        }
    }catch(PDOException $e){
        echo $e->getMessage();
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
        <section class="col-lg-3"></section>
        <section class="col-lg-3 right"></section>
        <section class="col-lg-6 right">
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>
            <div class="display-4 center red">SignUp</div><br/><br/>
            <h5 class="center">Fill The Form Below To Create An Admin Account.</h5><br/>
            <div class="col-lg-12">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <label for="usrname" class="red"><b>Username:&nbsp;</b></label>
                    <input value="Username" type="text"  name="usrname" class="form-control"><br/>
                    <label for="password" class="red"><b>Password:&nbsp;&nbsp;</b></label>
                    <input value="Password" type="password" name="password" class="form-control"><br/>
                    <label for="email" class="red"><b>Email:&nbsp;&nbsp;</b></label>
                    <input value="example@hostname.com" type="email" name="email" class="form-control"><br/>
                    <input type="submit" name="submit" value="SignUp" class="btn btn-secondary right">
                </form>
            <p>Already have an account?<a href="home.php" class="logout">Login Here.</a></p>
            </div>
        </section>
    </body>
</html>

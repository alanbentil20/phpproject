<?php
    require 'data.php';

    if(isset($_GET["id"])){
        try{
            $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $id = $_GET["id"];
            
            $sql = "DELETE FROM tbl_studentinfo WHERE id=:id";
            
            $code = $conn->prepare($sql);
            $code->bindValue(':id', $id);
            $code->execute();
            
            header('location: deleteStudent.php');
            
        }catch(PDOException $e){
            echo $e->getMessage;
        }
    }else{
        echo "<script type='text/javascript'>alert('SOMETHING WENT WRONG. PLEASE TRY AGAIN LATER<br/>PLEASE CONTACT ADMIN IF PROBLEM PERSISTS!')</script>";
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>        
        <div class="container">
            <div class='display-4'>RECORD DELETED SUCCESSFULLY!</div>
            <a href="viewStudent.php">Go Back</a>
        </div>
        <?php include 'sidebar.php'; ?>
    </body>
</html>
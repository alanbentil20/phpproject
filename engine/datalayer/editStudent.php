<?php
    session_start();
    if(isset($_GET['search'])){
        try{
            require 'data.php';
            $conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * from tbl_studentinfo WHERE id=:id";
            
            $id = $_GET['id'];

            $statement = $conn->prepare($sql);
            $statement->bindParam(':location', $id, PDO::PARAM_STR);
            $statement->execute();

            $result = $statement->fetchAll();
            $none = '';
            
            foreach($result as $value){
                if($id == $value){
                    $none;
                }else{
                    $none = 'true';
                    $notfound = '<div class="alert alert-danger center" role="alert">ID CANNOT BE FOUND!</div>';
                }
            }
            
            $reply = '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
        }catch(PDOException $e){
            echo $e->getMessage();
        }
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
        <div class="col-lg-9 right">
            <?php if(!isset($_GET['id'])){ ?>            
                <div class="center display-4">Enter ID</div><br/>
                <form action="#" method="get" class="col-lg-3">
                    <label for="search"><b>ID:&nbsp;</b></label>
                    <input placeholder="Search" name="id" type="text" class="form-control"><br/>
                    <input type="submit" name="search" value="Search" class="btn btn-primary right">
                </form>
            <?php }elseif(!empty($none)){ echo $notfound; } else{ include'edit.php'; } ?>
                
        </div>
        <?php include 'sidebar.php'; ?>
    </body>
</html>
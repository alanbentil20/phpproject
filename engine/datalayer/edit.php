<?php
    if(isset($_SESSION['username'])){
        $id = $surname = $firstname = $othername = $gender = $phonenum = $dob = $email = $campus = $pic = $programme = $residency = $entrydate = $exitdate = $height = $weight = '';

        $idrequired = $snrequired = $fnrequired = $onrequired = $grequired = $pnrequired = $dobrequired = $erequired = $crequired = $prequired = $prrequired = $rrequired = $endrequired = $exdrequired = $hrequired = $wrequired = '';

        try{
            if(empty($_POST["id"])){
                $idrequired = "This field is required";
            }else{
                $id = test_input($_POST["id"]);
            }

            if(empty($_POST["surname"])){
                $snrequired = "This field is required";
            }else{
                $surname = test_input($_POST["surname"]);
            }

            if(empty($_POST["firstname"])){
                $fnrequired = "This field is required";
            }else{
                $firstname = test_input($_POST["firstname"]);
            }

            if(empty($_POST["othername"])){
                $onrequired = "";
                $othername = "";
            }else{
                $othername = test_input($_POST["othername"]);
            }

            if(empty($_POST["gender"])){
                $grequired = "This field is required";
                $gender = "Male/Female";
            }else{
                $gender = test_input($_POST["gender"]);
            }

            if(empty($_POST["phonenum"])){
                $pnrequired = "This field is required";
            }else{
                $phonenum = test_input($_POST["phonenum"]);
            }

            if(empty($_POST["dob"])){
                $dobrequired = "This field is required";
            }else{
                $dob = test_input($_POST["dob"]);
            }

            if(empty($_POST["email"])){
                $erequired = "This field is required";
            }else{
                $email = test_input($_POST["email"]);
            }

            if(empty($_POST["campus"])){
                $crequired = "";
                $campus = "Main/City";
            }else{
                $campus = test_input($_POST["campus"]);
            }

            if(empty($_POST["pic"])){
                $prequired = "";
                $pic = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwrOhKZY0SY9O9Mg2bffwJB4C6I9ECfT5w1oDxThLDcUDmgUJ7jw";
            }else{
                $pic = test_input($_POST["pic"]);
            }

            if(empty($_POST["programme"])){
                $prrequired = "This field is required";
            }else{
                $programme = test_input($_POST["programme"]);
            }

            if(empty($_POST["residency"])){
                $rrequired = "This field is required";
            }else{
                $residency = test_input($_POST["residency"]);
            }

            if(empty($_POST["entrydate"])){
                $endrequired = "This field is required";
            }else{
                $entrydate = test_input($_POST["entrydate"]);
            }

            if(empty($_POST["exitdate"])){
                $exdrequired = "This field is required";
            }else{
                $exitdate = test_input($_POST["exitdate"]);
            }

            if(empty($_POST["height"])){
                $hrequired = "";
                $height = "";
            }else{
                $height = test_input($_POST["height"]);
            }

            if(empty($_POST["weight"])){
                $wrequired = "";
                $weight = "";
            }else{
                $weight = test_input($_POST["weight"]);
            }
            
            $search_id = escape($_GET['id']);

            $sql = "SELECT * FROM tbl_studentinfo WHERE id = :search_id";
            
            $statement = $conn->prepare($sql);
            $statement->bindParam(':search_id', $search_id, PDO::PARAM_STR);
            $statement->execute();

            $results = $statement->fetchAll();
            

            if(isset($_POST['submit'])){
                if($idrequired || $snrequired || $fnrequired || $grequired || $pnrequired || $dobrequired || $erequired || $prrequired || $rrequired || $endrequired || $exdrequired){
                    $reply = '<div class="alert alert-danger center" role="alert">FILL ALL THE REQUIRED FIELDS!</div>';
                }else{
                    $sql = "INSERT INTO tbl_studentinfo(id, surname, firstname, othername, gender, phonenum, dob, email, campus, pic, programme, residency, entrydate, exitdate, height, weight) VALUES ('$id', '$surname', '$firstname', '$othername', '$gender', '$phonenum', '$dob', '$email', '$campus', '$pic', '$programme', '$residency', '$entrydate', '$exitdate', '$height', '$weight')";
                    $conn->exec($sql);
                    echo '<div class="alert alert-success" role="alert">NEW STUDENT SUCCESSFULLY ADDED!</div>';
                }
            }            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        header('location: home.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Student</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>        
        <div class="col-lg-12 right">
            <?php foreach($results as $result){ if($results && $statement->rowCount()>0){ ?>
            <h3 class="center">Edit Student Data.</h3>
            <?php
                if(isset($reply)){
                    echo $reply;
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label for="id"><b>ID:&nbsp;</b><span class="red">*<?php echo $idrequired;?></span></label>
                        <input value="<?php echo escape($result["id"]); ?>" type="text" name="id" class="col-lg-3 form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="surname"><b>Surname:&nbsp;</b><span class="red">*<?php echo $snrequired;?></span></label>
                        <input value="<?php echo escape($result["surname"]); ?>" type="text" name="surname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="firstname"><b>Firstname:&nbsp;</b><span class="red">*<?php echo $fnrequired;?></span></label>
                        <input value="<?php echo escape($result["firstname"]); ?>" type="text" name="firstname" class="form-control">
                    </div>
                    <div class="col">
                        <label for="othernames"><b>Othernames:&nbsp;</b><span class="red"><?php echo $onrequired;?></span></label>
                        <input value="<?php echo escape($result["othername"]); ?>" type="text" name="othername" class="form-control">
                    </div>
                </div><br/>                
                
                <div class="form-row">
                    <div class="col">
                        <label for="gender"><b>Gender:&nbsp;</b><span class="red">*<?php echo $grequired;?></span></label>
                        <input value="<?php echo escape($result["gender"]); ?>" type="text" name="gender" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="phonenum"><b>Phone Number:&nbsp;</b><span class="red">*<?php echo $pnrequired;?></span></label>
                        <input value="<?php echo escape($result["phonenum"]); ?>" type="text"  name="phonenum" class="form-control">
                    </div>
                        
                    <div class="col">
                        <label for="dob"><b>Date of Birth:&nbsp;</b><span class="red">*<?php echo $dobrequired;?></span></label>
                        <input value="<?php echo escape($result["dob"]); ?>" type="text" name="dob" class="form-control">
                    </div>
                </div><br/>
                
                <div class="form-row">
                    <div class="col">
                        <label for="email"><b>Email:&nbsp;</b><span class="red">*<?php echo $erequired;?></span></label>
                        <input value="<?php echo escape($result["email"]); ?>" type="email" name="email" class="form-control">
                    </div>
                    
                    <div class="col">
                        <label for="campus"><b>Campus:&nbsp;</b><span class="red"><?php echo $crequired;?></span></label>
                        <input value="<?php echo escape($result["campus"]); ?>" type="text" name="campus" class="form-control">
                    </div>
                    
                    <div class="col custom-file">
                        <label for="pic"><b>Profile Picture:&nbsp;</b><span class="red"><?php echo $prequired;?></span></label>
                        <input src="<?php echo escape($result["pic"]); ?>" type="file" name="pic" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="programme"><b>Programme:&nbsp;</b><span class="red">*<?php echo $prrequired;?></span></label>
                        <input value="<?php echo escape($result["programme"]); ?>" type="text" name="programme" class="form-control">
                    </div>

                    <div class="col">
                        <label for="residency"><b>Residency:&nbsp;</b><span class="red">*<?php echo $rrequired;?></span></label>
                        <input value="<?php echo escape($result["residency"]); ?>" type="text" name="residency" class="form-control">
                    </div>

                    <div class="col">
                        <label for="entrydate"><b>Date of Entry:&nbsp;</b><span class="red">*<?php echo $endrequired;?></span></label>
                        <input value="<?php echo escape($result["entrydate"]); ?>" type="text" name="entrydate" class="form-control">
                    </div>
                </div><br/>

                <div class="form-row">
                    <div class="col">
                        <label for="exitdate"><b>Date of Exit:&nbsp;</b><span class="red">*<?php echo $exdrequired;?></span></label>
                        <input value="<?php echo escape($result["exitdate"]); ?>" type="text" name="exitdate" class="form-control">
                    </div>

                    <div class="col">
                        <label for="height"><b>Height:&nbsp;</b><span class="red"><?php echo $hrequired;?></span></label>
                        <input value="<?php echo escape($result["height"]); ?>" type="text" name="height" class="form-control">
                    </div>

                    <div class="col">
                        <label for="weight"><b>Weight:&nbsp;</b><span class="red"><?php echo $wrequired;?></span></label>
                        <input value="<?php echo escape($result["weight"]); ?>" type="text" name="weight" class="form-control">
                    </div>
                </div><br/>

                <input type="submit" name="submit" value="Update Database" class="btn btn-primary right">
            </form>
            <?php } } ?>
        </div>
    </body>
</html>
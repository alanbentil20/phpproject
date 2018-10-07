<!DOCTYPE html>
<html>
    <head>
        <title>Welcome</title>
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="col-lg-3 sidebar">
            <?php
                if(isset($_SESSION['username'])){
                    echo "<div class='wl'>Welcome, <b>".$_SESSION['username']."</b>.</div>";
                }else{
                    header('location: home.php');
                }
            ?>
            <div>&nbsp;<a href="logout.php">Logout</a></div>
            <br/><br/>
            <ul>
                <li>
                    <div class="display-4">Dashboard</div>
                </li>
                <li>
                    <a href="addStudent.php">Add Student</a>
                </li>
                <li>
                    <a href="editStudent.php">Edit Student</a>
                </li>
                <li>
                    <a href="deleteStudent.php">Delete Student</a>
                </li>
                <li>
                    <a href="viewStudent.php">View Student</a>
                </li>
            </ul>
        </div>
        <script type="text/javascript">
            function datetime(){
                var d = new Date();
                var year = d.getFullYear();
                var month = d.getMonth();
                var day = d.getDate();
                var hours = d.getHours();
                var min = d.getMinutes();
                var sec = d.getSeconds();

                var ans = year + "-" + month + "-" + day + "  " + hours + ":" + min + ":" + sec
            }
            ans.setInterval(datetime, 1000);
        </script>
    </body>
</html>

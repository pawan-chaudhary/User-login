<?php
ob_start();
require('connect.php');
$sname = $_GET['name'];
$sql = "select * from student where studentName ='$sname';";
$result = mysqli_query($connectivity, $sql);
$row=mysqli_fetch_assoc($result);
if(isset($_POST['change'])){
    header("location:changePassword.php?studentname=".$sname);
}
elseif(isset($_POST['logout'])){
    header("location:studentMenu.php");
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        h1{
            text-align: center;
        }
        .info{
            position: relative;
            left: 400px;
            height: 700px;
            color: #663300;
            background: #0005;
            width: 500px;
        }
        .info img {
            position: relative;
            top: 20px;
            left: 155px;
            width: 200px;
            height: 200px;
            border-radius: 15px;
        }
        .data{
            position: relative;
            left: 20px;
            top: 80px;
        }
        input[type=submit] {
            position: relative;
            top: 100px;
            left: 130px;
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #555;
            outline: none;
            border-radius: 40px 40px;
            background: #ffe6cc;
        }
        input[type=submit]:hover {
            color: green;
        }    
    </style>
</head>
<body>
    <form method="POST">
   <div class="info">
    <h1>Student information</h1>
    <img src="Images/<?php echo $row['image'];?>" alt="No Image">
    <div class="data">
    <label><strong>Student ID : <?php echo $row['studentID']; ?></strong></label><br><br>
        <label><strong>Student name : <?php echo $row['studentName'];?></strong></label><br><br>
        <label><strong>Course : <?php echo $row['course'];?></strong></label><br><br>
        <label><strong>Address: <?php echo $row['address'];?></strong></label><br><br>   
    </div>
    <input type="submit" name="change" value="Change password">
    <input type="submit" name="logout" value="Log out">   
    </div>
</body>
</html>
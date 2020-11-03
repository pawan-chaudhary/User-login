<?php
ob_start();
require('connect.php');
$tprofile = $_GET['profile'];
$sql = "select * from teacher where tID ='$tprofile';";
$result = mysqli_query($connectivity, $sql);
$row=mysqli_fetch_assoc($result);
if(isset($_POST['back'])){
    header("location:teacherRecord.php");
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Profile</title>
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
            top: 150px;
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
    <img src="Images/<?php echo $row['image']; ?>" alt="No Image">
    <div class="data">
    <label><strong>Teacher ID : <?php echo $row['tID']; ?></strong></label><br><br>
        <label><strong>Teacher name : <?php echo $row['tName']; ?></strong></label><br><br>
        <label><strong>Address: <?php echo $row['tAddress']; ?></strong></label><br><br>
        <label><strong>Salary : <?php echo $row['salary']; ?></strong></label><br><br>
        <label><strong>Department : <?php echo $row['department']; ?></strong></label><br><br>
    </div>
    <input type="submit" name="back" value="Back"> 
    </div>
</form>
</body>
</html>
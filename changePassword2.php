<?php
ob_start();
require('connect.php');
$teacher = $_GET['teachername'];
if(isset($_POST['change'])){
    $old = $_POST['old'];
    $new = $_POST['new'];
    $confirm = $_POST['confirm'];
    $sql = "select tpassword from teacher where tName = '$teacher';";
    $result = mysqli_query($connectivity, $sql);
    $row=mysqli_fetch_assoc($result);
    if($old==$row['tpassword']){
        if($new==$confirm){
            $query = "update teacher set tpassword='$confirm' where tName='$teacher';";
            $changed = mysqli_query($connectivity, $query);
            echo"Password has been changed";
        }
        else{
            echo"please use same password in new password and confirm password";
        }
    }
    else{
        echo "incorrect old password";
    }

}
elseif(isset($_POST['back'])){
    header("location:teacherProfile.php");
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
        .data{
            position: relative;
            left: 0px;
            top: 80px;
        }
        input[type=text]{
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #555;
            outline: none;
            background: #fff2e6;
        }
        input[type=submit] {
            width: 100%;
            padding: 12px 20px;
            margin-top: 80px;
            margin-top: 20px 0;
            box-sizing: border-box;
            border: 1px solid #555;
            outline: none;
            border-radius: 40px 40px;
            background:  #ffe6cc;
        }
        input[type=submit]:hover{
            color: green;
        }    

    </style>
</head>
<body>
    <form method="POST">
    <div class="info">
    <h1>Change Password</h1>
    <div class="data">
    <label><strong>Old Password:</strong></label>
    <input type="text" name="old"><br>  
    <label><strong>New Password:</strong></label>
    <input type="text" name="new"><br>
    <label><strong>Confirm Password:</strong></label>
    <input type="text" name="confirm">     
    </div>
    <input type="submit" name="change" value="Go">
    <input type="submit" name="back" value="Back">   
    </div>
</body>
</html>
<?php
if(isset($_POST['back'])){
    header("location:home.php");
}
if(isset($_POST['newteacher'])){
    header("location:teacherForm.php");
}
if(isset($_POST['login'])){
    require('connect.php');
    $name = $_POST['teacherName'];
    $password = $_POST['teacherPassword'];
    $sql = "select * from teacher where tName = '$name';";
    $result = mysqli_query($connectivity, $sql);
    $row=mysqli_fetch_assoc($result);
    if($row['tName']==$name && $row['tpassword']==$password){
            header("location:teacherProfile.php?name=".$name);
        }
        else{
            echo "teacher name or password is incorrect";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher</title>
<link rel="stylesheet" type="text/css" href="index.css">
    <style>
        .form {
            position: relative;
            color: #663300;
            left: 430px;
            width: 360px;
            background: #0004;
            height: 540px;
            padding: 80px 40px;
        }

        .form h1 {
            text-align: center;
        }

        .form img {
            position: relative;
            top: 8px;
            left: 80px;
            width: 200px;
            height: 200px;
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
            margin: 8px 0;
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
    <div class="form">
        <h1>Teacher Menu</h1>
        <img src="logo2.png">
        <form method="post">
            <label>Teacher Name:</label>
                <input type="text" name="teacherName"><br>
                <label>Password:</label>
                <input type="text" name="teacherPassword"><br>
            <input type="submit" name="login" value="Log in">
            <input type="submit" name="newteacher" value="Register">
                
            <input type="submit" name="back" value="Back to main menu">
        </form>
    </div>
</body>
</html>
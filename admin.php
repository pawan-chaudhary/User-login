<?php
ob_start();
if(isset($_POST['go'])){
    require('connect.php');
    $admin = $_POST['admin'];
    $password = $_POST['password'];
    $sql = "select * from admin where username= '$admin' && password = '$password';";
    $result = mysqli_query($connectivity,$sql);
    $row = mysqli_num_rows($result);
    if ($row==true){
        header("location:adminMenu.php");
    }
    else{
        echo "username or passowrd is incorrect ";
    }
    
}
elseif(isset($_POST['back'])){
    header("location:home.php");
    
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
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
            top: 20px;
            left: 80px;
            width: 200px;
            height: 200px;
        }

        input[type=text] {
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
            background: #ffe6cc;
        }

        input[type=submit]:hover {
            color: green;
        }

    </style>
</head>

<body>
    <div class="form">
        <h1>Admin Login</h1>
        <img src="logo3.png">
        <form action="admin.php" method="post">
            <div class="container">
                <label>Admin:</label>
                <input type="text" name="admin"><br>
                <label>Password:</label>
                <input type="text" name="password" ><br>
                <input type="submit" name="go" value="Get Started">
                <input type="submit" name="back" value="Back to main menu">
            </div>
        </form>
    </div>
</body>
</html>

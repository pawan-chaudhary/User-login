<?php
ob_start();
if(isset($_POST['newStudent'])){
	header("location:studentForm.php");
}
elseif(isset($_POST['back'])){
	header("location:home.php");
}
elseif(isset($_POST['login'])){
     require('connect.php');
    $name = $_POST['studentname'];
    $password = $_POST['studentPassword'];
    $sql = "select * from student where studentName = '$name';";
    $result = mysqli_query($connectivity, $sql);
    $row=mysqli_fetch_assoc($result);
    if($row['studentName']==$name && $row['studentPassword']==$password){
            header("location:studentProfile.php?name=".$name);
        }
        else{
            echo "student name or password is incorrect";
        }
}

ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student</title>
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
        <h1>Student Menu</h1>
        <img src="logo1.png">
        <form action="studentMenu.php" method="POST">
        	    <label>Student Name:</label>
                <input type="text" name="studentname"><br>
                <label>Password:</label>
                <input type="text" name="studentPassword"><br>
        		<input type="submit" name="login" value="Log in">
                <input type="submit" name="newStudent" value="New student">
                <input type="submit" name="back" value="Back to main menu">
        </form>
    </div>
</body>
</html>

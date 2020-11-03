<?php
if(isset($_POST['admin'])){
    header("location:admin.php");
}
elseif(isset($_POST['student'])){
    header("location:studentMenu.php");
}
elseif(isset($_POST['teacher'])){
    header("location:teacherMenu.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        h1{
            position: relative;
            top: 80px;
            text-align: center;
            
        }
        .student img, .teacher img, .admin img{
            margin-left: 45px;
        }
        .student label, .teacher label, .admin label{
            position: relative;
            top: 10px;
            left: 50px;
            font-size: 50px;
        }
        .student{
            position: absolute;
            top: 30%;
            left: 5%;
            
        }
        .teacher{
            position: absolute;
            top: 30%;
            left: 38%;
        }
        .admin{
            position: absolute;
            top: 30%;
            left: 75%;
        }
        
        input[type=submit] {
            position: relative;
            width: 80%;
            left: 40px;
            padding: 12px 20px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #555;
            outline: none;
            border-radius: 40px 40px;
            background:  #ffe6cc;
        }

        h1:hover {
      color: red;
        }
        input:hover{
            color: green;
        }

    </style>
</head>

<body>
    <form action="home.php" method="POST">
<h1>Welcome to main page</h1>
   <div class="admin">
        <img src="logo3.png" width="200" height="200"><br>
        <input type="submit" name="admin" value="Admin">
   </div>
    <div class="student">
        <img src="logo1.png" width="200" height="200"><br>
        <input type="submit" name="student" value="Student">
    </div>
    <div class="teacher">
        <img src="logo2.png" width="200" height="200"><br>
        <input type="submit" name="teacher" value=" Teacher">
    </div>
</form>
</body>
</html>

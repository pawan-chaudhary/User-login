<?php
    if(isset($_POST['newStudent'])){
        header("location:studentForm.php");
    }
    elseif(isset($_POST['studentRecord'])){
        header("location:studentRecord.php");
    }
    elseif(isset($_POST['newTeacher'])){
        header("location:teacherForm.php");
    }
    elseif(isset($_POST['teacherRecord'])){
        header("location:teacherRecord.php");
    }
    elseif(isset($_POST['return'])){
        header("location:admin.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        .menu {
            text-align: center;
            position: relative;
            color: #663300;
            left: 430px;
            width: 360px;
            background: #0004;
            height: 540px;
            padding: 80px 40px;
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
    <form method="post">
        <div class="menu">
            <h1>Choose anyone?</h1>
            <input type="submit" name="newStudent" value="Add new student">
            <input type="submit" name="studentRecord" value="View student records">
            <input type="submit" name="newTeacher" value="Add new teacher">
            <input type="submit" name="teacherRecord" value="View teacher record">
            <input type="submit" name="return" value="Log out">
        </div>
    </form>
</body>

</html>

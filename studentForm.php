<?php
ob_start();
    require('connect.php');
    if(isset($_POST['addStudent'])){
    $name = $_POST['studentName'];
    $course = $_POST['course'];
    $address = $_POST['studentAddress'];
    $stdp = $_POST['studentPassword'];
    $stdImage = $_FILES['studentImage'];  
    $file_name = $stdImage['name'];
    $fileTmp = $stdImage['tmp_name'];
    $fileExtension = explode('.',$file_name);
    $fileCheck = strtolower(end($fileExtension));
    $allowed = array('png', 'jpg', 'jpeg');
    $destination = "Images/".$file_name;
    if(in_array($fileCheck,$allowed)){
        move_uploaded_file($fileTmp,$destination);
        $sql = "insert into student(studentName, course, address, image, studentPassword) values('$name','$course','$address', '$file_name', '$stdp');";
        mysqli_query($connectivity,$sql);
        echo("saved");
	   }
        else{
            echo "you can upload only jpeg,jpg,png image";
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
    <title>Student Form</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        .form {

            position: relative;
            color: #663300;
            left: 400px;
            width: 560px;
            background: #0004;
            height: 540px;
            padding: 80px 40px;

        }

        .form h1 {
            text-align: center;

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

        input[type=submit],
        select,
        input[type=file] {
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
        <form method="post" enctype="multipart/form-data">
            <h1>Student registration form</h1>
            <label>Name:</label>
            <input type="text" name="studentName"><br>
            <label>Course</label>
            <select name="course">
                <option value="B.Sc Computing">B.Sc Computing</option>
                <option value="B.Sc Networking">B.Sc Networking</option>
                <option value="B.Sc Multimedia">B.Sc Multimedia</option>
                <option value="B.Sc Computer Engineering">B.Sc Computer Engineering</option>
            </select><br>
            <label>Address:</label>
            <input type="text" name="studentAddress"><br>
            <label>Select image file:</label>
            <input type="file" name="studentImage"><br>
            <label>New password:</label>
            <input type="text" name="studentPassword"><br> 
            <input type="submit" name="addStudent" value="Save">
            <input type="submit" name="back" value="Back to main menu">
        </form>
    </div>
</body>
</html>

<?php
ob_start();
if(isset($_POST['back'])){
    header("location:home.php");
}
elseif(isset($_POST['addTeacher'])){
    require('connect.php');
    $name = $_POST['teacherName'];
    $address = $_POST['teacherAddress'];
    $salary = $_POST['salary'];
    $department = $_POST['department'];
    $image = $_FILES['teacherImage'];
    $password = $_POST['teacherPassword'];
    $file_name = $image['name'];
    $fileTmp = $image['tmp_name'];
    $fileExtension = explode('.',$file_name);
    $fileCheck = strtolower(end($fileExtension));
    $allowed = array('png', 'jpg', 'jpeg');
    $destination = "Images/".$file_name;
    if(in_array($fileCheck,$allowed)){
    move_uploaded_file($fileTmp,$destination);
    $sql = "INSERT INTO teacher(tName, tAddress, salary, department, image, tpassword) VALUES('$name','$address','$salary','$department','$file_name','$password');";
    $result = mysqli_query($connectivity,$sql); 
    echo "Saved";
    }
    else{
        echo "you can upload only jpeg,jpg,png image";
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Form</title>
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

        input[type=submit], select, input[type=file] {
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
    <form method="post" enctype="multipart/form-data" >
       <h1>Teacher registration form</h1>
        <label>Name:</label>
        <input type="text" name="teacherName"><br>
        <label>Address:</label>
        <input type="text" name="teacherAddress"><br>
        <label>Salary:</label>
        <input type="text" name="salary"><br>
        <label>Department:</label>
        <input type="text" name="department"><br>
        <label>Select image file:</label>
        <input type="file" name="teacherImage"><br>
        <label>New password:</label>
        <input type="text" name="teacherPassword"><br>
        <input type="submit" name="addTeacher" value="Add">
        <input type="submit" name="back" value="Back to Main menu">
    </form>
    </div>
</body>
</html>
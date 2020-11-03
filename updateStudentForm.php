<?php
ob_start();
    require('connect.php');
    $id = $_GET['id'];
    $query = "select * from student where studentID = '$id';";
    $rst = mysqli_query($connectivity,$query);
    $var = mysqli_fetch_array($rst);
if(isset($_POST['update'])){
    $name = $_POST['studentName'];
    $course = $_POST['course'];
    $address = $_POST['studentAddress'];
    $stdp = $_POST['studentPassword'];
    $stdImage = $_POST['studentImage'];  
    $file_name = $image['name'];
    $fileTmp = $image['tmp_name'];
    $fileExtension = explode('.',$file_name);
    $fileCheck = strtolower(end($fileExtension));
    $allowed = array('png', 'jpg', 'jpeg');
    $destination = "Images/".$file_name;
    if(in_array($fileCheck,$allowed)){
        move_uploaded_file($fileTmp,$destination);
        $sql = "update student set studentName='$name', course='$course', address='$address', image='$file_name', studentPassword='$stdp' where studentID='$id';";
        mysqli_query($connectivity,$sql);
        echo("Updated");
	   }
        else{
            echo "you can upload only jpeg,jpg,png image";
        }
    }
    elseif(isset($_POST['back'])){
        header("location:studentRecord.php");
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
            <input type="text" name="studentName" value="<?php echo $var['studentName'] ?>"><br>
            <label>Course</label>
            <select name="course">
                <option value="B.Sc Computing">B.Sc Computing</option>
                <option value="B.Sc Networking">B.Sc Networking</option>
                <option value="B.Sc Multimedia">B.Sc Multimedia</option>
                <option value="B.Sc Computer Engineering">B.Sc Computer Engineering</option>
            </select><br>
            <label>Address:</label>
            <input type="text" name="studentAddress" value="<?php echo $var['address'] ?>"><br>
            <label>Select image file:</label>
            <input type="file" name="studentImage"><br>
            <label>New password:</label>
            <input type="text" name="studentPassword" value="<?php echo $var['studentPassword'] ?>"><br> 
            <input type="submit" name="update" value="Update">
            <input type="submit" name="back" value="Back">
        </form>
    </div>
</body>
</html>

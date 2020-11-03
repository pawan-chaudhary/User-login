<?php
ob_start();
require('connect.php');
if(isset($_GET['del'])){
$value = $_GET['del'];
echo $value;
$sql = "DELETE FROM student WHERE studentID = '$value';";
$result = mysqli_query($connectivity, $sql);
header("location:studentRecord.php");
}
if(isset($_GET['del2'])){
$value2 = $_GET['del2'];
$sql2 = "DELETE FROM teacher WHERE tID = '$value2';";
$result2 = mysqli_query($connectivity, $sql2);
header("location:teacherRecord.php");
}
ob_end_flush();
?>
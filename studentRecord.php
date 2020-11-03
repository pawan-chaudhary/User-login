<?php 
require('connect.php');
$sql = "select * from student;";
$result = mysqli_query($connectivity, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Record</title>
    <style>
        table{
            width: 100%;
        }
    </style>
</head>
<body>
<form  method="post">
<table border="2">
    <tr>
        <th>Student ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Address</th>
        <th>Image Name</th>
        <th>Login Password</th>
        <th colspan="3">Action</th>
    </tr>
        <?php 
        while($row=mysqli_fetch_array($result,MYSQLI_NUM)){
        ?>
    <tr>
       <?php
			foreach($row as $key=>$value)
			{
            ?>
				<td><?php echo $value?></td>
			<?php
		}
			?>
        <td><a href="adminView.php?profile=<?php echo $row[0]?>">View</a> </td>
        <td><a href="updateStudentForm.php?id=<?php echo $row[0]?>">Update</a> </td>
        <td><a href="delete.php?del=<?php echo $row[0]?>">Delete</a> </td>
     <?php } ?>

    </tr>
</table>
    </form> 
</body>
</html>
<?php 
require('connect.php');
$sql = "select * from teacher;";
$result = mysqli_query($connectivity, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Record</title>
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
        <th>Teacher ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Salary</th>
        <th>Department</th>
        <th>Image</th>
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
        <td><a href="adminView2.php?profile=<?php echo $row[0]?>">View</a> </td>
        <td><a href="updateTeacherForm.php?id=<?php echo $row[0]?>">Update</a> </td>
        <td><a href="delete.php?del2=<?php echo $row[0]?>">Delete</a> </td>
     <?php } ?>

    </tr>
</table>
    </form> 
</body>
</html>
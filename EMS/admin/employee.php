<?php
include "links.php";
include "navbar1.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
</head>
<body>
	<h1>Add Employee</h1>
	<?php
       include "connection.php";
       if(isset($_POST['submit']))
       {
       	$empId=mysqli_real_escape_string($con,$_POST['empId']);
       	$name=mysqli_real_escape_string($con,$_POST['name']);
       	$gender=mysqli_real_escape_string($con,$_POST['gender']);
         $department=mysqli_real_escape_string($con,$_POST['department']);
         $post=mysqli_real_escape_string($con,$_POST['post']);
         $salary=$_POST['salary'];
         $insertquery="insert into employee(empId,name,gender,department,post,salary)values('$empId','$name','$gender','$department','$post','$salary')";
         $insertcon=mysqli_query($con,$insertquery);
         if($insertcon)
         {
         	echo "Data inserted successfully!";
         }
         else
         {
         	echo "Data inserted failure!";
         }

       }


	?>
	<form method="post" action="<?php echo(htmlentities($_SERVER['PHP_SELF'])); ?>">
		<div>
		<label>Employee Id</label>
		<input type="text" name="empId"><br><br>
	</div>
		<div>
		<label>Name</label>
		<input type="text" name="name" required="true"><br><br>
	</div>
	<div>
		<label>Gender</label>
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="female">Female<br><br>
	</div>
		<div>
		<label>Department</label>
		<input type="text" name="department"><br><br>
	</div>
		<div>
		<label>Post</label>
		<input type="text" name="post" required="true"><br><br>
	</div>
		<div>
		<label>Salary</label>
		<input type="text" name="salary"><br><br>
	</div>
		<div>
		
		<input type="submit" name="submit" value="Add Employee"><br><br>
	</div>
	</form>

</body>
</html>
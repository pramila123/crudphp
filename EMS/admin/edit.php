<?php
include "links.php";
include "navbar1.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Employee</title>
</head>
<body>
	<h1>Update Employee</h1>
	<?php
   include "connection.php";
   $ids=$_GET['id'];
   $query="select *from employee where id={$ids}";
   $querycon=mysqli_query($con,$query);
   $rows=mysqli_fetch_assoc($querycon);

   if(isset($_POST['submit']))
   {
   	$id1=$_GET['id'];
   	 $empId=mysqli_real_escape_string($con,$_POST['empId']);
       	$name=mysqli_real_escape_string($con,$_POST['name']);
       	$gender=mysqli_real_escape_string($con,$_POST['gender']);
         $department=mysqli_real_escape_string($con,$_POST['department']);
         $post=mysqli_real_escape_string($con,$_POST['post']);
         $salary=$_POST['salary'];

         $updatequery="update employee set empId='$empId',name='$name',gender='$gender',department='$department',post='$post',salary='$salary' where id=$id1";
         $updatecon=mysqli_query($con,$updatequery);
         if($updatecon)
         {
         	?>
         	<script type="text/javascript">
         		alert("updated successfully!");
         		location.replace("home.php");
         	</script>
         	
         	<?php
         	
         }
         else
         {
         	echo "updated failure!";
         }

   }

	?>
	
	<form method="post" action="">
		<div>
		<label>Employee Id</label>
		<input type="text" name="empId" value="<?php echo $rows['empId'];?>"><br><br>
	</div>
		<div>
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $rows['name'];?>" required="true"><br><br>
	</div>
	<div>
		<label>Gender</label>
		<input type="radio" name="gender"  value="male" <?php if($rows['gender']=='male')
           {
           	echo "checked";
           }
		?>>Male
		<input type="radio" name="gender" value="female" <?php if($rows['gender']=='female')
		{
                echo "checked";
		}?>>Female<br><br>
	</div>
		<div>
		<label>Department</label>
		<input type="text" value="<?php echo $rows['department'];?>" name="department"><br><br>
	</div>
		<div>
		<label>Post</label>
		<input type="text" name="post" value="<?php echo $rows['post'];?>"required="true"><br><br>
	</div>
		<div>
		<label>Salary</label>
		<input type="text" value="<?php echo $rows['salary'];?>" name="salary"><br><br>
	</div>
		<div>
		
		<input type="submit" name="submit" value="Update"><br><br>
	</div>
	</form>

</body>
</html>
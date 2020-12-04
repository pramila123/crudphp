<?php
session_start();
?>

<div>
	<center><h1 style="color:blue;">Welcome :<?php echo $_SESSION['fname']."&nbsp". $_SESSION['lname'];?> </h1></center>
</div>

<?php
include "navbar1.php";
include "links.php"
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>
	<center><h1>Display All Employee</h1></center>
   <table id="myTable" class="table table-stripted">
   	<thead>
   	<tr class="warning">
   		<td>Employee Id</td>
   		<td>Name</td>
   		<td>Gender</td>
   		<td>Department</td>
   		<td>Post</td>
   		<td>Salary</td>
   		<td>Action</td>
   	</tr>
   	</thead>
   	<tbody>
   		<?php
               include "connection.php";
               $display="select *from employee";
               $displaycon=mysqli_query($con,$display);
               while($rows=mysqli_fetch_assoc($displaycon))
               {
               	 ?>
       <tr class="success">
   		<td><?php echo $rows['empId']; ?></td>
   		<td><?php echo $rows['name']; ?></td>
   		<td><?php echo $rows['gender']; ?></td>
   		<td><?php echo $rows['department']; ?></td>
   		<td><?php echo $rows['post']; ?></td>
   		<td><?php echo $rows['salary']; ?></td>
   		<td><a href="edit.php?id=<?php echo $rows['id']; ?>">Edit</a>&nbsp &nbsp
         <a href="delete.php?delete_id=<?php echo $rows['id']; ?>" onclick="return confirm('Do you want to delete this data?');"">Delete</a> </td>
   	</tr>
               	 <?php
               }
   		?>

   	</tbody>
   </table>
   <script type="text/javascript">
   	$(document).ready( function () {
    $('#myTable').DataTable();
} );


   	
   </script>
</body>
</html>
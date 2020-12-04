<?php
include "connection.php";

$id=$_GET['id'];
$deletedata='delete from employee where id={$id}';
$deletecon=mysqli_query($con,$deletedata);
if($deletecon)
{
	?>
	<script type="text/javascript">
		alert("Data deleted successfully!");
		location.replace('home.php');
	</script>
	<?php
}

?>
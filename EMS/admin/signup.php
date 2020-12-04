<?php
include "links.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee SignUp</title>
</head>
<body>
	<h1 style="color:blue">SignUp Page</h1>
	<hr>
<?php
include "connection.php";
if(isset($_POST['submit']))
{
  $fname=mysqli_real_escape_string($con,$_POST['fname']);
   $lname=mysqli_real_escape_string($con,$_POST['lname']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
     $password=mysqli_real_escape_string($con,$_POST['password']);
      $cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);
      $pass1=password_hash($password, PASSWORD_BCRYPT);
      $pass2=password_hash($cpassword, PASSWORD_BCRYPT);
      $emailquery="select *from user where email='$email'";
      $emailcon=mysqli_query($con,$emailquery);
      $emailrows=mysqli_num_rows($emailcon);
      if($emailrows>0)
      {
        echo "Email Already exists!";
      }
      else
      {
        if($password==$cpassword)
        {
        $insertquery="insert into user(fname,lname,email,password,cpassword) values('$fname','$lname','$email','$pass1','$pass2')";
        $insertcon=mysqli_query($con,$insertquery);
        if($insertcon)
        {
          ?>
          <script type="text/javascript">
            alert("Data inserted successfully!");
          </script>
          <?php
        }
        else
        {
          ?>
          <script type="text/javascript">
            alert("Data inserted failure!");
          </script>
          <?php
        }
      }
      else
      {
        echo "<p style='color:red'>Password doesn't match!</p>";
      }
      }
}


?>

<form class="form-horizontal" method="post" action="<?php echo(htmlentities($_SERVER['PHP_SELF'])); ?>">
  <div class="form-group">
    <label class="control-label col-sm-1" for="fname">FirstName:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your FirstName">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="lname">LastName:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Your LastName">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-1" for="email">Email:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="email"  name="email" placeholder="Enter Your Email">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-1" for="pwd">Password:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="pwd" name="password" placeholder="Enter password">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-1" for="cpwd">Confirm Password:</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" id="cpwd"  name="cpassword" placeholder="Enter Confirm password">
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-10">
      <input type="submit" name="submit" class="btn btn-primary" value="SignUp">
    </div>
  </div>
  <div class="form-group">
  	<div class="col-sm-10">
      <a href="login.php" style="text-decoration: none;color: blue;font-size: 15px;">Already have an acccount?Click here to login.</a>
    </div>
  </div>
</form>

</body>
</html>

<?php
session_start();
include "links.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee Login</title>
</head>
<body>
	<h1 style="color:blue">Login Page</h1>
	<hr>
  <?php
include "connection.php";
if(isset($_POST['submit']))
{
  
    $email=mysqli_real_escape_string($con,$_POST['email']);
     $password=mysqli_real_escape_string($con,$_POST['password']);
      
      $emailquery="select *from user where email='$email'";
      $emailcon=mysqli_query($con,$emailquery);
      $emailrows=mysqli_num_rows($emailcon);
      if($emailrows)
      {
       $emailpass=mysqli_fetch_assoc($emailcon);
       $pass=$emailpass['password'];
       $_SESSION['fname']=$emailpass['fname'];
       $_SESSION['lname']=$emailpass['lname'];
       $passverify=password_verify($password, $pass);
       if($passverify)
       {
          ?>
          <script type="text/javascript">
            alert("Login successful!");
            location.replace("home.php");
          </script>
          <?php
       }
       else
       {
        echo "<h4 style='color:red'>Invalid email and password!</h4>";
       }
     }
     else
     {
      echo "<h4 style='color:red'>Invalid email and password!</h4>";
     }
      
}


?>
<form class="form-horizontal" method="post" action="<?php echo(htmlentities($_SERVER['PHP_SELF'])); ?>"
  
 
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
    <div class="col-sm-offset-1 col-sm-5">
      <input type="submit" name="submit" class="btn btn-success" value="Login">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
      <a href="forget_password.php" style="text-decoration: none;color: brown;font-size: 18px;">Forget Password</a>
    </div>
  </div>
  <div class="form-group">
  	<div class="col-sm-offset-1 col-sm-10">
      <a href="signup.php" style="text-decoration: none;color: red;font-size: 18px;">Create an acccount!</a>
    </div>
  </div>
</form>

</body>
</html>

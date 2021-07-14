<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php
	   $email = $username = $password = $confirmpassword = "";
	   $emailErr = $usernameErr =  $passwordErr = $confirmpasswordErr = "";

	   if ($_SERVER["REQUEST_METHOD"] == "POST")
	   {
	   	 if (empty($_POST['email'])) 
	   	 {
	   	 	$emailErr = "Email required";
	   	 }
	   	 else
	   	 {
	   	 	$email = $_POST['email'];
	   	 }

	   	 if (empty($_POST['username'])) 
	   	 {
	   	 	$usernameErr = "Username required";
	   	 }
	   	 else
	   	 {
	   	 	$username = $_POST['username'];
	   	 }

	   	 if (empty($_POST['password'])) 
	   	 {
	   	 	$passwordErr = "Password required";
	   	 }
	   	 else
	   	 {
	   	 	$password = $_POST['password'];
	   	 }

	   	 if (empty($_POST['confirmpassword'])) 
	   	 {
	   	 	$confirmpasswordErr = "Confirm Password";
	   	 }
	   	 else
	   	 {
	   	 	$comfirmpassword = $_POST['confirmpassword'];
	   	 }


	   	 if ($emailErr == "" && $usernameErr == "" && $passwordErr == "" && $confirmpasswordErr == "") 
	   	 {
	   	 	require_once 'db1.php';


	   	 
	   	 	$sql = "SELECT * FROM login WHERE userName = '$username' AND userEmail = '$email";
	   	 	$stmt = mysqli_query($conn,$sql);

	   	 	$num = mysqli_num_rows($stmt);

	   	 	if ($num == 1) 
	   	 	{
	   	 		echo "Username or Email Already exit";
	   	 	}

	   	 	else
	   	 	{
	   	 		if ($password !== $confirmpassword) 
	   	 		{
	   	 			echo "password not matched";
	   	 		}
	   	 		else

	   	 		{
	   	 			$register = "INSERT INTO login(userName, userEmail, userPassword)  VALUES ($username,$email,$password)";
	   	 			mysqli_query($conn,$register);
	   	 			echo "Registration success";
	   	 			header("location: dblogin.php");

	   	 		}
	   	 	} 	 	
	   	 	
	   	 }


	   }


	?>

	<div class="signup-input">
		<h1>Registration</h1>

     	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
     		
              <label for="email">Email</label>
              <br>
              <input type="email" id="email" name="email"  value="<?php echo $email ?>">
              <br>
              <?php echo $emailErr ?>
              <br>
              <label for="username">Username</label>
              <br>
              <input type="text" id="username" name="username"  value="<?php echo $username ?>">
              <br>
              <?php echo $usernameErr ?>
              <br>
     
              <label for="password">Password</label>
              <br>
              <input type="password" id="password" name="password" value="<?php echo $password ?>">
              <br>
              <?php echo $passwordErr ?>
              <br>
              <label for="confirmpassword">Confirm Password</label>
              <br>
              <input type="password" id="confirmpassword" name="confirmpassword"  value="<?php echo $confirmpassword ?>">
              <br>
              <?php echo $confirmpasswordErr ?>
              <br>
   
              <div class="register-button">
              	<input type="submit" id="register" name="register" value="Register">
              </div>
             
        </form>
         <p>Already Have Account? <a href="dblogin.php">Log In</a></p>
     </div>

</body>
</html>
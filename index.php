<?php require_once('inc/connection.php'); ?>
<?php 
// check for form submission
if (isset($_POST['submit'])) {
              
              $errors = array();

// check if username and password has been entered
	 if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
$error[] = 'Username is missing / Invalid';

	 }
	 
	 if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
$error[] = 'password is missing / Invalid';

	 } 
// check if there are any errors in the form
	 if (empty($errors)) {
	 	//save username and password into variables

	 	 $email = mysqli_real_escape_string($connection, $_POST['email']);
	  $email = mysqli_real_escape_string($connection, $_POST['email']);
	  $hashed_password = sha1($password);
	 
//prepare db qurey
	  $qurey ="SELECT * FROM user
	  WHERE email = '{$email}'
	  AND password = '{$hashed_password}'
	  LIMIT 1";

$result_set = mysqli_query($connection, $qurey);
if ($result_set){  
	//query succesful
		if (mysli_num_rows($result_set)==1){
      //valid user found
			//redirect to user.php
			header('location:user.php');

		$errors[] = 'Invalid Username /password';
	}
}else{
	$errors[] ='database query faild';
	     }
	 }
}
 ?>



<!DOCTYPE html>
<html lang= "en">
<head>
	<meta charset="UTS-8">
	<title>Log In - User Management System</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	<div class="login">
	
		<form action="index.php" method="post"></form>

		<fieldset>
			<legend><h1>log In</h1> </legend>
			<?php if (isset($errors) && !empty($errors)) {
				echo '<p class="error"> Invalid Username / password</p>';
			} ?>

		
				<p>
					<label for="">Username</label>
					<input type="text" name="email" id=""placeholder="Email address">
				</p>
				<p>
					<label for="">password</label>
					<input type="password" name="password" id="" placeholder="password">
				</p>
				<p>
					<button type="submit" name="submit">Log In</button>
				</p>
		</fieldset>
	</div> 

</body>
</html>
<?php mysqli_close($connection); ?>
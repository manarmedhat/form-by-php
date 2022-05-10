<?php

/*to make data more secure
 $fullname = htmlentities($_POST['Full Name']);
 

	if (filter_has_var(INPUT_POST, 'SUBMIT')){

		echo 'SUBMITTED' ;
		*/
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>FORM</title>
	<link rel="stylesheet" type="text/css" href="editing.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body> 
	
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form action="reg.php" method="POST" >
					
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="fullname" placeholder="Full Name" required="">
						<?php if(isset($user_error))
					{
						echo $user_error;
					}
					?>
					<input type="text" name="username" placeholder="username" required="">
						<?php if(isset($email_error))
					{
						echo $email_error;
					}
					?>
					<input type="email" name="email" placeholder="email" required="">
						<?php if(isset($password_error))
					{
						echo $password_error;
					}
					?>
					<input type="password" name="password" placeholder="Password" required="">
					<input type="phone" name="phone" placeholder="phone" required="">
					<button>Sign up</button>
				</form>
			</div>
			
			
			<div class="login">
				<form action="signin.php" method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<?php 

						if(isset($user_error)){
							echo $user_error;
						}
					?>
					<input type="username" name="username" placeholder="username" required="">
						<?php 

						if(isset($pass_error)){
							echo $pass_error;
						}
					?>
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	
</body>
</html>
	
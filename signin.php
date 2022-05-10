<?php 

session_start();
include('FINAL PROJECT/connection.php');
if(isset($_POST['usernamE'] && isset($_POST['password']))

{

	$username = stripcslashes(strtolower($_POST['username']));
	$password = stripcslashes($_POST['password']);
	$md5_pass = md5($_POST['password']);
	$username = filter_input(INPUT_POST,'username');

	$useername=htmlentities(mysqli_real_escape_string($connection,$_POST['username']));
	$password=htmlentities(mysqli_real_escape_string($connection,$_POST['password']));


	 $err_s = 0;

		if(empty($username))
		{

			$user_error = 'please enter your username <br>';
			$err_s = 1;
		}


		if(empty($password))
   		 {

     		 $pass_error = 'please insert a password <br>';
      		$err_s = 1;
      	        include('home.php');
                 }
    

if(!isset($err_s)){

	$sql ="SELSECT id,username FROM users WHERE username='$username' AND md5_pass = '$md5_pass' " ;
	$result = mysqli_query($connect,$sql);
	$row = mysql_fetch_assoc($result);
	if($row['username']) === $username && $row['password'] === $passwor){

$_SESSION['username'] =$row['username'];
$_SESSION['id'] =$row['id'];
		header('location:home.php');
		exit();

}
else{
	
	$user_error = '<p id ="error" > wrong data<p>;
	include('home.php');
	exit();
	}
	
	



?>

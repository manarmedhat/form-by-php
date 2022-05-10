<?php

include('connection.php');

  if(isset($_POST['submit'])){
     //$username=htmlentities('username');
     $FullName= stripcslashes($_POST['fullname']);
     $username=stripcslashes(strtolower($_POST['username']));
     $email=stripcslashes($_POST['email']);
     $password=stripcslashes($_POST['password']);
     $phoneNumber=$_POST['phone'];
  }

/*
    $FullName=htmlentities(mysqli_real_escape_string($connect,$_POST['fullname']));
    $username=htmlentities(mysqli_real_escape_string($connect,$_POST['username']));
    $email=htmlentities(mysqli_real_escape_string($connect,$_POST['email']));
    $password=htmlentities(mysqli_real_escape_string($connect,$_POST['password']));
    $phoneNumber=htmlentities(mysqli_real_escape_string($connect,$_POST['phone']));
    $md5_pass =md5($password);
*/


    $check_user= "SELECT * FROM signup WHERE username='$username'";
    $chech_result= mysqli_query($connect,$check_user);
    $num_rows = mysqli_num_rows($chech_result);

    $err_s = 0;
    if($num_rows!=0)
    {

      $user_error= '<p this username already exist ,insert another one <p><br>';
      $err_s = 1;
    }

    if(empty($username))
    {

      $user_error = 'please enter your username <br>';
      $err_s = 1;
    }
    elseif (strlen($username) < 8) 
    {
      
      $user_error ='please isert at minimum 8 letters<br>';
      $err_s = 1;
    }    
    elseif (filter_var($username,FILTER_VALIDATE_INT))
    {

       $user_error = 'Please inter a valid username<br>';

    }

    
    if(empty($email))
    {

      $email_error = 'please enter your email <br>';
      $err_s = 1;
    }
    elseif (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
       $email_error = 'Please insert a valid email<br>';
       $err_s = 1;
    }


    if(empty($password))
    {

      $password_error = 'please insert a password <br>';
      $err_s = 1;
        include('home.php');
    }
    elseif (strlen($password) < 8) 
    {
      
      $user_error ='please insert at minimum 8 letters<br>';
      $err_s = 1;
      include ('home.php');
    }    
    else
    {
      if (( $err_s==0) && ($num_rows == 0))
      {
        $sql ="INSERT INTO signup(fullname,email,username,password,phone) VALUES('$FullName','$email','$username','$password','$phoneNumber')";
        mysqli_query($connect,$sql);
        echo "Added successfully!";
        //header('location:home.php');
      }else{
        echo "Failed to add the user";
      }
 }
?>
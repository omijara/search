<?php

session_start();
$username = $_POST['uname'];
$password = $_POST['pword'];

require_once('database/dbcon.php');
//Select username and password from data base and check wheather it is valid or not. If valid you are allow to login or your login credential is invalid you are nit eligible to see the main page.

$sql = "SELECT *FROM login_user WHERE (username = '$username' and password = '$password')";

$result = mysqli_query($link, $sql);

$data_row = mysqli_fetch_array($result);

if(mysqli_num_rows($result)==1){


if( ($username ==  $data_row['username'] && $password == $data_row['password']) )
{
        $_SESSION['id'] = $data_row[0]; 
        $_SESSION['username'] = $data_row['username'];
      
//echo "success";
//exit();
  header("location: main.php");
}


//show message if credential is invalid

else
{
$msg ="Username or Password is invalid";
header("location: sign-in.php?msg=".$msg);

}

//show message if credential is invalid
}
else{

$msg ="Username or Password is invalid";
header("location: sign-in.php?msg=".$msg);
}


?>

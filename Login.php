<?php

$user = 'root';
$password = '';
$db = 'CLearn';

$con = new mysqli('localhost', $user, $password, $db) or die('Unable to connect to the database');

$username = '';
$user_password = '';

if(isset($_POST['login'])){

  $my_username = $_POST['username'];
  $my_password = $_POST['user_password'];

  $search_query = "SELECT * FROM users WHERE user_reg_number = '$my_username' AND user_password = '$my_password'";

  $search_result = mysqli_query($con, $search_query);

  if($search_result){
    if(mysqli_num_rows($search_result)){
      session_start();

      $_SESSION["student_username"] = $my_username;
      //$_SESSION["logged_in"] = true;

      while($row = mysqli_fetch_array($search_result)){
        $_SESSION["student_fullname"] = $row['user_name'];
        $_SESSION["student_reg_number"] = $row['user_reg_number'];
      }

      header("location: index.php");
    }else{
      echo 'Either your password or username is incorect!!! Please try again.';
    }
  }else{
    echo 'Error, please try again';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="allCss.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CLearn</title>
</head>
<body>
  <div class='border border-gray-400 rounded-md w-1/3 m-auto my-20 p-12'>
    <img class="h-32 m-auto" src="cut_logo.png" alt="logo">
    <h2 class='text-2xl font-semibold text-blue-900 w-full mt-4 mb-8' style='text-align: center;'>Welcome to CLearn</h2>
    <form action="Login.php" method="post">
      <div class='flex'><label class='font-semibold'>Username: </label> <input autofocus class='mx-2 border border-gray-400 rounded-md w-full' type="text" name="username" value=""></div>
      <div class='flex my-8'><label class='font-semibold'>Password: </label> <input class='mx-3 border border-gray-400 rounded-md w-full' type="password" name="user_password" value=""></div>
      <input class='bg-blue-700 rounded-md px-8 text-white py-1 float-right' type="submit" name="login" value="Login">
    </form>
  </div>
</body>
</html>
<?php
session_start();

if(!isset($_SESSION["student_username"])){
  header("location: Login.php");
}

$user = 'root';
$password = '';
$db = 'CLearn';

$con = new mysqli('localhost', $user, $password, $db) or die('Unable to connect to the database');

$username = '';
$user_password = '';

function getData(){
    $posts = array();
    $posts[0] = $_POST['username'];
    $posts[1] = $_POST['user_password'];

    return $posts;
}

if(isset($_POST['login'])){

    $info = getData();

    $search_query = "SELECT * FROM users WHERE user_reg_number=$info[0]";

    $search_result = mysqli_query($con, $search_query);

    if($search_result){
        if(mysqli_num_rows($search_result)){
            while($row = mysqli_fetch_array($search_result)){
                $username = $row['user_reg_number'];
                $user_password = $row['user_password'];
            }
        }else{
            echo 'No data found';
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
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CLearn</title>
  <style>
    .sticky{
      position: fixed;
      top: 0;
      background-color: white;
    }
    
    .topnav{float: right;}

  </style>
</head>
<body>
  <!-- Top Navigation bar -->
  <div class="w-full shadow-xl border-b border-gray-400 z-10 sticky">
    <div class="h-full px-8 flex">
      <!-- Wattle logo -->
      <a href="index.html" class="w-12 my-2"><img class="h-8" src="cut_logo.png" alt="logo"></a>
      <div class="px- w-full">
        <p class="text-lg xl:text-2xl font-semibold text-blue-900 py-2">CLearn</p>
      </div>
      <div class="topnav flex float-right">
        <input type="text" name="search_bar" size="16" placeholder="Search" class="border border-gray-500 my-3 rounded-full px-8 bg-gray-100 mr-4">
        <form action="index.php" method="post" class='h-8 w-8 my-2'> 
          <input type="submit" class='font-semibold bg-red-700 text-white text-lg px-2 rounded-full mt-1' value="X" name="log_out">
        </form>
      </div>
    </div>
  </div>

  <div class='flex fixed w-1/6 bg-blue-900 h-screen z-0'>
    <ul class='w-full pt-16'>
      <li class='font-medium text-lg py-2 hover:bg-blue-800 w-full  px-8'><a href="index.php" class='text-gray-200'> Dashboard </a></li>
      <li class='font-medium text-lg py-2 hover:bg-blue-800 w-full  px-8'><a href="ProgressPage.php" class='text-gray-200'> My progress </a></li>
      <li class='font-medium text-lg mt-8 py-2 hover:bg-blue-800 w-full  px-8'><a href="TutorialsPage.php" class='text-gray-200'> Tutorials </a></li>
      <li class='font-medium text-lg py-2 hover:bg-blue-800 w-full  px-8'><a href="ProjectsPage.php" class='text-gray-200'> Projects </a></li>
      <li class='font-medium text-lg py-2 hover:bg-blue-800 w-full  px-8'><a href="AssesmentPage.php" class='text-gray-200'> Assesment </a></li>
      <li class='font-medium text-lg mt-8 py-2 hover:bg-blue-800 w-full  px-8'><a href="LiveSessionsPage.php" class='text-gray-200'> Live sessions </a></li>
    </ul>
  </div>



  <!-- Body -->
  <div class='w-5/6 float-right py-16 px-8'>

    <div class='container'>
      <p class='font-semibold text-4xl'> Live sessions </p>
      <p class='font-medium text-2xl py-8'> Sorry!!! We currently do not have live session now. </p>
      <p class='font-medium text-lg'><mark> Upcoming events </mark></p>
      <ul class='py-4 px-12 list-disc'>
        <li class='text-blue-600 pb-2'>12-09-2020 <u class='text-gray-600'> Introduction to Object oriented programming </u></li>
        <li class='text-blue-600 pb-2'>12-09-2020 <u class='text-gray-600'> Get started with Object oriented programming </u></li>
        <li class='text-blue-600 pb-2'>12-09-2020 <u class='text-gray-600'> Fundamentals of  SQL </u></li>
      </ul>
    </div>





  </div>


</body>
</html>
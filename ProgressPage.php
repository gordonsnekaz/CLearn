<?php
session_start();

if(!isset($_SESSION["student_username"])){
  header("location: Login.php");
}


$user = 'root';
$password = '';
$db = 'CLearn';

$con = new mysqli('localhost', $user, $password, $db) or die('Unable to connect to the database');

$t = array();
$user = $_SESSION["student_reg_number"];

$search_query = "SELECT * FROM tutorials WHERE user_reg_number = '$user'";

$search_result = mysqli_query($con, $search_query);

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

    <!-- welcome card -->
    <div class='bg-orange-500 rounded-md shadow-md w-full pt-12 pb-0'>
      <div class='px-8'>
        <p class='font-medium text-2xl text-gray-200'>My progress</p>
        <p class='text-gray-200 py-8'> Don’t compare your progress to that of others. We need our own time to travel our own distance. Work hard for you and your own goals. 
          Make measurable progress in reasonable time and earn badges.</p>
        <div class='Progress pb-4'>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2">1 course completed</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2">2 courses in progress</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2">4 Badges</span>
        </div>
      </div>
      <a href="TutorialsPage.php">
        <div class=' flex bg-green-500 h-16 rounded-b-md items-center'>
          <p class='flex-1 w-full text-center text-2xl font-medium text-gray-900'> Keep making progress</p>
        </div>
      </a>
    </div>


    <?php 
      while($row = mysqli_fetch_array($search_result)){
        $t[0] = $row['tutorial_1'];
        $t[1] = $row['tutorial_2'];
        $t[2] = $row['tutorial_3'];
        $t[3] = $row['tutorial_4'];
        $t[4] = $row['tutorial_5'];
        $t[5] = $row['tutorial_6'];
        $t[6] = $row['tutorial_7'];
        $t[7] = $row['tutorial_8'];
        $t[8] = $row['tutorial_9'];
        $t[9] = $row['tutorial_10'];
      }

      for($i = 0; $i < 10; $i++)
      {
        if($t[$i] > 0 && $t[$i] < 100)
        {
          $a = $i + 1;
          $str = 'tutorial_' .$a;

          $search_query = "SELECT tutorial_definition FROM tutorials_definition WHERE tutorial_key = '$str'";

          $search_result = mysqli_query($con, $search_query);

          $row = mysqli_fetch_array($search_result);

    ?>

    <div class='mt-8 w-full'>
      <p class='text-md font-semibold pb-2'> <?php echo $row[0]; ?> <mark className='text-sm font-medium'> <?php echo $t[$i]; ?>%</mark></p>
      <div class='bg-gray-400 w-full h-4 rounded-full'>
        <div class='rounded-full h-full' style="width: <?php echo $t[$i]; ?>%; background-color: <?php 
        if($t[$i] >= 70)
          echo 'green'; 
        else if($t[$i] >= 50)
          echo 'orange';
        else
          echo 'red';
        ?>"></div>
      </div>
    </div>

    <?php

        }
      }

    ?>

    <div class='pt-12'>
      <p class='text-xl font-semibold text-gray-800'>Badges</p>
    </div>


    <?php

      for($i = 0; $i < 10; $i++)
      {
        if($t[$i] == 100 )
        {
          $a = $i + 1;
          $str = 'tutorial_' .$a;

          $search_query = "SELECT tutorial_definition FROM tutorials_definition WHERE tutorial_key = '$str'";

          $search_result = mysqli_query($con, $search_query);

          $row = mysqli_fetch_array($search_result);

    ?>

    <div class="bg-white max-w-sm rounded-md hover:bg-gray-200 overflow-hidden shadow border border-gray-400 mb-8 mt-4 w-48 transition duration-500 ease-in-out transform hover:-translate-y-2 hover:scale-105">
      <p class="font-bold text-md text-green-800 pb-4 px-2 py-4"><?php echo $row[0]; ?></p>
      <div class="w-full h-48 mr-4 bg-contain" style="background-image: url(completion2.jpg);"></div>
      <p class='text-center text-xl font-medium text-white bg-blue-500 my-2 mx-2 rounded'> Share </p>
    </div>

    <?php

        }
      }
    ?>

    <p id='h' class='text-sm font-semibold text-teal-800 py-2'> Get more Badges by completing courses and writing quizes</p>



  </div>

  
</body>
</html>
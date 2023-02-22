<?php
session_start();

if(!isset($_SESSION["student_username"])){
  header("location: Login.php");
}

$user = 'root';
$password = '';
$db = 'CLearn';

$con = new mysqli('localhost', $user, $password, $db) or die('Unable to connect to the database');

$t_title = '';
$t_description = '';
$t_time = '';
$t_documentation = '';
$t_video = '';

$search_query = "SELECT * 
                FROM tutorials_definition";

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
    <div class="bg-red-600 rounded-lg shadow-md w-full flex-1 px-8 pt-12 pb-16">
      <div class=''>
        <p class="font-medium text-2xl text-gray-200"> C Language Tutorials</p>
        <p class="text-gray-200 py-8">
          Practice what you have learned with interactive exercises in your browser to get personalized learning recommendations to master 
          C programming language and win badges to increase your points. You can also retake assignments to track your progress.
        </p>
      </div>
      <div class='Progres'>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2"> 4 tutorials completed</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2"> 7 assesments completed</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2"> 163+ Students Enrolled </span>
      </div>
    </div>

    <div class='pt-8 pb-4'>
      <p class='font-semibold text-md'> 3 Tutorials </p>
    </div>


    <?php 
      while($row = mysqli_fetch_array($search_result)){
        $t_title = $row['tutorial_definition'];
        $t_description = $row['tutorial_description']; 
        $t_time = $row['tutorial_time'];
    ?>

    <form action="Tutorial.php" method="post" class="bg-white rounded-md hover:bg-gray-200 overflow-hidden shadow px-4 py-6 mb-8 border border-gray-400">
      <div class=''>
        <div class="font-medium text-2xl text-teal-900 pb-4"><?php echo $t_title; ?></div>
        <input class="font-medium text-2xl text-teal-900 pb-4" name="t_t" value="<?php echo $t_title; ?>" style="display: none">
        <p class="text-gray-700 text-lg">
          <?php echo $t_description; ?>
        </p>
        <p class='py-2'> <mark> <?php echo $t_time; ?> minutes</mark></p>
        <div class='relative w-full pb-4 h-10'>
          <input class='absolute inset-y-0 right-0 px-12 py-2 bg-blue-600 rounded-full text-gray-300 text-lg' type='submit' value='Start tutorial'>
        </div>
      </div>
    </form>

    <?php
      }

    ?>





  </div>

</body>
</html>
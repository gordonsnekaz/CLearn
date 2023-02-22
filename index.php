<?php
session_start();

if(!isset($_SESSION["student_username"])){
  header("location: Login.php");
}

if(isset($_POST['log_out'])){
  session_unset();

  session_destroy();
  header("location: Login.php");
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

    <!-- welcome card -->
    <div class="bg-blue-700 rounded-lg shadow-md w-full px-8 pt-12 pb-8">
      <div class=''>
        <p class="font-medium text-2xl text-gray-200">Welcome back, <?php echo $_SESSION["student_fullname"]; ?></p>
        <p class="text-gray-200 py-8">
          We hope you are doing fine today. You were almost done with nested if statements. You can pick up from where you left off yesterday and contimue from there. All the best in your progress.
        </p>
      </div>
      <div class='Progress'>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2">4 Hours left</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2">13 Videos left</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-teal-800 mr-2 mb-2"> 27 Exercises left</span>
      </div>
      <div class='pt-2 pb-8 w-full'>
        <button onclick="window.location.href='#';" class="text-sm xl:text-xl text-gray-200 font-semibold px-12 py-2 rounded-full bg-green-500 float-right">Continue</button>
      </div>
    </div>





  </div>

 
</body>
</html>
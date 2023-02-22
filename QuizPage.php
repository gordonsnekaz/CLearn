<?php
session_start();

if(!isset($_SESSION["student_username"])){
  header("location: Login.php");
}

$user = 'root';
$password = '';
$db = 'CLearn';

$con = new mysqli('localhost', $user, $password, $db) or die('Unable to connect to the database');

$ass_title = $_POST["t_t"];
$ass_start = $_POST["a_start"];
$ass_range = $_POST["a_range"];
$qtn_no = 1;
$answNum = 0;
$trk = 0;
$qtn = '';
$qtn_a = '';
$qtn_b = '';
$qtn_c = '';
$qtn_d = '';
$answ = array();

$search_query = "SELECT * 
                FROM questions ORDER BY qtn_order";

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
      <!-- logo -->
      <a href="index.html" class="w-12 my-2"><img class="h-8" src="cut_logo.png" alt="logo"></a>
      <div class="px-1 w-full">
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
  <form action="Mark.php" method="post" class='w-5/6 float-right py-16 px-8'>

    <div class='flex pb-4'>
      <p class="font-medium text-2xl text-gray-900"> <?php echo $ass_title ?> </p>
      <input name="t_t" value="<?php echo $ass_title; ?>" style="display: none">
      <input class="font-medium text-2xl text-teal-900 pb-4" name="a_start" value="<?php echo $ass_start; ?>" style="display: none">
      <input class="font-medium text-2xl text-teal-900 pb-4" name="a_range" value="<?php echo $ass_range; ?>" style="display: none">
      <p class="float-right font-medium text-2xl text-red-700 ml-24" id="timeP"> 5 </p>
    </div>

    <?php 
      while($row = mysqli_fetch_array($search_result)){
        $qtn = $row['qtn'];
        $qtn_a = $row['qtn_answer1']; 
        $qtn_b = $row['qtn_answer2'];
        $qtn_c = $row['qtn_answer3'];
        $qtn_d = $row['qtn_answer4'];

        if($trk >= $ass_start && $trk < $ass_range)
        {
        
    ?>

    <!-- Question card -->
    <div class='container border border-gray-400 rounded-md mb-8'>
      
      <div class='w-full'>
        <!-- For each -->
        <div class="bg-white rounded-lg shadow-md w-full flex-1 pt-4 pb-4">
          <div class='px-8'>
            <p id='hll' class="font-medium text-lg text-gray-500"> Question <?php echo"$qtn_no" ?> </p>
            <p class="font-semibold text-gray-700 pt-4 text-2xl">
              <?php echo"$qtn" ?>
            </p>
          </div>
          <div class='Answers py-4'>
            <p class='bg-gray-200 px-8 py-4 font-semibold text-gray-500'>Choose the corect answer below:</p>
            <!-- For -->
            <div>
              <div class='px-8 py-4' name="qtn" type="submit" value="Submit answer">
                <div>
                  <input type='radio' class='' name='<?php echo "answer" .$answNum .""; ?>' value='A'> <label> <?php echo"$qtn_a" ?> </label><br>
                  <input type='radio' class='' name='<?php echo "answer" .$answNum .""; ?>' value='B'> <label> <?php echo"$qtn_b" ?> </label><br>
                  <input type='radio' class='' name='<?php echo "answer" .$answNum .""; ?>' value='C'> <label> <?php echo"$qtn_c" ?> </label><br>
                  <input type='radio' class='' name='<?php echo "answer" .$answNum .""; ?>' value='D'> <label> <?php echo"$qtn_d" ?> </label><br>
                </div>
              </div>
              <hr>
            </div>
          </div> 
        </div>
      </div>
    </div>

    <?php
          $answNum = $answNum + 1;
          $qtn_no = $qtn_no + 1;
        }
        $trk = $trk + 1;
      }

    ?>

    <div class='relative w-full pb-4 h-10'>
      <input class='absolute inset-y-0 right-0 px-12 py-2 bg-blue-600 rounded-full text-gray-300 text-lg mr-8' name="mark" type="submit" value="Submit answer">
    </div>



  </form>


  <script>
    var myVar = setInterval(myTimer ,1000);
    function myTimer() {
      //var d = parseInt(document.getElementById("timeP").innerHTML);
      var d = document.getElementById("timeP").innerHTML;
      if(Number(d)){
        document.getElementById("timeP").innerHTML = d-1;
      }else{
        document.getElementById("timeP").innerHTML = "Time out";
      }
    }
  </script>

</body>
</html>
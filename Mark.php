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
$mark = 0;
$qtn = '';
$qtn_a = '';
$qtn_b = '';
$qtn_c = '';
$qtn_d = '';
$qtn_answer = '';
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
  <form action="QuizPage.php" method="post" class='w-5/6 float-right py-16 px-8'>

    <div class='pb-4'>
      <p class="font-medium text-2xl text-gray-900"> <?php echo $ass_title; ?> </p>
    </div>

    <?php 
      while($row = mysqli_fetch_array($search_result)){
        $qtn = $row['qtn'];
        $qtn_a = $row['qtn_answer1']; 
        $qtn_b = $row['qtn_answer2'];
        $qtn_c = $row['qtn_answer3'];
        $qtn_d = $row['qtn_answer4'];
        $qtn_answer = $row['qtn_correct_answer'];
        $co = "answer" .$answNum ."";
        if(isset($_POST[$co]))
          $answ[$answNum] = $_POST[$co];
        else
          $answ[$answNum] = 'E';

        if($answ[$answNum] == $qtn_answer)
          $mark = $mark + 1;

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
                  <p> <?php //echo $answ[$answNum] ?> </p>
                  <?php if($answ[$answNum] == 'A'){?>
                    <input type='radio' class='' checked disabled name='<?php echo "answer" .$answNum .""; ?>' value='A'> <label> <?php echo"$qtn_a" ?> </label><br>
                  <?php }else{ ?>
                    <input type='radio' class='' disabled name='<?php echo "answer" .$answNum .""; ?>' value='A'> <label> <?php echo"$qtn_a" ?> </label><br>
                  <?php } ?>

                  <?php if($answ[$answNum] == 'B'){?>
                    <input type='radio' class=''  disabled checked name='<?php echo "answer" .$answNum .""; ?>'> <label> <?php echo"$qtn_b" ?> </label><br>
                  <?php }else{ ?>
                    <input type='radio' class='' disabled name='<?php echo "answer" .$answNum .""; ?>'> <label> <?php echo"$qtn_b" ?> </label><br>
                  <?php } ?>

                  <?php if($answ[$answNum] == 'C'){?>
                    <input type='radio' class='' checked disabled name='<?php echo "answer" .$answNum .""; ?>'> <label> <?php echo"$qtn_c" ?> </label><br>
                  <?php }else{ ?>
                    <input type='radio' class='' disabled name='<?php echo "answer" .$answNum .""; ?>'> <label> <?php echo"$qtn_c" ?> </label><br>
                  <?php } ?>

                  <?php if($answ[$answNum] == 'D'){?>
                    <input type='radio' class='' checked disabled name='<?php echo "answer" .$answNum .""; ?>'> <label> <?php echo"$qtn_d" ?> </label><br>
                  <?php }else{ ?>
                    <input type='radio' class='' disabled name='<?php echo "answer" .$answNum .""; ?>'> <label> <?php echo"$qtn_d" ?> </label><br>
                  <?php } ?>
                </div>
              </div>
              <hr>
              <p class='bg-gray-200 px-8 py-4 font-semibold text-gray-500'> Correct answer is: <mark> <?php echo"$qtn_answer" ?> </mark> </p>
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

    <div class='bg-green-600 px-8 py-4 font-semibold text-white'> 
      <p class='text-2xl font-medium' style="text-align: center;"> Total mark: <mark> 
        <?php echo"$mark" ?> </mark> 
      </p>
      <?php 
        if($mark >= 7)
        {
      ?>
        <p class='text-2xl font-medium' style="text-align: center;"> Congradulations!!! </p>

      <?php 
        }else{
      ?>

        <p class='text-2xl font-medium' style="text-align: center;"> Sorry Please try again!!! </p>

      <?php 
        }
      ?>
    </div>
  </form>

  <?php

  $user = 'root';
  $password = '';
  $db = 'CLearn';

  //$con = new mysqli('localhost', $user, $password, $db) or die('Unable to connect to the database');

 //$search_query = "SELECT * FROM tutorials 
                  //WHERE user_reg_number = '$_SESSION["student_fullname"]'";

  //$search_result = mysqli_query($con, $search_query);

  //if($search_result){
    ///if(mysqli_num_rows($search_result)){
      //$search_query = "UPDATE tutorials 
             //         SET tutorial_1 = '$mark'
        //              WHERE user_reg_number = '$_SESSION["student_fullname"]'";

     // $search_result = mysqli_query($con, $search_query);

    //}else{
    //  echo 'Error, please try again';
   // }
  //}else{
  //  echo 'Error, please try again';
  //}

  ?>

  <div id="fillAd" class="w-full h-full 2xl:px-48 bg-green-2           00" style=";display: var(--dis); position: fixed; top:0px; ">
    <div class="pr-auto pl-auto">
      <div>
      <p class="ml-12">Please fill in the below form:</p>
        <form action="mailto:gordonsnekaz@gmail.com" method="post" enctype="text/plain" class="py-4 border rounded-sm p-4 md:w-1/2 ml-12">
          <fieldset>
            <label class="text-gray-600 font-semibold">Name:</label> <br> <input type="text" id="name" placeholder="Christabell Rego" class=" text-gray-700 w-1/2 border rounded-sm pl-4"><br><br>
            <label class="text-gray-600 font-semibold">Phone number:</label> <br> <input type="number" id="phone" placeholder="+263 771 128 679" class="text-gray-700 w-1/2 border rounded-sm pl-4"><br><br>
            <label class="text-gray-600 font-semibold">Email:</label> <br> <input type="email" required id="email" placeholder="help@munegos.com" class="text-gray-700 w-1/2 border rounded-sm pl-4"><br><br>
            <input style="text-align:center;" onclick="hello()" type="submit" value="Send message" class="w-full text-sm xl:text-xl py-1 rounded-md border-2 border-orange-600 mt-6" />
          </fieldset>
        </form>
      </div>
      <button onclick="hello()" class="text-sm xl:text-xl text-gray-100 mt-8 font-semibold px-8 py-2 rounded-md mt-4 bg-red-700 ml-12">Cancel</button> 
    </div>
  </div>


  <script>

    function hello(){
      var r = document.querySelector(':root');
      r.style.setProperty('--dis', 'none');
    }

  </script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="allCss.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CLearn</title>
  <style>
    #msgBox{
      overflow-y: auto;
      overflow-x: hidden;
      outline: none;
      max-height: 50px;
      white-space: pre-wrap;
      min-height: 50px;
    }
  </style>
</head>
<body class='w-1/5'>
  <div class='container w-full bg-gray-300'>
    <!-- Header -->
    <div class='header w-full bg-gray-300 h-12 flex shadow-xl border-b border-gray-400'>
      <h2 class='text-lg font-semibold text-blue-700 py-2 px-4 w-full'>CLearn chat</h2>
      <div class="topnav">
        <h2 class='text-lg font-semibold text-red-700 py-2 px-4' id="log_out">X</h2>
      </div>
    </div>

    <!-- Body -->
    <div class='body_container w-full bg-gray-200 h-40'>
    
    </div>

    <!-- Footer -->
    <div class='footer w-full bg-blue-900 h-16 flex py-2'>
      <button class='text-xl font-bold text-white px-2' style='outline: none;'>></button>
      <div onclick='msg_blog()' class='bg-white rounded-full px-4'>
        <div id='msgBox' class="" contenteditable="true" spellcheck="true">Type your message here...</div>
      </div>
      <button class='text-xl font-bold text-white px-2' style='outline: none;'>>></button>
    </div>
  </div>


  <script>
    function msg_blog(){
      var msg = document.getElementById('msgBox').innerHTML;

      if(msg === 'Type your message here...')
        document.getElementById('msgBox').innerHTML = '';
    }
  </script>
</body>
</html>
<?php 
      while($row = mysqli_fetch_array($search_result)){
        $p_title = $row['project_title'];
        $p_description = $row['project_description']; 
        $p_time = $row['project_time'];
    ?>

    <a href="">
      <div class="bg-white rounded-md hover:bg-gray-200 overflow-hidden shadow px-4 py-6 mb-8 border border-gray-400">
        <div class=''>
          <div class="font-medium text-2xl text-teal-900 pb-4"><?php echo $p_title; ?></div>
          <p class="text-gray-700 text-lg">
            <?php echo $p_description; ?>
          </p>
          <p class='py-2'> <mark> <?php echo $p_time; ?> minutes</mark></p>
          <div class='relative w-full pb-4 h-10'>
            <p class='absolute inset-y-0 right-0 px-12 py-2 bg-blue-600 rounded-full text-gray-300 text-lg'>Start tutorial</p>
          </div>
        </div>
      </div>
    </a>

    <?php
      }

    ?>

<?php 
      while($row = mysqli_fetch_array($search_result)){
        $t_title = $row['project_title'];
        $t_description = $row['project_description']; 
        $t_time = $row['project_time'];
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
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/categoryplusscript.js"></script>
</head>
<body>
<div class="menu">
  <?php $page = 'genre'; ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
  <h1>ジャンル管理</h1>
  <form action="" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="box26">
      <span class="box-title">検索</span>
      <table class="ue">
        <tr>
          <td class="haba">ジャンルid</td>
          <td class="haba"> <input type="text" name="genreid" value=""></td>
        </tr>
        <tr>
          <td class="haba">ジャンル名</td>
          <td class="haba"><input type="text" name="genrename" value=""></td>
        </tr>
      </table>

      <br>
      <input type="submit" class="finer" formaction="<?php echo e(url('/GenreSearch')); ?>" name="search" value="検索">
    </div>
    <br>
    <input type="submit" class="bakaa" formaction="<?php echo e(url('/GenreEditPage')); ?>" name="edit" value="編集">
    <a class="bakxxx" href="<?php echo e(url('/GenreAddPage')); ?>">追加</a>
    <input type="submit" class="bakel" name="delete" formaction="<?php echo e(url('/GenreDelete')); ?>" value="削除"></br>
    

    <table>
      <tr>
        <th>ジャンルId</th>
        <th>ジャンル名</th>
        <th><input type="checkbox" id="checkAl">全選択</th>
      </tr>
      <?php
      $i=0;
      ?>
      <?php $__empty_1 = true; $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><?php echo e($data->GenreId); ?></td>
        <td><?php echo e($data->GenreName); ?></td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo e($data->GenreId); ?>"></td>
      </tr>
      <?php  $i++;  ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <p>No Genre Found</p>
    <?php endif; ?>
    </table>
    
  </form>
</div>
<script>
  $("#checkAl").click(function () {
  $('input:checkbox').not(this).prop('checked', this.checked);});
</script>
 </body>
</html>
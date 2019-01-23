<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="menu">
  <?php $page = 'brand'; ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
  <h1>ブランド管理</h1>
  <form action="" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="box24">
      <span class="box-title">検索</span>
      <table class="ue">
        
        <tr>
          <td class="haba">ブランドid</td>
          <td class="haba"><input type="text" name="brandid" value="" /></td>
        </tr>
        <tr>
          <td class="haba">メーカー名</td>
          <td class="haba"><input type="text" name="makername" value="" /></td>
        </tr>
        <tr>
          <td class="haba">ブランド名</td>
          <td class="haba"><input type="text" name="brandname" value="" /></td>
        </tr>
        <input type="submit" class="bakur" name="submit" formaction="<?php echo e(url('/BrandSearch')); ?>" value="検索" />
      </table>
      <br>
    </div>

    <br>
    <input type="submit" class="bakaa" name="edit" formaction="<?php echo e(url('/BrandEditPage')); ?>" value="編集">
    <input type="submit" class="bakl" name="save" formaction="<?php echo e(url('/BrandDelete')); ?>" value="削除">
    <a href="<?php echo e(url('/BrandAddPage')); ?>" class="bakee">追加</a></br>
    <table>
      <tr>
        <th>ブランドId</th>
        <th>メーカー名</th>
        <th>ブランド名</th>
        <th><input type="checkbox" id="checkAl">全選択</th>
      </tr>
      <?php $__empty_1 = true; $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><?php echo e($data->BrandId); ?></td>
        <td><?php echo e($data->MakerName); ?></td>
        <td><?php echo e($data->BrandName); ?></td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo e($data->BrandId); ?>"></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <p>No Brand Found</p>
      <?php endif; ?>
    </table>
  </form>
</div>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>

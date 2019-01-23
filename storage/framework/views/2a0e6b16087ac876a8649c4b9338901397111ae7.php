<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="menu">
  <?php $page = 'sale'; ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
  <h1>セール管理</h1>
  <form action="" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="box18">
      <span class="box-title">検索</span>
      <table class="ue">
        <tr>
          <td class="haba">セール名</td>
          <td class="haba"><input type="text" name="salename" value="" /></td>
        </tr>
        <tr>
          <td class="haba">セール開始日</td>
          <td class="haba"><input type="date" name="starttime" value="" /></td>
        </tr>
        <tr>
          <td class="haba">セール終了日</td>
          <td class="haba"> <input type="date" name="endtime" value="" /></td>
        </tr>
        <tr>
          <td class="haba">割引率</td>
          <td class="haba"><input type="text" name="discount" value="" />
            <select name="yen" value="">
              <option value="" style="display:none"></option>
              <option value="円">円</option>
              <option value="%">%</option>
            </select>
          </td>
        </tr>
        <input type="submit" class="finea" name="submit" formaction="<?php echo e(url('/SaleSearch')); ?>" value="検索" />
      </table>
    </div>
    <input type="submit" class="bakla" name="edit"   formaction="<?php echo e(url('/SaleEditPage')); ?>" value="編集" onClick="checkEditing()">
    <input type="submit" class="bakllllk" name="save" formaction="<?php echo e(url('/SaleDelete')); ?>" value="削除">
    <a href="<?php echo e(url('/SaleAddPage')); ?>" class="bakxxxx">追加</a></br>
    <table>
      <tr><th>セールId</th><th>セール名</th><th>金額</th><th>円or%</th><th>開始日付</th><th>終了日付</th><th><input type="checkbox" id="checkAl">全選択</th></tr>
      <?php $__empty_1 = true; $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
      <tr>
        <td><?php echo e($data->SaleId); ?></td>
        <td><?php echo e($data->SaleName); ?></td>
        <td><?php echo e($data->Discount); ?></td>
        <td><?php echo e($data->Attribute); ?></td>
        <td><?php echo e($data->StartTime); ?></td>
        <td><?php echo e($data->EndTime); ?></td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo e($data->SaleId); ?>"></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
      <p>No Maker Found</p>
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
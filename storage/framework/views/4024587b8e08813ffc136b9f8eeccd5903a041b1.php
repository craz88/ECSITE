<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style type="text/css">
  .baika table{
    margin-top:-50px;
  }
</style>
<body>
<div class="menu">
   <?php $page = 'salemanagment'; ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
  <h1>売価管理</h1>
  <form action="" method="post">
    <?php echo e(csrf_field()); ?>

    <div class="box28">
      <span class="box-title">検索</span>

      <table class="ue">
        <tr>
          <td class="haba">商品名</td>
          <td class="haba"><input type="text" name="productname" value="" /></td>
        </tr>
        <tr>
          <td class="haba">セール名</td>
          <td class="haba"><input type="text" name="salename" value="" /></td>
        </tr>
        <tr>
          <td class="haba">値段</td>
          <td class="haba"><input type="text" name="price" value="" /></td>
        </tr>
        <input type="submit" class="fined" name="submit" formaction="<?php echo e(url('/SaleOperationSearch')); ?>" value="検索" />
      </table>
    </div>
    <input type="submit" class="bakeee" name="edit" formaction="<?php echo e(url('/SaleOperationDelete')); ?>" value="削除">
    <br>
    <label class="baab">セール名:</label>
    <select name="saleid" class="baab2">
      <option value="">選択してください</option>
      <?php $__currentLoopData = $sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sales): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      @print('<option value="<?php echo e($sales->SaleId); ?>"><?php echo e($sales->SaleName); ?></option>');
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <input type="submit" class="baklll" name="insert" formaction="<?php echo e(url('/SaleInsert')); ?>" value="セール適用" /></br>
    <p class="color"></p>
    <table style="margin-top:-20px;">
      <tr>
        <th>商品ID</th>
        <th>商品名</th>
        <th>基本売価</th>
        <th>適用後売価</th>
        <th>適用セール名</th>
        <th><input type="checkbox" id="checkAl">全選択</th>
      </tr>
      <?php $i=0; ?>
      <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php $i++; ?>
      <tr>
        <td><?php echo e($data->ProductId); ?></td>
        <td><?php echo e($data->ProductName); ?></td>
        <td><?php echo e($data->Price); ?></td>
        <?php if(isset($data->discount)): ?>
        <td><?php echo e($data->Price-$data->discount); ?></td>
        <?php else: ?>
        <td></td>
        <?php endif; ?>
        <td><?php echo e($data->SaleName); ?></td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo e($data->ProductId); ?>"></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
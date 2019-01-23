<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="menu">
    <?php $page = 'salemanagment'; ?> <?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainparter">
  <h1>売価管理</h1>
  <form action="" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="submit" class="baklea" name="delete" formaction="/SaleOperationDeleteTwo" value="削除">    
   <table class="taber">
    <tr>
       <th>商品ID</th>
       <th>商品名</th>
       <th>基本売価</th>
       <th>値引情報</th>
       <th>\or%</th>
       <th>適用セール名</th>
       <th><input type="checkbox" id="checkAl">全選択</th>
    </tr>

    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
       <td><?php echo e($data->ProductId); ?></td>
       <input type="hidden" name="productid" value="<?php echo e($data->ProductId); ?>">
       <td><?php echo e($data->ProductName); ?></td>
       <td><?php echo e($data->Price); ?></td>
       <td><?php echo e($data->Discount); ?></td>
       <td><?php echo e($data->Attribute); ?></td>
       <td><?php echo e($data->SaleName); ?></td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo e($data->SaleId); ?>"></td>
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
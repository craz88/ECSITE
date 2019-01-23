<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新セール作成</title>
<link rel="stylesheet" href="css/genreAdd.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/saleedithing.js"></script>
</head>
<body>
<div class="menu">
	
	<?php $page = 'sale'; ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
	<form action="" method="post" name="saleinput"> 
	 <?php echo e(csrf_field()); ?>

	<input type="hidden" name="flagbox" value="0"> 

	<h1>セールの編集</h1>
	<div class="inputform">
		
		
		<br>	<br>	<br>	
		<label>セールId:<?php echo e($sale->SaleID); ?></label><br><br>
		<input type="hidden" name="saleid" value="<?php echo e($sale->SaleId); ?>">
		<label>セール名:</label><input type="text" name="salename" value="<?php echo e($sale->SaleName); ?>"> <br><br>
		<label>金額:</label><input type="text" name="discount" value="<?php echo e($sale->Discount); ?>"> <br><br>
		<label>円or％:</label><select name="yen">
  			<option value="<?php echo e($sale->Attribute); ?>"><?php echo e($sale->Attribute); ?></option>

  				<?php if($sale->Attribute=="円"): ?>
  					@print("<option value='%'>%</option>");
  				<?php else: ?>
  					print("<option value='円'>円</option>");
  				<?php endif; ?>
 		
		</select> <br><br>
		<label>開始日付:</label><input type="date" name="starttime" value="<?php echo e($sale->StartTime); ?>"> <br><br>
		<label>終了日付:</label><input type="date" name="endtime" value="<?php echo e($sale->EndTime); ?>"> 
		
	</div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit" id="edit" name="editt" formaction="<?php echo e(url('/SaleEdit')); ?>" value="更新" onClick="check()"> 
	</div>
    </form>
</div>
</body>
</html>
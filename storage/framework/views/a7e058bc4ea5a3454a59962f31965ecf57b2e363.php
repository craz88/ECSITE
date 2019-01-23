
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新ブランド作成</title>
<link rel="stylesheet" href="css/genreAdd.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/brandediting.js"></script>
</head>
</head>
<body>
<div class="menu">
	<?php $page = 'brand';  ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
	<form action="" method="post" name="brandinput"> 
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="flagbox" value="0">
		<h1>ブランドの編集</h1>
		<div class="inputform">
			<?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<br>	<br>	<br>	<br>	<br>
			<label>ブランドId:<?php echo e($data->BrandId); ?></label><br><br>	
			<input type="hidden" name="EditBrandId" value="<?php echo e($data->BrandId); ?>">
			<label>メーカ名:</label>
			<select name="EditMakerId" class="select">
				<option value="<?php echo e($data->MakerId); ?>"><?php echo e($data->MakerName); ?></option>
				<?php $__currentLoopData = $maker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $makers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				@print('<option value="<?php echo e($makers->MakerId); ?>"><?php echo e($makers->MakerName); ?></option>');
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
			</select>
			<br>	<br>	
			<label>ブランド名:</label><input type="text" name="EditBrandName" value="<?php echo e($data->BrandName); ?>">
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<div class="buttons">
			<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()">
			<input class="square_btn" type="submit"  name="editt"  formaction="<?php echo e(url('/BrandEdit')); ?>" value="更新" onClick="check()">
		</div>
	</form>
</div>
</body>
</html>
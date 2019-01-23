<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ECサイト</title>
<link rel="stylesheet" href="css/brandplus.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/brandplusscript.js"></script>
</head>
<body>
<div class="menu">
	<?php $page = 'brand';  ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
	<form action="" name="brandinput" method="post">
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="flagbox" value="0">
		<h1>ブランドの追加</h1>
		<div class="inputform">
			<div  class="selectiti">
				<br>	<br>	<br>
				<label>メーカー:</label>
				<select name="AddMakerId" class="select">
					<option value="">選択してください</option>
					<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					@print('<option value="<?php echo e($data->MakerId); ?>"><?php echo e($data->MakerName); ?></option>');
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>
			</div>
			<br><br>
			<label>ブランド名:</label><input type="text" name="AddBrandName">
		</div>
		<div class="buttons">
			<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
			<input class="square_btn" type="submit" id="tsuika" name="tsuika" formaction="<?php echo e(url('/BrandAdd')); ?>" value="追加" onClick="return check()"> 
		</div>
	</form>
</div>
</body>
</html>
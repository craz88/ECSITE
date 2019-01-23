<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新セール作成</title>
<link rel="stylesheet" href="css/genreAdd.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/productedithing.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
</head>
<body>
<div class="menu">
	<?php $page = 'product';?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
	<form action="" method="post" name="productinput">
		<?php echo e(csrf_field()); ?>

	<input type="hidden" name="flagbox" value="0"> 
	
	<h1>商品編集</h1>
	<div class="inputform">
		
		 <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<label>商品Id:<?php echo e($data->ProductId); ?></label><br><br>	

	
		<input type="hidden" name="editproductid" value="<?php echo e($data->ProductId); ?>">

		<label>商品名:</label><input type="text" name="editproductname" value="<?php echo e($data->ProductName); ?>"> <br>	<br>

		
				<label>ジャンル:</label>
				<select name="editgenreid" class="select">
					<option value="<?php echo e($data->GenreId); ?>"><?php echo e($data->GenreName); ?></option>
					<?php $__currentLoopData = $genre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				      <?php if($data->GenreId != $genres->GenreId): ?>
					      @print('<option value="<?php echo e($genres->GenreId); ?> "><?php echo e($genres->GenreName); ?></option>');
					  <?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
				</select>
		
			<br>
			<br>
			<div  class="selectiti">
				<label>メーカー:</label>
				<select name="country" class="country">
					
					<option value="<?php echo e($data->MakerId); ?>"><?php echo e($data->MakerName); ?></option>
					<?php $__currentLoopData = $maker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $makers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				      <?php if($data->MakerId !=$makers->MakerId): ?>	
					 @print('<option value="<?php echo e($makers->MakerId); ?> "><?php echo e($makers->MakerName); ?></option>');
					  <?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
				</select>
			</div>
			<br>
			<label>ブランド:</label>
      		<select name="state" class="form-control">
                   <option value="<?php echo e($data->BrandId); ?>"><?php echo e($data->BrandName); ?></option>

            </select> 
			<br>

		<br>
		<label>画像</label> <img style="width:30px; height:30px;" src="image/<?php echo e($data->Image); ?>"><br>		<br>
		<label>画像</label><input type="file" name="image" value="<?php echo e($data->Image); ?>"><br>	<br>
		<label>値段:</label><input type="text" name="price" value="<?php echo e($data->Price); ?>"><br>	<br> 
		<label>説明:</label> 
		<textarea name="detail"><?php echo e($data->Detail); ?></textarea>
		
	
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
	</div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit"  name="edit" formaction="<?php echo e(url('ProductEdit')); ?>" value="更新" onClick="check()"> 
	</div>
    </form>

<script src="<?php echo e(asset('js/custom.js')); ?>"></script>
</div>
</body>
</html>
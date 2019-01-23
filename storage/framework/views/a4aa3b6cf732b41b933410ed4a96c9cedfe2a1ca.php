<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新セール作成</title>
<link rel="stylesheet" href="css/genreAdd.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/saleplusscript.js"></script>
</head>
<body>
<div class="menu">
	
	<?php $page = 'sale'; ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
	<form action="" name="categoryinput" method="post"> 
		<?php echo e(csrf_field()); ?>

	<input type="hidden" name="flagbox" value="0"> 
	<h1>セールの追加</h1>
	<div class="inputform">
		
		<br>	<br>	<br>	<br>	<br>
		<label>セール名:</label><input type="text" name="salename"><br><br>
		<label>値引き情報:</label><input type="text" name="discount">
		<select name="yen">
  			<option value="円">円</option>
 			<option value="%">%</option>
  			
		</select>
		<br>	<br>	
		<label>開始時刻:</label><input type="date" name="starttime"><br><br>	
		<label>終了時刻:</label><input type="date" name="endtime">

	</div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit" id="tsuika" name="tsuika" formaction="<?php echo e(url('/SaleAdd')); ?>"  value="追加" onClick="return check()"> 
	</div>
    </form>
</div>
</body>
</html>
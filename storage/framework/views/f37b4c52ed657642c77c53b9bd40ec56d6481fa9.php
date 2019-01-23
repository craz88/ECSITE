<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新ジャンル作成</title>
<link rel="stylesheet" href="css/genreAdd.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/genreplusscript.js"></script>
</head>
<body>
<div class="menu">
	<?php $page = 'genre';?> <?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<div class="mainpart">
	<form action="" name="genreinput" method="post"> 
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="flagbox" value="0"> 
		<h1>ジャンルの追加</h1>
		<div class="inputform">
			<br>	<br>	<br>	<br>	<br>	<br>	<br>	<br>	<p class="color"></p>
			<span><label>ジャンル名:</label><input type="text"  class="AddGenreName" name="AddGenreName"></span> 
		</div>
		<div class="buttons">
			<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()">
			<input class="square_btn" type="submit" id="tsuika" name="add" formaction="<?php echo e(url('/GenreAdd')); ?>" value="追加" onClick="check()">
		</div>
	</form>
</div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新メーカー作成</title>
<link rel="stylesheet" href="css/makerplus.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/makerplusscript.js"></script>
</head>
<body>
<div class="menu">
	<?php $page = 'maker'; ?><?php echo $__env->make('menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
</div>
<div class="mainpart">
	<form action="" name="makerinput" method="post">
		<?php echo e(csrf_field()); ?>

	<input type="hidden" name="flagbox" value="0"> 
    <h1>メーカーの追加</h1>
    <div class="inputform">
    	
    	<label>メーカー名:</label><input type="text" name="AddMakerName"> 
    </div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit" id="tsuika" formaction="<?php echo e(url('/MakerAdd')); ?>" name="tsuika" value="追加" onClick="return check()"> 
	</div>
    </form>
</div>
</body>
</html>
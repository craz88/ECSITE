
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
	<?php $page = 'maker'; ?>@include('menu') 
</div>
<div class="mainpart">
	<form action="" name="makerinput" method="post">
		{{ csrf_field() }}
	<input type="hidden" name="flagbox" value="0"> 
    <h1>メーカーの追加</h1>
    <div class="inputform">
    	
    	<label>メーカー名:</label><input type="text" name="AddMakerName"> 
    </div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit" id="tsuika" formaction="{{ url('/MakerAdd') }}" name="tsuika" value="追加" onClick="return check()"> 
	</div>
    </form>
</div>
</body>
</html>
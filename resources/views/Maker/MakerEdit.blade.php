<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新メーカー作成</title>
<link rel="stylesheet" href="css/genreAdd.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/makerediting.js"></script>
</head>
<body>
<div class="menu">
	
	<?php $page = 'maker';?> @include('menu')
</div>
<div class="mainpart">
	<form action="/MakerEdit" method="post" name="makerinput"> 
		{{ csrf_field() }}
	
	<input type="hidden" name="flagbox" value="0"> 

	<h1>メーカーの編集</h1>
	<div class="inputform">
		<br>	<br>	<br>	<br>	<br>	<br>	
		<label>メーカーId:{{ $maker->MakerId }}</label><br>
		<input type="hidden" name="editmakerid" value="{{ $maker->MakerId }}"><br>
		<label>メーカー名:</label><input type="text" name="editmakername" value="{{ $maker->MakerName }}"> 
		
	</div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit"  name="editt" value="更新" onClick="check()"> 
	</div>
    </form>
</div>
</body>
</html>
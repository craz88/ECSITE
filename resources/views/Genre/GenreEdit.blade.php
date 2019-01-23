<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新ジャンル作成</title>
<link rel="stylesheet" href="css/genreAdd.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<script type="text/javascript" src="js/categoryediting.js"></script>
</head>
<body>
<div class="menu">
	<?php $page = 'genre';?> @include('menu')
</div>
<div class="mainpart">
	<form action="/GenreEdit" method="post" name="categoryinput">
		{{ csrf_field() }}
		<input type="hidden" name="flagbox" value="0"> 
		<h1>ジャンルの編集</h1>
		<div class="inputform">
		<br>	<br>	<br>	<br>	<br>	<br>
		<label>ジャンルId:</label>{{$genre->GenreId}}<br>
		<input type="hidden" name="editgenreid" value="{{$genre->GenreId}}"><br>
		<label>ジャンル名:</label><input type="text" name="editgenrename" value="{{$genre->GenreName}}"> 
		
	</div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit"  name="editt" value="更新" onClick="check()"> 
	</div>
    </form>
</div>
</body>
</html>
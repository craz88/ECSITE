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
	<?php $page = 'brand';  ?>@include('menu')
</div>
<div class="mainpart">
	<form action="" name="brandinput" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="flagbox" value="0">
		<h1>ブランドの追加</h1>
		<div class="inputform">
			<div  class="selectiti">
				<br>	<br>	<br>
				<label>メーカー:</label>
				<select name="AddMakerId" class="select">
					<option value="">選択してください</option>
					@foreach($datas as $data)
					@print('<option value="{{ $data->MakerId}}">{{ $data->MakerName }}</option>');
					@endforeach
				</select>
			</div>
			<br><br>
			<label>ブランド名:</label><input type="text" name="AddBrandName">
		</div>
		<div class="buttons">
			<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
			<input class="square_btn" type="submit" id="tsuika" name="tsuika" formaction="{{ url('/BrandAdd') }}" value="追加" onClick="return check()"> 
		</div>
	</form>
</div>
</body>
</html>
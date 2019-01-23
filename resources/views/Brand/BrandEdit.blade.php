
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
	<?php $page = 'brand';  ?>@include('menu')
</div>
<div class="mainpart">
	<form action="" method="post" name="brandinput"> 
		{{ csrf_field() }}
		<input type="hidden" name="flagbox" value="0">
		<h1>ブランドの編集</h1>
		<div class="inputform">
			@foreach($brand as $data)
			<br>	<br>	<br>	<br>	<br>
			<label>ブランドId:{{ $data->BrandId }}</label><br><br>	
			<input type="hidden" name="EditBrandId" value="{{ $data->BrandId }}">
			<label>メーカ名:</label>
			<select name="EditMakerId" class="select">
				<option value="{{ $data->MakerId }}">{{ $data->MakerName }}</option>
				@foreach($maker as $makers)
				@print('<option value="{{ $makers->MakerId  }}">{{ $makers->MakerName }}</option>');
				@endforeach	
			</select>
			<br>	<br>	
			<label>ブランド名:</label><input type="text" name="EditBrandName" value="{{ $data->BrandName }}">
			@endforeach
		</div>
		<div class="buttons">
			<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()">
			<input class="square_btn" type="submit"  name="editt"  formaction="{{ url('/BrandEdit') }}" value="更新" onClick="check()">
		</div>
	</form>
</div>
</body>
</html>
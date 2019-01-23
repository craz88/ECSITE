<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>新商品作成</title>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/brandplus.css" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/productplusscript.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
</head>
<body>
<div class="menu">
	<?php $page = 'product';?>@include('menu')
</div>
<div class="mainpart">
	<form action="" name="productinput" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="flagbox" value="0">
		<h1>商品の追加</h1>
		<div class="inputform">
			<div  class="selectiti">
				<label>ジャンル:</label>
				<select id="AddGenreId" name="AddGenreId" class="select">
					<option value="">選択してください</option>
					@foreach ($genre as $genres)
					print('<option value="{{ $genres->GenreId }}">{{ $genres->GenreName }}</option>');
					@endforeach
				</select>
			</div><br>
			<div  class="selectiti">
				<label>メーカー:</label>
				<select name="country" class="country">
					<option >選択してください</option>
					@foreach ($maker as $makers)
					print('<option value="{{ $makers->MakerId }}">{{ $makers->MakerName }} </option>');
					@endforeach
				</select>
			</div>
			<br>
			<label>ブランド:</label>
      		<select name="state" class="form-control">
                   <option>--State--</option>

            </select> 

			<br>
			<label>商品名:</label><input type="text"  name="productname">
			<br><br>
			<input type="file" value="" id="image" name="image">
			<br>	
			<br>
			<label>基本価格:</label><input type="text"  name="price">
			<br>
			<br>
			<label>商品情報:</label><TEXTAREA cols=”30″ rows=”5″ id="detail" name="detail"></TEXTAREA>
		</div>
		<div class="buttons">
			<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()">
			<input class="square_btn" type="submit" id="tsuika" name="tsuika" formaction="{{ url('/ProductAdd') }}" value="追加" onClick="return check()">
		</div>
	</form>
<script src="{{ asset('js/custom.js') }}"></script>
</div>
</body>
</html>
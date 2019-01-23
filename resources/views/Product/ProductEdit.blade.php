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
	<?php $page = 'product';?>@include('menu')
</div>
<div class="mainpart">
	<form action="" method="post" name="productinput">
		{{ csrf_field() }}
	<input type="hidden" name="flagbox" value="0"> 
	
	<h1>商品編集</h1>
	<div class="inputform">
		
		 @foreach ($datas as $data)
		<label>商品Id:{{ $data->ProductId }}</label><br><br>	

	
		<input type="hidden" name="editproductid" value="{{ $data->ProductId }}">

		<label>商品名:</label><input type="text" name="editproductname" value="{{ $data->ProductName }}"> <br>	<br>

		
				<label>ジャンル:</label>
				<select name="editgenreid" class="select">
					<option value="{{ $data->GenreId }}">{{ $data->GenreName }}</option>
					@foreach ($genre as $genres)
				      @if ($data->GenreId != $genres->GenreId)
					      @print('<option value="{{ $genres->GenreId }} ">{{ $genres->GenreName }}</option>');
					  @endif
					@endforeach
					
				</select>
		
			<br>
			<br>
			<div class="selectiti">
				<label>メーカー:</label>
				<select name="country" class="country">
					
					<option value="{{ $data->MakerId }}">{{ $data->MakerName }}</option>
					@foreach ($maker as $makers)
				      @if ($data->MakerId !=$makers->MakerId)	
					 @print('<option value="{{ $makers->MakerId }} ">{{ $makers->MakerName }}</option>');
					  @endif
					@endforeach 
				</select>
			</div>
			<br>
			<label>ブランド:</label>
      		<select name="state" class="form-control">
                   <option value="{{ $data->BrandId }}">{{ $data->BrandName }}</option>

            </select> 
			<br>

		<br>
		<label>画像</label> <img style="width:30px; height:30px;" src="image/{{ $data->Image }}"><br>		<br>
		<label>画像</label><input type="file" name="image" value="{{ $data->Image }}"><br>	<br>
		<label>値段:</label><input type="text" name="price" value="{{ $data->Price }}"><br>	<br> 
		<label>説明:</label> 
		<textarea name="detail">{{ $data->Detail }}</textarea>
		
	
	@endforeach 
	</div>
	<div class="buttons">
		<input class="square_btn" type="button" id="back" name="back" value="キャンセル" onclick="history.back()"> 
		<input class="square_btn" type="submit"  name="edit" formaction="{{ url('ProductEdit') }}" value="更新" onClick="check()"> 
	</div>
    </form>

<script src="{{ asset('js/custom.js') }}"></script>
</div>
</body>
</html>
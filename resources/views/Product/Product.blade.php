<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
  th {white-space: nowrap;}
  td {white-space: nowrap;}
 </style>
</head>
<body>
 <div class="menu">
    <?php $page = 'product';?>@include('menu')
  </div>
  <div class="mainpart">
    <h1>商品管理</h1>
    <form action="" method="post">
      {{ csrf_field() }}
    <br>
      <div class="box5">
        <span class="box-title">検索</span>
        <p>
         <table class="ue">
          <tr>
            <td class="haba">商品名</td>
            <td class="haba"><input type="text" name="productname" value="" /></td>
          </tr>
          <tr>
            <td class="haba">ジャンル名</td>
            <td class="haba"><input type="text" name="genrename" value="" /></td>
          </tr>

            <tr>
            <td class="haba">メーカー名</td>
            <td class="haba"><input type="text" name="makername" value="" /></td>
          </tr>
          <tr>
            <td class="haba">ブランド名</td>
            <td class="haba"><input type="text" name="brandname" value="" /></td>
          </tr>
          <tr>
            <td class="haba">料金</td>
            <td class="haba"><input type="text" name="price" value="" />
            </td>
          </tr>
        </table></p>
         <p> <input type="submit" name="submit" formaction="{{ url('/ProductSearch') }}" class="findj" value="検索" /></p>
      </div>
   
   <br>
      <input type="submit" class="bake" name="edit" formaction="{{ url('/ProductEditPage') }}" value="編集" >
      <input type="submit" class="bakle" name="save" formaction="{{ url('/ProductDelete') }}" value="削除">
      <a class="bakxx" href="{{ url('/ProductAddPage') }}">追加</a></br>
      
     <table width:500px">
        <tr><th>商品Id</th><th>商品名</th><th>画像</th><th>ジャンル名</th><th>メーカ名</th><th>ブランド名</th><th>値段</th><th>商品説明</th><th><input type="checkbox" id="checkAl">全選択</th></tr>
        @forelse ($datas as $data)
          <tr>
            <td>{{ $data->ProductId }}</td>
            <td>{{ $data->ProductName }}</td>
             <td><img style="width:50px height:50px;" src="image/{{ $data->Image }}"></td>
            <td>{{ $data->GenreName }}</td>
            <td>{{ $data->MakerName }}</td>
            <td>{{ $data->BrandName }}</td>
            <td>￥{{ $data->Price }}</td>
          <td><textarea value="" readonly="readonly">{{ $data->Detail }}</textarea></td>
            <td><input type="checkbox" id="checkItem" name="check[]" value="{{ $data->ProductId }}"></td>
          </tr>
            @empty
      <p>No Product Found</p>
    @endforelse
      </table>
    </form>
  </div>
  <script>
    $("#checkAl").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
    });
  </script>
</body>
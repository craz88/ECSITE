<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/categoryplusscript.js"></script>
</head>
<body>
<div class="menu">
  <?php $page = 'genre'; ?>@include('menu')
</div>
<div class="mainpart">
  <h1>ジャンル管理</h1>
  <form action="" method="post">
    {{ csrf_field() }}
    <div class="box26">
      <span class="box-title">検索</span>
      <table class="ue">
        <tr>
          <td class="haba">ジャンルid</td>
          <td class="haba"> <input type="text" name="genreid" value=""></td>
        </tr>
        <tr>
          <td class="haba">ジャンル名</td>
          <td class="haba"><input type="text" name="genrename" value=""></td>
        </tr>
      </table>

      <br>
      <input type="submit" class="finer" formaction="{{ url('/GenreSearch') }}" name="search" value="検索">
    </div>
    <br>
    <input type="submit" class="bakaa" formaction="{{ url('/GenreEditPage') }}" name="edit" value="編集">
    <a class="bakxxx" href="{{ url('/GenreAddPage') }}">追加</a>
    <input type="submit" class="bakel" name="delete" formaction="{{ url('/GenreDelete') }}" value="削除"></br>
    

    <table>
      <tr>
        <th>ジャンルId</th>
        <th>ジャンル名</th>
        <th><input type="checkbox" id="checkAl">全選択</th>
      </tr>
      <?php
      $i=0;
      ?>
      @forelse ($datas as $data)
      <tr>
        <td>{{ $data->GenreId }}</td>
        <td>{{ $data->GenreName }}</td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="{{ $data->GenreId }}"></td>
      </tr>
      <?php  $i++;  ?>
      @empty
      <p>No Genre Found</p>
    @endforelse
    </table>
    
  </form>
</div>
<script>
  $("#checkAl").click(function () {
  $('input:checkbox').not(this).prop('checked', this.checked);});
</script>
 </body>
</html>
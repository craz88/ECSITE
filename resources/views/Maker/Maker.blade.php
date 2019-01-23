<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="menu">
  <?php $page = 'maker'; ?> @include('menu')
</div>
<div class="mainpart">
  <h1>メーカー管理</h1>
  <form action="" method="post">
    {{ csrf_field() }}
    <div class="box26">
        <span class="box-title">検索</span>
         <table class="ue">
          <tr>
            <td class="haba">メーカーid</td>
            <td class="haba"> <input type="text" name="makerid" value="" /></td>
          </tr>
          <tr>
            <td class="haba">メーカー名</td>
            <td class="haba"><input type="text" name="makername" value="" /></td>
          </tr></table>
     <br>
       <input type="submit" class="finer" name="submit" formaction="{{ url('/MakerSearch') }}" value="検索" />
      </div>
        <br>
         <input type="submit" class="balker" name="edit" formaction="{{ url('/MakerEditPage') }}" value="編集">
  
       <input type="submit" class="bakl" name="delete" formaction="{{ url('/MakerDelete') }}" value="削除">
       <a href="{{ url('/MakerAddPage') }}" class="bakee">追加</a></br>
       <table>
        <tr><th>メーカーId</th><th>メーカー名</th><th><input type="checkbox" id="checkAl">全選択</th></tr>
        <?php
        $i=0;?>
        @forelse ($datas as $data)
      <tr>
        <td>{{ $data->MakerId }}</td>
        <td>{{ $data->MakerName }}</td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="{{$data->MakerId}}"></td>
      </tr>
      <?php
      $i++;?>
       @empty
      <p>No Maker Found</p>
    @endforelse
    </table>
  </form>
</div>
<script>
  //全選択機能
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>

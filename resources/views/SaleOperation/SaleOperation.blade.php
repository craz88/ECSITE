<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style type="text/css">
  .baika table{
    margin-top:-50px;
  }
</style>
<body>
<div class="menu">
   <?php $page = 'salemanagment'; ?>@include('menu')
</div>
<div class="mainpart">
  <h1>売価管理</h1>
  <form action="" method="post">
    {{ csrf_field() }}
    <div class="box28">
      <span class="box-title">検索</span>

      <table class="ue">
        <tr>
          <td class="haba">商品名</td>
          <td class="haba"><input type="text" name="productname" value="" /></td>
        </tr>
        <tr>
          <td class="haba">セール名</td>
          <td class="haba"><input type="text" name="salename" value="" /></td>
        </tr>
        <tr>
          <td class="haba">値段</td>
          <td class="haba"><input type="text" name="price" value="" /></td>
        </tr>
        <input type="submit" class="fined" name="submit" formaction="{{ url('/SaleOperationSearch') }}" value="検索" />
      </table>
    </div>
    <input type="submit" class="bakeee" name="edit" formaction="{{ url('/SaleOperationDelete') }}" value="削除">
    <br>
    <label class="baab">セール名:</label>
    <select name="saleid" class="baab2">
      <option value="">選択してください</option>
      @foreach ($sale as $sales)
      @print('<option value="{{ $sales->SaleId }}">{{ $sales->SaleName }}</option>');
      @endforeach
    </select>
    <input type="submit" class="baklll" name="insert" formaction="{{ url('/SaleInsert') }}" value="セール適用" /></br>
    <p class="color"></p>
    <table style="margin-top:-20px;">
      <tr>
        <th>商品ID</th>
        <th>商品名</th>
        <th>基本売価</th>
        <th>適用後売価</th>
        <th>適用セール名</th>
        <th><input type="checkbox" id="checkAl">全選択</th>
      </tr>
      <?php $i=0; ?>
      @foreach ($product as $data)
      <?php $i++; ?>
      <tr>
        <td>{{ $data->ProductId }}</td>
        <td>{{ $data->ProductName }}</td>
        <td>{{ $data->Price }}</td>
        @if(isset($data->discount))
        <td>{{ $data->Price-$data->discount }}</td>
        @else
        <td></td>
        @endif
        <td>{{ $data->SaleName }}</td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="{{ $data->ProductId }}"></td>
      </tr>
      @endforeach
    </table>
  </form>
</div>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>
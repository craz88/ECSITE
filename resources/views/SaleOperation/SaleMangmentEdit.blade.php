<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/menu.css" type="text/css">
<link rel="stylesheet" href="css/genre.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="menu">
    <?php $page = 'salemanagment'; ?> @include('menu')
</div>
<div class="mainparter">
  <h1>売価管理</h1>
  <form action="" method="post">
    {{ csrf_field() }}
    <input type="submit" class="baklea" name="delete" formaction="/SaleOperationDeleteTwo" value="削除">    
   <table class="taber">
    <tr>
       <th>商品ID</th>
       <th>商品名</th>
       <th>基本売価</th>
       <th>値引情報</th>
       <th>\or%</th>
       <th>適用セール名</th>
       <th><input type="checkbox" id="checkAl">全選択</th>
    </tr>

    @foreach ($datas as $data)

    <tr>
       <td>{{ $data->ProductId }}</td>
       <input type="hidden" name="productid" value="{{ $data->ProductId }}">
       <td>{{ $data->ProductName }}</td>
       <td>{{ $data->Price }}</td>
       <td>{{ $data->Discount }}</td>
       <td>{{ $data->Attribute }}</td>
       <td>{{ $data->SaleName }}</td>
        <td><input type="checkbox" id="checkItem" name="check[]" value="{{ $data->SaleId }}"></td>
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
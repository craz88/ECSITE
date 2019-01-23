<ul>
  <li>
  	<a <?php  echo ($page == 'product') ? "class='active'" : ""; ?> href="{{ action('ProductController@index') }}">商品</a>
  </li>
  <li>
  	<a <?php echo ($page == 'genre') ? "class='active'" : ""; ?> href="{{ action('GenreController@index') }}">ジャンル</a>
  </li>
  <li>
  	<a <?php echo ($page == 'maker') ? "class='active'" : ""; ?> href="{{ action('MakerController@index') }}">メーカ</a>
  </li>
  <li>
    <a <?php echo ($page == 'brand') ? "class='active'" : ""; ?> href="{{ action('BrandController@index') }}">ブランド</a>
  </li>
  <li>
  	<a <?php echo ($page == 'salemanagment') ? "class='active'" : ""; ?> href="{{ action('SaleOperationController@index') }}">売価</a>
  </li>
  <li><a <?php echo ($page == 'sale') ? "class='active'" : ""; ?> href="{{ action('SaleController@index') }}">セール管理</a>
  </li>
  <li>
  	<a <?php  echo ($page == 'logout') ? "class='active'" : ""; ?> href="{{ action('LoginController@index') }}">ログアウト</a>
  </li>
</ul>




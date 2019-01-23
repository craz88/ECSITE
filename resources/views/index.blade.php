<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>サンプルアプリケーション</title>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="login-page">
<div class="form">
  <h1>Welcome</h1>
  <form class="login-form" name="loginForm" action="/login" method="POST">
  	{{ csrf_field() }}
    <br>
    <label for="userid">ユーザID</label><input type="text" id="userid" name="username" value="">
    <br>
    <label for="password">パスワード</label><input type="password" id="password" name="password" value="">
    <br>
    <input class="buttonn" type="submit" id="login" name="login" value="ログイン">
  </form>
</div>
</div>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
</head>
<body>
<h3>Вход</h3>
<form action="/auth" method="post">
    Логин: <input type="text" name="login"><br>
    Пароль: <input type="password" name="pass"><br>
    <button type="submit">Войти</button>
</form>
<br>

<a href="/signup">Рега</a>
</body>
</html>
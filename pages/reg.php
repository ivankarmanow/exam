<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<h3>Регистрация</h3>
<form action="/reg" method="post">
    Логин: <input type="text" name="login"><br>
    Пароль: <input type="password" name="pass"><br>
    Повторите пароль: <input type="password" name="pass2"><br>
    <button type="submit">Зарегистрироваться</button>
</form>
<br>
<a href="/signin">Войти</a>
</body>
</html>
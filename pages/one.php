<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data->name ?></title>
</head>
<body>
    <h1><?= $data->name ?></h1>
    Возраст: <?= $data->age ?> <br>
    <?php if ($data->cool) {
        ?> Очень крут! <?php
    } else {
        echo "Пока что ещё лох";
    } ?>
    <?php
    if ($_SESSION['is_admin']) {
    ?>
<br><br>
    <form action="/edit" method="POST">
        <input type="hidden" value="<?= $data->id ?>" name="id">
        Имя: <input type="text" name="name" id="name" required value="<?= $data->name ?>"><br>
        Возраст: <input type="number" name="age" id="age" min="0" max="100" step="1" required value="<?= $data->age ?>"><br>
        Крутой? <input type="checkbox" name="cool"  value="<?= $data->cool ?>"><br>
        <button type="submit">Изменить</button>
    </form>
    <br>
    <form action="/delete" method="POST">
        <input type="hidden" value="<?= $data->id ?>" name="id">
        <button type="submit">Удалить</button>
    </form>
<?php } ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Все</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<?php if (isset($_SESSION['login'])) { ?>
    <?= $_SESSION['login'] ?><br>Админ: <?= $_SESSION['is_admin'] ?><br><a href="/logout">Выйти</a>
<?php } else { ?>
    <a href="/signin">Войти</a>
<?php } ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Возраст</th>
            <th>Крутой?</th>
        </tr>
        <?php 
            foreach ($data as $obj) {
                ?>
                    <tr <?php if ($_SESSION['is_admin']) { ?> style="cursor: pointer" onclick="window.location.href = '/one?id=<?= $obj->id ?>'" <?php } ?>>
                        <td><?= $obj->id ?></td>
                        <td><?= $obj->name ?></td>
                        <td><?= $obj->age ?></td>
                        <td><?php 
                            if ($obj->cool == 0) {
                                echo "Нет";
                            } else {
                                echo 'Да';
                            }
                        ?></td>
                    </tr>
                <?php
            }
        ?>
    </table>
    <?php
    if ($_SESSION['is_admin']) {
    ?>
    <h1>Добавить пользователя</h1>
    <form action="/add" method="POST">
        Имя: <input type="text" name="name" id="name" required><br>
        Возраст: <input type="number" name="age" id="age" min="0" max="100" step="1" required><br>
        Крутой? <input type="checkbox" name="cool">
        <button type="submit">Создать</button>
    </form>
<?php } ?>
</body>
</html>
<?php

class Controller {
    public static function index() {
        $data = Model::select("SELECT * FROM students");
        require_once "pages/list.php";
    }

    public static function one() {
        $id = $_GET['id'];
        $data = Model::select("SELECT * FROM students WHERE id = $id")[0];
        require_once "pages/one.php";
    }

    public static function signin() {
        require_once "pages/auth.php";
    }

    public static function signup() {
        require_once "pages/reg.php";
    }

    public static function logout() {
        unset($_SESSION['login']);
        $_SESSION['is_admin'] = false;
        header("Location: /");
    }

    public static function add() {
        $name = $_POST["name"];
        $age = $_POST["age"];
        if (isset($_POST['cool'])) {
            $cool = 1;
        } else {
            $cool = 0;
        }
        Model::execute("INSERT INTO students (`name`, age, cool) VALUES ('$name', $age, $cool);");
        header("Location: /");
    }

    public static function edit() {
        $id = $_POST['id'];
        $name = $_POST["name"];
        $age = $_POST["age"];
        if (isset($_POST['cool'])) {
            $cool = 1;
        } else {
            $cool = 0;
        }
        Model::execute("UPDATE students SET name = '$name', age = $age, cool = $cool WHERE id = $id;");
        header("Location: /");
    }

    public static function delete() {
        $id = $_POST['id'];
        Model::execute("DELETE FROM students WHERE id = $id");
        header("Location: /");
    }

    public static function auth() {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $pass = md5($pass);
        $user = Model::select("SELECT * FROM users WHERE login = '$login' AND password = '$pass';");
        if ($user) {
            $_SESSION['login'] = $login;
            $_SESSION['is_admin'] = $user[0]->is_admin;
            header("Location: /");
        } else {
            header("Location: /signin");
        }
    }

    public static function reg() {
        $login = $_POST['login'];
        $password = $_POST['pass'];
        $password2 = $_POST['pass2'];
        if ($password == $password2) {
            if (Model::select("SELECT * FROM users WHERE login = '$login'")) {
                header("Location: /signup");
            } else {
                $password = md5($password);
                Model::execute("INSERT INTO users (login, password) VALUES ('$login', '$password')");
                $_SESSION['login'] = $login;
                $_SESSION['is_admin'] = false;
                header("Location: /");
            }
        } else {
            header("Location: /signup");
        }
    }
}
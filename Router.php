<?php

class Router {
    private array $routes;

    public function __construct() {
        $this->routes = [
            "GET" => [],
            "POST" => []
        ];
    }

    public function register(string $method, string $path, callable $callback, int $role = 0) {
        $this->routes[$method][$path] = [$callback, $role];
    }

    public function get(string $path, callable $callback, int $role = 0) {
        $this->register("GET", $path, $callback, $role);
    }

    public function post(string $path, callable $callback, int $role = 0) {
        $this->register("POST", $path, $callback, $role);
    }

    public function handle() {
        session_start();
        Model::init();
        if (empty($_SESSION)) {
            $_SESSION['is_admin'] = false;
        }
        $path = explode("?", $_SERVER['REQUEST_URI'])[0];
        try {
            $callback = $this->routes[$_SERVER['REQUEST_METHOD']][$path];
            if (!isset($_SESSION['login'])) {
                $role = 0;
            } elseif (!$_SESSION['is_admin']) {
                $role = 1;
            } else {
                $role = 2;
            }
            if ($role >= $callback[1]) {
                $callback[0]();
            } else {
                header("Location: /");
            }
        } catch (Exception $e) {
            header("Location: /");
        }
    }
}
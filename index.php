<?php

require_once "Router.php";
require_once "Model.php";
require_once "Controller.php";

$router = new Router();

$router->get("/", [Controller::class, "index"]);
$router->get("/one", [Controller::class, "one"], 1);
$router->get("/signin", [Controller::class, "signin"]);
$router->get("/signup", [Controller::class, "signup"]);
$router->get("/logout", [Controller::class, "logout"], 1);

$router->post("/add", [Controller::class, "add"], 2);
$router->post("/edit", [Controller::class, "edit"], 2);
$router->post("/delete", [Controller::class, "delete"], 2);
$router->post("/auth", [Controller::class, "auth"]);
$router->post("/reg", [Controller::class, "reg"]);

$router->handle();

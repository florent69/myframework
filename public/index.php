<?php

require __DIR__ . "/../vendor/autoload.php";

use \Core\Request;
use \Core\Router\Router;
use \Core\Router\Route;
use duncan3dc\Laravel\Blade;



$request = Request::createFromGlobals();

$router = new Router($request);

try {
    $router
        ->addRoute(new Route("home", "/", [], \App\Controller\HomeController::class, "index"))
        ->addRoute(new Route("testMyself", "/tests/testMyself", [], \App\Controller\MyController::class, "testMyself"))

        ->addRoute(new Route("testsFoo", "/tests/foo", [], \App\Controller\TestsController::class, "foo"))
        ->addRoute(new Route("testsBar", "/tests/bar/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "bar"))
        ->addRoute(new Route("testsRedirection", "/redirection/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "redirection"))
        ->addRoute(new Route("index", "/index", [], \App\Controller\UsersController::class, "index"))
        ->addRoute(new Route("login", "/login", [], \App\Controller\UsersController::class, "login"))
        ->addRoute(new Route("logout", "/logout", [], \App\Controller\UsersController::class, "logout"))
    ;


    $route = $router->getRouteByRequest();
    $route->call($request, $router);
} catch (\Exception $e) {
    echo $e->getMessage();
}
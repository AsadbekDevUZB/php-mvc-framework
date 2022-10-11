<?php

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\Application;

    require_once __DIR__."/../vendor/autoload.php";
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    $config = [
        'userClass'=>\app\models\User::class,
        'db'=>[
            'dsn'=>$_ENV['DB_DSN'],
            'user'=>$_ENV['DB_USER'],
            'password'=>$_ENV['DB_PASSWORD'],
        ]
    ];

    $app = new Application(dirname(__DIR__),$config);

    $app->route->get('/',[SiteController::class,'home']);

    $app->route->get('/contact',[SiteController::class,'contact']);
    $app->route->post('/contact',[SiteController::class,'contact']);

    $app->route->get('/register',[AuthController::class,'register']);
    $app->route->post('/register',[AuthController::class,'register']);

    $app->route->get('/login',[AuthController::class,'login']);
    $app->route->post('/login',[AuthController::class,'login']);

    $app->route->get('/logout',[AuthController::class,'logout']);

    $app->route->get('/profile',[AuthController::class,'profile']);

    $app->run();
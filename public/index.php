<?php
declare(strict_types=1);

use App\Core\Router;
use App\Controllers\HomeController;
use App\Controllers\BlogController;
use App\Controllers\GalleryController;
use App\Controllers\ContactController;
use App\Controllers\AuthController;
use App\Controllers\AdminArticleController;

// front controller - jediný vstup
require dirname(__DIR__) . '/autoload.php';

$config = require dirname(__DIR__) . '/config/config.php';

if ($config['app']['debug']) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

session_start();

$router = new Router();

// public
$router->get('/',                     [HomeController::class,    'index']);
$router->get('/o-nas',                [HomeController::class,    'about']);
$router->get('/blog',                 [BlogController::class,    'index']);
$router->get('/blog/{slug}',          [BlogController::class,    'show']);
$router->post('/blog/{slug}/comment', [BlogController::class,    'comment']);
$router->get('/galeria',              [GalleryController::class, 'index']);
$router->get('/kontakt',              [ContactController::class, 'show']);
$router->post('/kontakt',             [ContactController::class, 'send']);
$router->get('/dakujeme',             [ContactController::class, 'thanks']);

// login
$router->get('/admin/login',  [AuthController::class, 'showLogin']);
$router->post('/admin/login', [AuthController::class, 'login']);
$router->get('/admin/logout', [AuthController::class, 'logout']);

// admin CRUD
$router->get('/admin',                       [AdminArticleController::class, 'index']);
$router->get('/admin/articles',              [AdminArticleController::class, 'index']);
$router->get('/admin/articles/create',       [AdminArticleController::class, 'create']);
$router->post('/admin/articles/create',      [AdminArticleController::class, 'store']);
$router->get('/admin/articles/{id}/edit',    [AdminArticleController::class, 'edit']);
$router->post('/admin/articles/{id}/edit',   [AdminArticleController::class, 'update']);
$router->post('/admin/articles/{id}/delete', [AdminArticleController::class, 'destroy']);

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri    = $_SERVER['REQUEST_URI'] ?? '/';
$base   = $config['app']['base_url'];

// odstránime prefix /slovakia-tour/public z URI
if ($base !== '' && str_starts_with($uri, $base)) {
    $uri = substr($uri, strlen($base)) ?: '/';
}

$router->dispatch($method, $uri);

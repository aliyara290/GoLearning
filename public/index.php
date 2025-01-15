<?php 
require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

$router = new Router();

require_once __DIR__ . '/../routes/web.php';

$router->setNotFound(function () {
    http_response_code(404);
    echo "404 - Page Not Found";
});

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
echo $url;
$router->resolve($url);
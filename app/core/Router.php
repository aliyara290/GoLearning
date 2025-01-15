<?php
namespace App\Core;

class Router {
    private $routes = [];
    private $notFound;

    public function addRoute(string $path, callable $callback): void {
        $this->routes[$path] = $callback;
    }

    public function setNotFound(callable $callback): void {
        $this->notFound = $callback;
    }

    public function resolve(string $url): void {
        if (array_key_exists($url, $this->routes)) {
            call_user_func($this->routes[$url]);
        } else {
            if ($this->notFound) {
                call_user_func($this->notFound);
            } else {
                echo "404 - Not Found";
            }
        }
    }
}

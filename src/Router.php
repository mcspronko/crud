<?php

declare(strict_types=1);

namespace Pronko\Crud;

class Router
{
    private const GET = 'GET';
    private const POST = 'POST';
    private array $routes = [];

    /**
     * @param string $route
     * @param callable|string $callback
     */
    public function get(string $route, callable|string $callback): void
    {
        $this->routes[] = [
            'path' => $route,
            'callback' => $callback,
            'method' => self::GET,
        ];
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @param string $route
     * @param callable|string $callback
     */
    public function post(string $route, callable|string $callback): void
    {
        $this->routes[] = [
            'path' => $route,
            'callback' => $callback,
            'method' => self::POST,
        ];
    }

    public function run(array $server): void
    {
        $match = null;

        $requestUri = parse_url($server['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $method = $server['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['path'] === $requestPath && $route['method'] === $method) {
                $match = $route['callback'];
                break;
            }
        }

        $request = new Request(array_merge($_GET, $_POST));
        $response = new Response();

        if (!$match) {
            $match = function (Request $request, Response $response) {
                $response->setBody('404 Not found!');
                return $response;
            };
        }

        if (is_string($match) && class_exists($match)) {
            $match = new $match();
        }
        call_user_func_array($match, [$request, $response]);

        $response->render();
    }
}

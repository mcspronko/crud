<?php

declare(strict_types=1);

namespace App;

use PHPUnit\Framework\TestCase;
use Pronko\Crud\Request;
use Pronko\Crud\Response;
use Pronko\Crud\Router;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        $this->router = new Router();
    }

    public function testGet(): void
    {
        $this->router->get('/', function () {});
        $this->assertNotEmpty($this->router->getRoutes());
    }

    public function testGetRoutesEmpty(): void
    {
        $this->assertEmpty($this->router->getRoutes());
    }

    public function testPost(): void
    {
        $route = 'create';
        $this->router->post($route, '');
        $routes = $this->router->getRoutes();
        $array = array_filter($routes, function ($value) use ($route) {
           return $value['path'] === $route;
        });

        $this->assertNotEmpty($array);
    }

    public function testRun(): void
    {
        $this->router->get('/', function () {});
        ob_start();
        $this->router->run([
            'REQUEST_URI' => '/test',
            'REQUEST_METHOD' => 'GET'
        ]);
        $result = ob_get_clean();

        $this->assertNotEmpty($result);
    }

    public function testRunWithBody(): void
    {
        $body = '<p>Hello</p>';
        $this->router->get('/', function (Request $request, Response $response) use ($body) {
            $response->setBody($body);
            return $response;
        });
        ob_start();
        $this->router->run([
            'REQUEST_URI' => '/',
            'REQUEST_METHOD' => 'GET'
        ]);
        $result = ob_get_clean();

        $this->assertEquals($body, $result);
    }
}

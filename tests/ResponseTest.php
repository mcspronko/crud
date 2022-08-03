<?php

declare(strict_types=1);

namespace Pronko\Crud\Test;

use PHPUnit\Framework\TestCase;
use Pronko\Crud\Response;

class ResponseTest extends TestCase
{
    private Response $response;

    protected function setUp(): void
    {
        $this->response = new Response();
    }

    public function testSetBody(): void
    {
        $this->response->setBody('<p>Hello</p>');
        $this->assertNotEmpty($this->response->getBody());
    }

    public function testRender(): void
    {
        $body = '<p>Hello World</p>';
        $this->response->setBody($body);
        ob_start();
        $this->response->render();
        $result = ob_get_clean();
        $this->assertEquals($body, $result);
    }

    public function testSetUrl(): void
    {
        $this->response->setUrl('/');
        $this->assertEquals('/', $this->response->getUrl());
    }
}

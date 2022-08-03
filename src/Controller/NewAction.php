<?php

declare(strict_types=1);

namespace Pronko\Crud\Controller;

use Pronko\Crud\Request;
use Pronko\Crud\Response;

class NewAction
{
    public function __invoke(Request $request, Response $response): Response
    {
        $response->setUrl('/edit');
        return $response;
    }
}

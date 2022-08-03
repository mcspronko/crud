<?php

declare(strict_types=1);

namespace Pronko\Crud\Controller;

use Pronko\Crud\Request;
use Pronko\Crud\Response;

class Create
{
    public function __invoke(Request $request, Response $response): Response
    {
        $params = $request->getParams();

        //save
        $response->setUrl('/');

        return $response;
    }
}
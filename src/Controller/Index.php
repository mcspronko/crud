<?php

declare(strict_types=1);

namespace Pronko\Crud\Controller;

use Pronko\Crud\Request;
use Pronko\Crud\Response;
use Pronko\Crud\View;

class Index
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        $view = new View();
        $response->setBody($view->render('index.phtml', [
            'name' => 'Max'
        ]));

        return $response;
    }
}

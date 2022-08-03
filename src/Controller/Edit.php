<?php

declare(strict_types=1);

namespace Pronko\Crud\Controller;

use Pronko\Crud\Request;
use Pronko\Crud\Response;
use Pronko\Crud\View;

class Edit
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response): Response
    {
        $view = new View();
        $params = $request->getParams();
        if (!empty($params['user_id'])) {
//            $response->setUrl('/');
//            return $response;
        }

        $user = [];

        $response->setBody($view->render('edit.phtml', [
            'user' => $user
        ]));

        return $response;
    }
}

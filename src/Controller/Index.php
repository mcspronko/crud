<?php

declare(strict_types=1);

namespace Pronko\Crud\Controller;

use Pronko\Crud\Database;
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
        $pdo = Database::get();

        $statement = $pdo->query('SELECT * FROM user ORDER BY created_at DESC');
        $users = $statement->fetchAll();
        $response->setBody($view->render('index.phtml', [
            'users' => $users
        ]));

        return $response;
    }
}

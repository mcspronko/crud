<?php

declare(strict_types=1);

namespace Pronko\Crud\Controller;

use Pronko\Crud\Database;
use Pronko\Crud\Request;
use Pronko\Crud\Response;

class Create
{
    public function __invoke(Request $request, Response $response): Response
    {
        $params = $request->getParams();

        $pdo = Database::get();

//        $pdo->exec("
//            CREATE TABLE IF NOT EXISTS user (
//                user_id INT AUTO_INCREMENT PRIMARY KEY,
//                firstname VARCHAR(255),
//                lastname VARCHAR(255),
//                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//            ) ENGINE=INNODB;
//        ");

//        $sql = "INSERT INTO user (firstname, lastname) VALUES (?,?)";
//        $stmt= $pdo->prepare($sql);
//        $stmt->execute(['john', 'doe']);

//        foreach ($pdo->query("SELECT * FROM user") as $row) {
//            var_dump($row);
//        }
//        $response->setUrl('/');

        return $response;
    }
}

<?php

declare(strict_types=1);

use Pronko\Crud\Controller\Create;
use Pronko\Crud\Controller\Delete;
use Pronko\Crud\Controller\Edit;
use Pronko\Crud\Controller\Index;
use Pronko\Crud\Controller\Update;
use Pronko\Crud\Router;

require 'vendor/autoload.php';

$router = new Router();

$router->get('/', Index::class);
$router->get('/edit', callback: Edit::class);

$router->post('/create', callback: Create::class);
$router->post('/update', callback: Update::class);
$router->post('/delete', callback: Delete::class);

$router->run($_SERVER);

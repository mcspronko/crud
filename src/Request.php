<?php

declare(strict_types=1);

namespace Pronko\Crud;

class Request
{
    public function __construct(
        private array $params = []
    ) {}

    public function getParams(): array
    {
        return $this->params;
    }
}

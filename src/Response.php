<?php

declare(strict_types=1);

namespace Pronko\Crud;

class Response
{
    public function __construct(
        private string $body = '',
        private string $url = '',
    ) {
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function render(): void
    {
        if (!empty($this->url)) {
            header('Location: http://localhost:9999' . $this->url);
            exit;
        }
        echo $this->body;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
}

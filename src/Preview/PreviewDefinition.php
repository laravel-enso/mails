<?php

namespace LaravelEnso\Mails\Preview;

class PreviewDefinition
{
    public function __construct(
        private string $key,
        private string $name,
        private string $view,
        private array $data = [],
    ) {
    }

    public function key(): string
    {
        return $this->key;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function view(): string
    {
        return $this->view;
    }

    public function data(): array
    {
        return $this->data;
    }
}

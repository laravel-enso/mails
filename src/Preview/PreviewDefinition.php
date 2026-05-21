<?php

namespace LaravelEnso\Mails\Preview;

class PreviewDefinition
{
    public const Boilerplates = 'boilerplates';
    public const Core = 'core';
    public const AppSpecific = 'app-specific';
    public const ProjectSpecific = self::AppSpecific;

    public function __construct(
        private string $key,
        private string $name,
        private string $view,
        private array $data = [],
        private string $section = self::AppSpecific,
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

    public function section(): string
    {
        return $this->section;
    }

    public static function sections(): array
    {
        return [
            self::Boilerplates => 'Boilerplates',
            self::Core => 'Core',
            self::AppSpecific => 'App Specific',
        ];
    }
}

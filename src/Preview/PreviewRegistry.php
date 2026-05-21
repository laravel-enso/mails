<?php

namespace LaravelEnso\Mails\Preview;

use Illuminate\Support\Collection;

class PreviewRegistry
{
    private Collection $previews;

    public function __construct()
    {
        $this->previews = new Collection();
    }

    public function register(PreviewDefinition $preview): self
    {
        $this->previews->put($preview->key(), $preview);

        return $this;
    }

    public function all(): Collection
    {
        return $this->previews;
    }

    public function sections(): Collection
    {
        $groups = $this->previews->groupBy(fn (PreviewDefinition $preview) => $preview->section());

        return Collection::make(PreviewDefinition::sections())
            ->map(fn (string $name, string $key) => [
                'key' => $key,
                'name' => $name,
                'previews' => $groups->get($key, new Collection())
                    ->sortBy(fn (PreviewDefinition $preview) => $preview->name())
                    ->values(),
            ])
            ->filter(fn (array $section) => $section['previews']->isNotEmpty())
            ->values();
    }

    public function get(string $key): ?PreviewDefinition
    {
        return $this->previews->get($key);
    }
}

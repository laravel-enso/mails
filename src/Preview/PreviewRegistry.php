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

    public function get(string $key): ?PreviewDefinition
    {
        return $this->previews->get($key);
    }
}

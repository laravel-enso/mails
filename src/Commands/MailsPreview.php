<?php

namespace LaravelEnso\Mails\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use LaravelEnso\Mails\Preview\PreviewDefinition;
use LaravelEnso\Mails\Preview\PreviewRegistry;

class MailsPreview extends Command
{
    protected $signature = 'enso:mails:preview
        {preview? : The preview key to render}
        {--list : List available previews}
        {--output= : Directory where rendered HTML previews should be written}';

    protected $description = 'List or render Laravel Enso mail previews';

    public function handle(PreviewRegistry $registry, Markdown $markdown): int
    {
        if ($this->option('list') || $this->argument('preview') === null && $this->option('output') === null) {
            return $this->list($registry);
        }

        $previews = $this->previews($registry);

        if ($previews->isEmpty()) {
            $this->error('No matching mail preview was found.');

            return self::FAILURE;
        }

        $output = $this->option('output');

        if ($output === null) {
            $previews->each(fn (PreviewDefinition $preview) => $this->line(
                $markdown->render($preview->view(), $preview->data())->toHtml()
            ));

            return self::SUCCESS;
        }

        File::ensureDirectoryExists($output);

        File::put("{$output}/index.html", $this->index($previews));

        $previews->each(function (PreviewDefinition $preview) use ($markdown, $output) {
            File::put(
                "{$output}/{$preview->key()}.html",
                $markdown->render($preview->view(), $preview->data())->toHtml(),
            );

            $this->line("Rendered {$preview->key()}");
        });

        return self::SUCCESS;
    }

    private function index(Collection $previews): string
    {
        $sections = $this->sections($previews)
            ->map(function (array $section) {
                $links = $section['previews']
                    ->map(fn (PreviewDefinition $preview) => sprintf(
                        '<a class="enso-mails-preview__link" href="%s.html">%s<span class="enso-mails-preview__meta">%s</span><span class="enso-mails-preview__meta">%s</span></a>',
                        $preview->key(),
                        htmlspecialchars($preview->name(), ENT_QUOTES, 'UTF-8'),
                        htmlspecialchars($preview->key(), ENT_QUOTES, 'UTF-8'),
                        htmlspecialchars($preview->view(), ENT_QUOTES, 'UTF-8'),
                    ))
                    ->implode("\n");

                return sprintf(
                    '<section class="enso-mails-preview__section"><h2 class="enso-mails-preview__section-title">%s</h2><div class="enso-mails-preview__grid">%s</div></section>',
                    htmlspecialchars($section['name'], ENT_QUOTES, 'UTF-8'),
                    $links,
                );
            })
            ->implode("\n");

        $title = htmlspecialchars($this->title(), ENT_QUOTES, 'UTF-8');

        return <<<HTML
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$title}</title>
    <style>
        .enso-mails-preview {
            background: #eef3f8;
            color: #202938;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            margin: 0;
            padding: 40px;
        }

        .enso-mails-preview__main {
            margin: 0 auto;
            max-width: 1180px;
        }

        .enso-mails-preview__title {
            font-size: 24px;
            margin: 0 0 24px;
        }

        .enso-mails-preview__section {
            margin-top: 30px;
        }

        .enso-mails-preview__section:first-of-type {
            margin-top: 0;
        }

        .enso-mails-preview__section-title {
            font-size: 16px;
            margin: 0 0 12px;
        }

        .enso-mails-preview__grid {
            display: grid;
            gap: 12px;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        }

        .enso-mails-preview__link {
            background: #ffffff;
            border: 1px solid #e1e8f0;
            border-radius: 10px;
            color: #202938;
            display: block;
            font-weight: 700;
            padding: 14px 16px;
            text-decoration: none;
        }

        .enso-mails-preview__meta {
            color: #748195;
            display: block;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.35;
            margin-top: 8px;
            overflow-wrap: anywhere;
        }
    </style>
</head>
<body class="enso-mails-preview">
    <main class="enso-mails-preview__main">
        <h1 class="enso-mails-preview__title">{$title}</h1>
        {$sections}
    </main>
</body>
</html>
HTML;
    }

    private function title(): string
    {
        return Config::get('enso.mails.brand.name').' Mail Previews';
    }

    private function sections(Collection $previews): Collection
    {
        $groups = $previews->groupBy(fn (PreviewDefinition $preview) => $preview->section());

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

    private function list(PreviewRegistry $registry): int
    {
        $registry->all()
            ->each(fn (PreviewDefinition $preview) => $this->line(
                "{$preview->key()} - {$preview->name()}"
            ));

        return self::SUCCESS;
    }

    private function previews(PreviewRegistry $registry): Collection
    {
        $key = $this->argument('preview');

        return $key === null
            ? $registry->all()
            : $registry->all()->only($key);
    }
}

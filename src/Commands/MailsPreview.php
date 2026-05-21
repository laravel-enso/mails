<?php

namespace LaravelEnso\Mails\Commands;

use Illuminate\Console\Command;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Collection;
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
        $links = $previews
            ->map(fn (PreviewDefinition $preview) => sprintf(
                '<a href="%s.html">%s</a>',
                $preview->key(),
                htmlspecialchars($preview->name(), ENT_QUOTES, 'UTF-8'),
            ))
            ->implode("\n");

        return <<<HTML
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Enso Mail Previews</title>
    <style>
        body {
            background: #eef3f8;
            color: #202938;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            margin: 0;
            padding: 40px;
        }

        main {
            margin: 0 auto;
            max-width: 720px;
        }

        h1 {
            font-size: 24px;
            margin: 0 0 24px;
        }

        a {
            background: #ffffff;
            border: 1px solid #e1e8f0;
            border-radius: 10px;
            color: #202938;
            display: block;
            font-weight: 700;
            margin-bottom: 10px;
            padding: 14px 16px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <main>
        <h1>Laravel Enso Mail Previews</h1>
        {$links}
    </main>
</body>
</html>
HTML;
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

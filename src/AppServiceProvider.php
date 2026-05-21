<?php

namespace LaravelEnso\Mails;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Mails\Commands\MailsPreview;
use LaravelEnso\Mails\Preview\PreviewDefinition;
use LaravelEnso\Mails\Preview\PreviewRegistry;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/mails.php', 'enso.mails');

        $this->app->singleton(PreviewRegistry::class);
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-enso/mails');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->configureMarkdown();
        $this->registerPreviews();
        $this->publishResources();

        if ($this->app->runningInConsole()) {
            $this->commands(MailsPreview::class);
        }
    }

    private function configureMarkdown(): void
    {
        $path = __DIR__.'/../resources/views/vendor/mail';
        $paths = Config::get('mail.markdown.paths', []);

        if (! in_array($path, $paths, true)) {
            $paths[] = $path;
        }

        Config::set('mail.markdown.paths', $paths);

        if (Config::get('enso.mails.markdown.apply_theme')) {
            Config::set('mail.markdown.theme', Config::get('enso.mails.markdown.theme'));
        }
    }

    private function registerPreviews(): void
    {
        $registry = $this->app->make(PreviewRegistry::class);

        $previews = [
            new PreviewDefinition(
                key: 'transactional',
                name: 'Transactional',
                view: 'laravel-enso/mails::previews.transactional',
                data: ['url' => 'https://example.com/settings'],
            ),
            new PreviewDefinition(
                key: 'password-reset',
                name: 'Password Reset',
                view: 'laravel-enso/mails::previews.password-reset',
                data: ['url' => 'https://example.com/password/reset/token'],
            ),
            new PreviewDefinition(
                key: 'password-set',
                name: 'Password Set',
                view: 'laravel-enso/mails::previews.password-set',
                data: ['url' => 'https://example.com/password/set/token'],
            ),
            new PreviewDefinition(
                key: 'table-export-done',
                name: 'Table Export Done',
                view: 'laravel-enso/mails::previews.table-export-done',
                data: [],
            ),
            new PreviewDefinition(
                key: 'data-export-ready',
                name: 'Data Export Ready',
                view: 'laravel-enso/mails::previews.data-export-ready',
                data: ['url' => 'https://example.com/files/export.xlsx'],
            ),
            new PreviewDefinition(
                key: 'data-import-done',
                name: 'Data Import Done',
                view: 'laravel-enso/mails::previews.data-import-done',
                data: ['url' => 'https://example.com/files/rejected.xlsx'],
            ),
            new PreviewDefinition(
                key: 'comment-tagged',
                name: 'Comment Tagged',
                view: 'laravel-enso/mails::previews.comment-tagged',
                data: ['url' => 'https://example.com/comments/1024'],
            ),
            new PreviewDefinition(
                key: 'reminder',
                name: 'Reminder',
                view: 'laravel-enso/mails::previews.reminder',
                data: [],
            ),
            new PreviewDefinition(
                key: 'action-required',
                name: 'Action Required',
                view: 'laravel-enso/mails::previews.action-required',
                data: ['url' => 'https://example.com/approval/1024'],
            ),
            new PreviewDefinition(
                key: 'report',
                name: 'Report',
                view: 'laravel-enso/mails::previews.report',
                data: [
                    'rows' => [
                        ['Users', '18,240', '12 added today'],
                        ['Queued jobs', '1,284', '42 waiting'],
                        ['Failed jobs', '7', 'Requires review'],
                    ],
                ],
            ),
            new PreviewDefinition(
                key: 'metrics',
                name: 'Metrics',
                view: 'laravel-enso/mails::previews.metrics',
                data: [
                    'metrics' => [
                        ['label' => 'Processed', 'value' => '1,248', 'tone' => 'success'],
                        ['label' => 'Pending', 'value' => '37', 'tone' => 'warning'],
                        ['label' => 'Failed', 'value' => '4', 'tone' => 'danger'],
                    ],
                ],
            ),
            new PreviewDefinition(
                key: 'components',
                name: 'Components',
                view: 'laravel-enso/mails::previews.components',
                data: [],
            ),
        ];

        foreach ($previews as $preview) {
            $registry->register($preview);
        }
    }

    private function publishResources(): void
    {
        $this->publishes([
            __DIR__.'/../config/mails.php' => $this->app->configPath('enso/mails.php'),
        ], ['mails-config', 'enso-config']);

        $this->publishes([
            __DIR__.'/../resources/views/vendor/mail' => $this->app->resourcePath('views/vendor/mail'),
        ], ['mails-views', 'enso-mail']);
    }
}

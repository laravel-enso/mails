<?php

namespace LaravelEnso\Mails;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Mails\Commands\MailsPreview;
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
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-enso/mails');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->configureMarkdown();
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

    private function publishResources(): void
    {
        $this->publishes([
            __DIR__.'/../config/mails.php' => $this->app->configPath('enso/mails.php'),
        ], ['mails-config', 'enso-config']);

        $this->publishes([
            __DIR__.'/../resources/views/vendor/mail' => $this->app->resourcePath('views/vendor/mail'),
        ], ['mails-views', 'enso-mail']);

        $this->publishes([
            __DIR__.'/../resources/lang' => $this->app->langPath('vendor/laravel-enso/mails'),
        ], ['mails-lang', 'enso-lang']);
    }
}

<?php

namespace LaravelEnso\Mails\Tests\Feature;

use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Config;
use LaravelEnso\Mails\Preview\PreviewRegistry;
use LaravelEnso\Mails\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ServiceProviderTest extends TestCase
{
    #[Test]
    public function it_loads_default_config(): void
    {
        $this->assertNotEmpty(Config::get('enso.mails.brand.name'));
        $this->assertSame('enso-mails', Config::get('mail.markdown.theme'));
    }

    #[Test]
    public function it_registers_markdown_component_path(): void
    {
        $paths = Config::get('mail.markdown.paths');

        $this->assertContains(
            realpath(__DIR__.'/../../resources/views/vendor/mail'),
            array_map(fn (string $path) => realpath($path), $paths),
        );
    }

    #[Test]
    public function it_registers_default_previews(): void
    {
        $previews = $this->app->make(PreviewRegistry::class)->all();

        $this->assertTrue($previews->has('transactional'));
        $this->assertTrue($previews->has('password-reset'));
        $this->assertTrue($previews->has('password-set'));
        $this->assertTrue($previews->has('table-export-done'));
        $this->assertTrue($previews->has('data-export-ready'));
        $this->assertTrue($previews->has('data-import-done'));
        $this->assertTrue($previews->has('comment-tagged'));
        $this->assertTrue($previews->has('reminder'));
        $this->assertTrue($previews->has('action-required'));
        $this->assertTrue($previews->has('report'));
        $this->assertTrue($previews->has('metrics'));
        $this->assertTrue($previews->has('components'));
    }

    #[Test]
    public function it_renders_compatible_markdown_message_components(): void
    {
        $html = $this->app->make(Markdown::class)
            ->render('laravel-enso/mails::previews.transactional', [
                'name' => 'Jane Doe',
                'url' => 'https://example.com/settings',
            ])->toHtml();

        $this->assertStringContainsString('Account updated', $html);
        $this->assertStringContainsString('Open settings', $html);
        $this->assertStringContainsString('border-radius:', $html);
        $this->assertStringContainsString('This message was sent by', $html);
        $this->assertStringContainsString('© '.date('Y'), $html);
    }

    #[Test]
    public function it_renders_component_composition_without_escaped_html(): void
    {
        $markdown = $this->app->make(Markdown::class);

        $html = $markdown
            ->render('laravel-enso/mails::previews.action-required', [
                'url' => 'https://example.com/review',
            ])->toHtml();

        $reminder = $markdown
            ->render('laravel-enso/mails::previews.reminder')
            ->toHtml();

        $this->assertStringContainsString('approval-request.pdf', $html);
        $this->assertStringContainsString('Review item', $html);
        $this->assertStringContainsString('Quarterly operations review', $reminder);
        $this->assertStringNotContainsString('&lt;table', $html);
        $this->assertStringNotContainsString('&lt;div', $html);
        $this->assertStringNotContainsString('&lt;table', $reminder);
        $this->assertStringNotContainsString('&lt;div', $reminder);
    }

    #[Test]
    public function preview_compositions_render_html_components_as_html(): void
    {
        $markdown = $this->app->make(Markdown::class);
        $registry = $this->app->make(PreviewRegistry::class);

        foreach ($registry->all() as $preview) {
            $html = $markdown->render($preview->view(), $preview->data())->toHtml();

            $this->assertStringNotContainsString('<pre', $html, $preview->key());
            $this->assertStringNotContainsString('&lt;', $html, $preview->key());
        }
    }

    #[Test]
    public function it_renders_report_tables_and_metric_cards(): void
    {
        $markdown = $this->app->make(Markdown::class);

        $report = $markdown->render('laravel-enso/mails::previews.report', [
            'rows' => [
                ['Project Alpha', 'Ready', 'Today'],
            ],
        ])->toHtml();

        $metrics = $markdown->render('laravel-enso/mails::previews.metrics', [
            'metrics' => [
                ['label' => 'Processed', 'value' => '1,248', 'tone' => 'success'],
            ],
        ])->toHtml();

        $this->assertStringContainsString('<table', $report);
        $this->assertStringContainsString('Project Alpha', $report);
        $this->assertStringContainsString('Processed', $metrics);
        $this->assertStringContainsString('1,248', $metrics);
        $this->assertStringNotContainsString('&lt;table', $report);
    }

    #[Test]
    public function components_preview_contains_all_component_examples(): void
    {
        $html = $this->app->make(Markdown::class)
            ->render('laravel-enso/mails::previews.components')
            ->toHtml();

        foreach ([
            'mail::title',
            'mail::tag',
            'mail::button',
            'mail::box',
            'mail::alert',
            'mail::quote',
            'mail::panel',
            'mail::file',
            'mail::metric',
            'mail::table',
            'mail::schedule',
            'mail::divider',
            'mail::signature',
        ] as $component) {
            $this->assertStringContainsString($component, $html);
        }

        $this->assertStringContainsString('users-export.xlsx', $html);
        $this->assertStringContainsString('Operations review', $html);
        $this->assertStringNotContainsString('&lt;table', $html);
        $this->assertStringNotContainsString('<pre', $html);
    }

    #[Test]
    public function button_uses_accent_as_default_variant(): void
    {
        Config::set('enso.mails.colors.accent', '#eb3a16');

        $html = $this->app->make(Markdown::class)
            ->render('laravel-enso/mails::previews.transactional', [
                'url' => 'https://example.com/account',
            ])->toHtml();

        $this->assertStringContainsString('background: #eb3a16', $html);
    }

    #[Test]
    public function button_uses_configured_default_and_supports_markdown_color_aliases(): void
    {
        Config::set([
            'enso.mails.components.button.default' => 'link',
            'enso.mails.colors.link' => '#eb3a16',
            'enso.mails.colors.danger' => '#eb3a16',
            'enso.mails.colors.info' => '#3e8ed0',
            'enso.mails.colors.success' => '#48c78e',
        ]);

        $markdown = $this->app->make(Markdown::class);

        $default = $markdown->render('laravel-enso/mails::previews.transactional', [
            'url' => 'https://example.com/account',
        ])->toHtml();

        $aliases = \Illuminate\Support\Facades\Blade::render(<<<'BLADE'
@component('mail::button', ['url' => 'https://example.com/reset', 'color' => 'red'])
Reset password
@endcomponent
@component('mail::button', ['url' => 'https://example.com/conversation', 'color' => 'blue'])
View conversation
@endcomponent
@component('mail::button', ['url' => 'https://example.com/success', 'color' => 'green'])
Continue
@endcomponent
BLADE);

        $this->assertStringContainsString('background: #eb3a16', $default);
        $this->assertStringContainsString('background: #eb3a16', $aliases);
        $this->assertStringContainsString('background: #3e8ed0', $aliases);
        $this->assertStringContainsString('background: #48c78e', $aliases);
    }

    #[Test]
    public function colored_boxes_use_readable_body_text(): void
    {
        $html = $this->app->make(Markdown::class)
            ->render('laravel-enso/mails::previews.components')
            ->toHtml();

        $this->assertMatchesRegularExpression('/<p style="[^"]*font-size: 14px;[^"]*color: #FFFFFF;[^"]*font-weight: 500;[^"]*">Useful for informational notices\\.<\\/p>/', $html);
        $this->assertMatchesRegularExpression('/<p style="[^"]*font-size: 14px;[^"]*color: #4A4A4A;[^"]*font-weight: 500;[^"]*">Useful for attention states\\.<\\/p>/', $html);
    }
}

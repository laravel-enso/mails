<?php

namespace LaravelEnso\Mails\Tests\Feature;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use LaravelEnso\Mails\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PreviewTest extends TestCase
{
    #[Test]
    public function preview_index_is_available_when_enabled(): void
    {
        Config::set('enso.mails.brand.name', 'Solarlink');

        $this->get($this->previewPath())
            ->assertOk()
            ->assertSee('Solarlink Mail Previews')
            ->assertSee('Boilerplates')
            ->assertSee('Transactional')
            ->assertSee('laravel-enso/mails::previews.transactional');
    }

    #[Test]
    public function preview_show_renders_the_email(): void
    {
        $this->get($this->previewPath('transactional'))
            ->assertOk()
            ->assertSee('Account updated');
    }

    #[Test]
    public function preview_routes_are_hidden_when_disabled(): void
    {
        Config::set('enso.mails.preview.enabled', false);

        $this->get($this->previewPath())
            ->assertNotFound();
    }

    #[Test]
    public function preview_command_lists_registered_previews(): void
    {
        $this->artisan('enso:mails:preview', ['--list' => true])
            ->expectsOutput('transactional - Transactional')
            ->expectsOutput('action-required - Action Required')
            ->expectsOutput('components - Components')
            ->assertSuccessful();
    }

    #[Test]
    public function preview_command_writes_static_index_when_rendering_to_directory(): void
    {
        Config::set('enso.mails.brand.name', 'Solarlink');

        $output = sys_get_temp_dir().'/enso-mails-preview-test-'.uniqid();

        $this->artisan('enso:mails:preview', ['--output' => $output])
            ->assertSuccessful();

        $this->assertFileExists("{$output}/index.html");
        $this->assertFileExists("{$output}/components.html");
        $this->assertStringContainsString('Solarlink Mail Previews', File::get("{$output}/index.html"));
        $this->assertStringContainsString('href="components.html"', File::get("{$output}/index.html"));
        $this->assertStringContainsString('Boilerplates', File::get("{$output}/index.html"));
        $this->assertStringContainsString('laravel-enso/mails::previews.components', File::get("{$output}/index.html"));

        File::deleteDirectory($output);
    }

    private function previewPath(?string $preview = null): string
    {
        $path = '/enso-mails-preview';

        return $preview !== null
            ? $path.'/'.trim($preview, '/')
            : $path;
    }
}

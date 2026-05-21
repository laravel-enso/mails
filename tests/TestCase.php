<?php

namespace LaravelEnso\Mails\Tests;

use LaravelEnso\Mails\AppServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.key', 'base64:QOu+Gdn+9Irk8qbs4UtYCjgi6oV/6kVEGq5bVg2vJpY=');
    }

    protected function getPackageProviders($app): array
    {
        return [
            AppServiceProvider::class,
        ];
    }
}

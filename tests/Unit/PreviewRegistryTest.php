<?php

namespace LaravelEnso\Mails\Tests\Unit;

use LaravelEnso\Mails\Preview\PreviewDefinition;
use LaravelEnso\Mails\Preview\PreviewRegistry;
use LaravelEnso\Mails\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PreviewRegistryTest extends TestCase
{
    #[Test]
    public function it_registers_and_returns_previews(): void
    {
        $registry = new PreviewRegistry();
        $preview = new PreviewDefinition(
            key: 'welcome',
            name: 'Welcome',
            view: 'mail.welcome',
            data: ['name' => 'Jane'],
        );

        $registry->register($preview);

        $this->assertSame($preview, $registry->get('welcome'));
        $this->assertSame(['welcome'], $registry->all()->keys()->all());
    }
}

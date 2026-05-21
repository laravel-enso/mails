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
        $this->assertSame(PreviewDefinition::AppSpecific, $preview->section());
    }

    #[Test]
    public function it_groups_previews_by_section_and_sorts_them_by_name(): void
    {
        $registry = new PreviewRegistry();

        $registry
            ->register(new PreviewDefinition(
                key: 'password-set',
                name: 'Password Set',
                view: 'mail.password-set',
                section: PreviewDefinition::Core,
            ))
            ->register(new PreviewDefinition(
                key: 'action-required',
                name: 'Action Required',
                view: 'mail.action-required',
                section: PreviewDefinition::Boilerplates,
            ))
            ->register(new PreviewDefinition(
                key: 'components',
                name: 'Components',
                view: 'mail.components',
                section: PreviewDefinition::Boilerplates,
            ))
            ->register(new PreviewDefinition(
                key: 'password-reset',
                name: 'Password Reset',
                view: 'mail.password-reset',
                section: PreviewDefinition::Core,
            ));

        $sections = $registry->sections();

        $this->assertSame([PreviewDefinition::Boilerplates, PreviewDefinition::Core], $sections->pluck('key')->all());
        $this->assertSame(
            ['Action Required', 'Components'],
            $sections->first()['previews']->map(fn (PreviewDefinition $preview) => $preview->name())->all(),
        );
        $this->assertSame(
            ['Password Reset', 'Password Set'],
            $sections->last()['previews']->map(fn (PreviewDefinition $preview) => $preview->name())->all(),
        );
    }
}

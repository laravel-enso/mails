<?php

namespace LaravelEnso\Mails;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\Mails\Preview\PreviewDefinition;
use LaravelEnso\Mails\Preview\PreviewRegistry;

class MailServiceProvider extends ServiceProvider
{
    public function boot(PreviewRegistry $registry): void
    {
        $previews = [
            new PreviewDefinition(
                key: 'transactional',
                name: 'Transactional',
                view: 'laravel-enso/mails::previews.transactional',
                data: ['url' => 'https://example.com/settings'],
                section: PreviewDefinition::Boilerplates,
            ),
            new PreviewDefinition(
                key: 'action-required',
                name: 'Action Required',
                view: 'laravel-enso/mails::previews.action-required',
                data: ['url' => 'https://example.com/approval/1024'],
                section: PreviewDefinition::Boilerplates,
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
                section: PreviewDefinition::Boilerplates,
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
                section: PreviewDefinition::Boilerplates,
            ),
            new PreviewDefinition(
                key: 'components',
                name: 'Components',
                view: 'laravel-enso/mails::previews.components',
                data: [],
                section: PreviewDefinition::Boilerplates,
            ),
        ];

        foreach ($previews as $preview) {
            $registry->register($preview);
        }
    }
}

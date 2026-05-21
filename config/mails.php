<?php

return [
    'brand' => [
        'name' => env('ENSO_MAILS_BRAND_NAME', 'Laravel Enso'),
        'url' => env('ENSO_MAILS_BRAND_URL', env('APP_URL', 'https://laravel-enso.com')),
        'logo' => null,
        'label' => null,
    ],

    'layout' => [
        'width' => 600,
        'wide_width' => 760,
        'background' => '#EEF3F8',
        'surface' => '#FFFFFF',
        'border' => '#E1E8F0',
        'radius' => 8,
        'card_radius' => 18,
        'gutter' => 24,
    ],

    'text' => [
        'font_family' => "Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif",
        'spacing' => 24,
        'body' => '#4A4A4A',
        'muted' => '#748195',
        'heading' => '#202938',
    ],

    'colors' => [
        'primary' => '#00D1B2',
        'accent' => '#485FC7',
        'link' => '#485FC7',
        'info' => '#3E8ED0',
        'success' => '#48C78E',
        'warning' => '#FFE08A',
        'danger' => '#F14668',
        'dark' => '#14161A',
        'light' => '#F5F5F5',
        'white' => '#FFFFFF',
    ],

    'components' => [
        'button' => [
            'default' => 'accent',
            'text' => '#FFFFFF',
        ],
        'box' => [
            'background' => '#F7FAFC',
            'border' => '#E1E8F0',
        ],
        'file' => [
            'background' => '#F7FAFC',
        ],
        'tag' => [
            'background' => '#14161A',
            'text' => '#FFFFFF',
        ],
        'table' => [
            'head' => '#F7FAFC',
            'border' => '#E1E8F0',
        ],
    ],

    'footer' => [
        'text' => null,
        'legal' => null,
        'links' => [],
    ],

    'markdown' => [
        'theme' => 'enso-mails',
        'apply_theme' => true,
    ],

    'preview' => [
        'enabled' => env('ENSO_MAILS_PREVIEW', env('APP_ENV') !== 'production'),
    ],
];

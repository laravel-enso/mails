@component('mail::message-wide')
@component('mail::title', ['subtitle' => 'Reference preview for the reusable Laravel Enso mail building blocks.'])
Components
@endcomponent

This preview documents the components available to Markdown mail views. Each section shows the component name, its purpose, and a representative rendering.

@component('mail::divider', ['margin' => '18px 0'])
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for the primary heading and optional supporting text at the top of a message.'])
mail::title
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for short status, category, or type labels. Variants follow color tokens.'])
mail::tag
@endcomponent

@component('mail::tag', ['variant' => 'primary'])
Primary
@endcomponent
@component('mail::tag', ['variant' => 'info'])
Info
@endcomponent
@component('mail::tag', ['variant' => 'success'])
Success
@endcomponent
@component('mail::tag', ['variant' => 'warning'])
Warning
@endcomponent
@component('mail::tag', ['variant' => 'danger'])
Danger
@endcomponent
@component('mail::tag', ['variant' => 'dark'])
Dark
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for the main call to action. Variants map to configured color tokens and support Laravel Markdown aliases red, blue, and green.'])
mail::button
@endcomponent

@component('mail::button', ['url' => 'https://example.com/primary', 'variant' => 'primary'])
Primary action
@endcomponent
@component('mail::button', ['url' => 'https://example.com/info', 'variant' => 'info'])
Info action
@endcomponent
@component('mail::button', ['url' => 'https://example.com/success', 'variant' => 'success'])
Success action
@endcomponent
@component('mail::button', ['url' => 'https://example.com/warning', 'variant' => 'warning'])
Warning action
@endcomponent
@component('mail::button', ['url' => 'https://example.com/danger', 'variant' => 'danger'])
Danger action
@endcomponent
@component('mail::button', ['url' => 'https://example.com/dark', 'variant' => 'dark'])
Dark action
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for grouped information, summaries, or highlighted content blocks.'])
mail::box
@endcomponent

@component('mail::box', ['title' => 'Neutral box'])
Useful for contextual information without implying a status.
@endcomponent
@component('mail::box', ['title' => 'Info box', 'variant' => 'info'])
Useful for informational notices.
@endcomponent
@component('mail::box', ['title' => 'Success box', 'variant' => 'success'])
Useful for positive confirmations.
@endcomponent
@component('mail::box', ['title' => 'Warning box', 'variant' => 'warning'])
Useful for attention states.
@endcomponent
@component('mail::box', ['title' => 'Danger box', 'variant' => 'danger'])
Useful for blocking or failed states.
@endcomponent
@component('mail::box', ['title' => 'Dark box', 'variant' => 'dark'])
Useful when a strong contrast panel is needed.
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for compact status callouts inside a message body.'])
mail::alert
@endcomponent

@component('mail::alert', ['variant' => 'info'])
The record was updated and is ready for review.
@endcomponent
@component('mail::alert', ['variant' => 'success'])
The operation completed successfully.
@endcomponent
@component('mail::alert', ['variant' => 'warning'])
Some rows need attention before the process can continue.
@endcomponent
@component('mail::alert', ['variant' => 'danger'])
The process failed and requires manual review.
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for quoted notes, comments, or externally authored content.'])
mail::quote
@endcomponent

@component('mail::quote', ['variant' => 'info'])
Please review the latest comment before approving the record.
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for Laravel Markdown panel compatibility and plain highlighted text bodies.'])
mail::panel
@endcomponent

@component('mail::panel')
This is a panel body rendered through the Laravel Markdown-compatible component.
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for attachment, generated file, and document references.'])
mail::file
@endcomponent

@component('mail::file', ['meta' => 'XLSX · 24 KB'])
users-export.xlsx
@endcomponent
@component('mail::file', ['icon' => 'PDF', 'meta' => 'expires in 7 days'])
approval-request.pdf
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for compact numeric summaries and batch processing results.'])
mail::metric
@endcomponent

@component('mail::metric', ['label' => 'Processed', 'value' => '1,248', 'variant' => 'success'])
@endcomponent
@component('mail::metric', ['label' => 'Pending', 'value' => '37', 'variant' => 'warning'])
@endcomponent
@component('mail::metric', ['label' => 'Failed', 'value' => '4', 'variant' => 'danger'])
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for tabular report data. Wrap Markdown tables or HTML tables in this component.'])
mail::table
@endcomponent

@component('mail::table')
| Area | Count | Notes |
| :-- | --: | :-- |
| Users | 18,240 | 12 added today |
| Queued jobs | 1,284 | 42 waiting |
| Failed jobs | 7 | Requires review |
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for dated reminders, calendar-like events, and scheduled windows.'])
mail::schedule
@endcomponent

@component('mail::schedule', ['day' => '27', 'month' => 'MAY', 'time' => '09:30 - 10:30', 'label' => 'Operations review'])
@endcomponent

@component('mail::divider')
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for separating larger groups of content.'])
mail::divider
@endcomponent

@component('mail::divider', ['margin' => '16px 0'])
@endcomponent

@component('mail::title', ['size' => 18, 'subtitle' => 'Use for the default closing block. Empty usage renders the configured brand team signature.'])
mail::signature
@endcomponent

@component('mail::signature')
@endcomponent
@endcomponent

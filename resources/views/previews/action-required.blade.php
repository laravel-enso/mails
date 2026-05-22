@component('mail::message')
@component('mail::title', ['subtitle' => 'A generic approval request with a file, warning, and CTA.'])
Review required
@endcomponent

@component('mail::file', ['meta' => 'PDF · expires in 7 days', 'url' => 'https://example.com/files/approval-request.pdf'])
approval-request.pdf
@endcomponent

@component('mail::alert', ['variant' => 'warning'])
Please review the attached document and either approve it or send it back with notes.
@endcomponent

@component('mail::button', ['url' => $url, 'variant' => 'warning'])
Review item
@endcomponent

@component('mail::signature')
@endcomponent
@endcomponent

@php
    $content = trim((string) $slot);
@endphp

<div style="color: {{ config('enso.mails.text.muted') }}; font-size: 12px; line-height: 1.5; margin-top: 10px;">
@if($content === '')
<p style="color: {{ config('enso.mails.text.body') }}; font-size: 12px; line-height: 1.5; margin: 0;">
{{ __('laravel-enso/mails::signature.regards') }}<br>
<strong>{{ __('laravel-enso/mails::signature.team', ['brand' => config('enso.mails.brand.name')]) }}</strong>
</p>
@else
{{ Illuminate\Mail\Markdown::parse($slot) }}
@endif
</div>

@php
    $content = trim((string) $slot);
@endphp

@if($content === '')
{{ __('laravel-enso/mails::signature.regards') }}
{{ __('laravel-enso/mails::signature.team', ['brand' => config('enso.mails.brand.name')]) }}
@else
{{ $slot }}
@endif

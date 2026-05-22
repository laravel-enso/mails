@php
    $content = trim((string) $slot);
    $regards = trim(__('laravel-enso/mails::signature.regards'));
    $team = trim(__('laravel-enso/mails::signature.team', ['brand' => config('enso.mails.brand.name')]));
@endphp

@if($content === '')
@if($regards !== '')
{{ $regards }}
@endif
@if($team !== '')
{{ $team }}
@endif
@else
{{ $slot }}
@endif

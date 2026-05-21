@php
    $content = trim((string) $slot);
@endphp

@if($content === '')
Cu stimă,
Echipa {{ config('enso.mails.brand.name') }}
@else
{{ $slot }}
@endif

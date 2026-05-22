@php
    $radius = config('enso.mails.layout.radius') + 2;
    $color = config('enso.mails.text.body');
@endphp

<table cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.components.file.background') }}; border: 1px solid {{ config('enso.mails.layout.border') }}; border-radius: {{ $radius }}px; margin: 16px 0; overflow: hidden;">
<tr>
<td style="color: {{ $color }}; font-size: 12px; font-weight: 700; padding: {{ isset($url) ? '0' : '8px 11px' }};">
@isset($url)
<a href="{{ $url }}" target="_blank" style="color: {{ $color }}; display: block; padding: 8px 11px; text-decoration: none;">
@endisset
{{ $icon ?? '📎' }}&nbsp; {{ $slot }}
@isset($meta)
<span style="color: {{ config('enso.mails.text.muted') }}; font-weight: 400;"> · {{ $meta }}</span>
@endisset
@isset($url)
</a>
@endisset
</td>
</tr>
</table>

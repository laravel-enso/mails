@php
    $variant = $variant ?? $tone ?? 'primary';
    $color = config("enso.mails.colors.{$variant}", config('enso.mails.colors.primary'));
    $radius = config('enso.mails.layout.radius') + 6;
@endphp

<table class="metric metric-{{ $variant }}" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.components.box.background') }}; border: 1px solid {{ config('enso.mails.layout.border') }}; border-radius: {{ $radius }}px; margin: 8px 0; overflow: hidden;">
<tr>
<td style="border-left: 4px solid {{ $color }}; padding: 15px 18px 16px;">
<p style="color: {{ config('enso.mails.text.muted') }}; font-size: 11px; font-weight: 800; letter-spacing: .08em; margin: 0 0 7px; text-transform: uppercase;">
{{ $label }}
</p>
<p style="color: {{ $color }}; font-size: 30px; font-weight: 800; line-height: 1; margin: 0;">
{{ $value }}
</p>
</td>
</tr>
</table>

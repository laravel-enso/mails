@php
    $variant = $variant ?? $color ?? config('enso.mails.components.button.default', 'accent');
    $variant = [
        'blue' => 'info',
        'green' => 'success',
        'red' => 'danger',
    ][$variant] ?? $variant;
    $background = config("enso.mails.colors.{$variant}", config('enso.mails.colors.primary'));
    $text = in_array($variant, ['light', 'warning'], true)
        ? config('enso.mails.text.heading')
        : config('enso.mails.components.button.text');
@endphp

<table align="center" cellpadding="0" cellspacing="0" role="presentation" style="margin: 28px auto 26px; width: 100%;">
<tr>
<td align="center">
<a href="{{ $url }}" target="_blank" rel="noopener" style="background: {{ $background }}; border-radius: {{ config('enso.mails.layout.radius') }}px; color: {{ $text }}; display: inline-block; font-size: 14px; font-weight: 700; line-height: 1.2; padding: 12px 18px; text-decoration: none;">
{{ $slot }}
</a>
</td>
</tr>
</table>

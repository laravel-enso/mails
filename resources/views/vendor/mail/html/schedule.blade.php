@php
    $variant = $variant ?? 'dark';
    $background = config("enso.mails.colors.{$variant}", config('enso.mails.colors.dark'));
    $text = in_array($variant, ['primary', 'link', 'info', 'success', 'danger', 'dark'], true)
        ? config('enso.mails.colors.white')
        : config('enso.mails.text.body');
    $divider = $variant === 'light'
        ? config('enso.mails.layout.border')
        : 'rgba(255,255,255,.2)';
@endphp

<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ $background }}; border-radius: {{ config('enso.mails.layout.radius') }}px; margin: 18px 0;">
<tr>
<td style="color: {{ $text }}; padding: 18px;">
<table width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td style="border-right: 1px solid {{ $divider }}; color: {{ $text }}; font-size: 40px; font-weight: 900; line-height: 1; padding-right: 18px; text-align: center; width: 80px;">
{{ $day }}
<br>
<span style="color: {{ $text }}; font-size: 11px; font-weight: 600; letter-spacing: .08em; text-transform: uppercase;">{{ $month }}</span>
</td>
<td style="color: {{ $text }}; padding-left: 18px;">
<strong>{{ $time }}</strong>
@isset($label)
<br>{{ $label }}
@endisset
</td>
</tr>
</table>
</td>
</tr>
</table>

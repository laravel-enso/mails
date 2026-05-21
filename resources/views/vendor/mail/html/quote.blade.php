@php
    $variant = $variant ?? 'link';
    $radius = config('enso.mails.layout.radius') + 6;
@endphp

<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.components.box.background') }}; border: 1px solid {{ config('enso.mails.components.box.border') }}; border-left: 4px solid {{ config("enso.mails.colors.{$variant}", config('enso.mails.colors.link')) }}; border-radius: {{ $radius }}px; margin: 18px 0; overflow: hidden;">
<tr>
<td style="color: {{ config('enso.mails.text.body') }}; padding: 12px 16px;">
{{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>

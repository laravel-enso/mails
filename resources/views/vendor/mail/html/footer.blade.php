@php
    $footerText = config('enso.mails.footer.text')
        ?? 'This message was sent by '.config('enso.mails.brand.name').'.';
    $footerLegal = config('enso.mails.footer.legal')
        ?? '© '.date('Y').' '.config('enso.mails.brand.name').'.';
@endphp

<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.layout.background') }}; border-top: 1px solid {{ config('enso.mails.layout.border') }};">
<tr>
<td align="center" style="color: {{ config('enso.mails.text.muted') }}; font-size: 10px; line-height: 1.4; padding: 14px 30px;">
<span>{{ $footerText }}</span><br>
<span>{{ $footerLegal }}</span>
@if(count(config('enso.mails.footer.links', [])) > 0)
<br>
@foreach(config('enso.mails.footer.links') as $label => $url)
<a href="{{ $url }}" target="_blank" rel="noopener" style="color: {{ config('enso.mails.text.muted') }};">{{ $label }}</a>@if(! $loop->last) · @endif
@endforeach
@endif
</td>
</tr>
</table>

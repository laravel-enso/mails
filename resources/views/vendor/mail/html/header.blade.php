<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.colors.dark') }};">
<tr>
<td align="left" style="padding: 22px 30px; vertical-align: middle; width: 50%;">
<a href="{{ config('enso.mails.brand.url') }}" target="_blank" rel="noopener" style="color: {{ config('enso.mails.colors.white') }}; font-size: 18px; font-weight: 700; line-height: 1.2; text-decoration: none;">
@if(config('enso.mails.brand.logo'))
<img src="{{ config('enso.mails.brand.logo') }}" alt="{{ config('enso.mails.brand.name') }}" style="display: block; max-height: 34px; max-width: 160px;">
@else
{{ config('enso.mails.brand.name') }}
@endif
</a>
</td>
<td align="right" style="color: {{ config('enso.mails.text.muted') }}; font-size: 11px; line-height: 1.2; padding: 22px 30px; vertical-align: middle; width: 50%;">
{{ config('enso.mails.brand.label') ?? parse_url(config('enso.mails.brand.url'), PHP_URL_HOST) }}
</td>
</tr>
</table>

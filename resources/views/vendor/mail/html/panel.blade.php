<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background: {{ config('enso.mails.components.box.background') }}; border: 1px solid {{ config('enso.mails.components.box.border') }}; border-radius: {{ config('enso.mails.layout.radius') + 6 }}px; margin: 18px 0; overflow: hidden;">
<tr>
<td style="padding: 18px;">
{{ Illuminate\Mail\Markdown::parse($slot) }}
</td>
</tr>
</table>

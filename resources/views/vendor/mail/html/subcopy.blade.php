<table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-top: 1px solid {{ config('enso.mails.layout.border') }}; margin-top: 24px; padding-top: 20px;">
    <tr>
        <td style="color: {{ config('enso.mails.theme.muted') }}; font-size: 12px;">
            {{ Illuminate\Mail\Markdown::parse($slot) }}
        </td>
    </tr>
</table>

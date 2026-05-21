{{ config('enso.mails.footer.text') ?? 'This message was sent by '.config('enso.mails.brand.name').'.' }}
© {{ date('Y') }} {{ config('enso.mails.brand.name') }}.
@if(config('enso.mails.footer.legal'))
{{ config('enso.mails.footer.legal') }}
@endif

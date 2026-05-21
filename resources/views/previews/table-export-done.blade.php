@component('mail::message')
@component('mail::title', ['subtitle' => 'Based on the Laravel Enso tables export notification.'])
Table export done
@endcomponent

Hi Jane,

You will find the export attached to this email.

@component('mail::file', ['meta' => '1,248 entries · XLSX'])
users-export.xlsx
@endcomponent

@component('mail::signature')
@endcomponent
@endcomponent

@component('mail::message')
@component('mail::title', ['subtitle' => 'Based on the Laravel Enso data-export completion email.'])
Export ready
@endcomponent

Hi Jane,

The **users-export.xlsx** file is ready.

The generated document has **1,248** entries.

@component('mail::button', ['url' => $url])
Download
@endcomponent

@component('mail::signature')
@endcomponent
@endcomponent

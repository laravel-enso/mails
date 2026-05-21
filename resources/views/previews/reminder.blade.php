@component('mail::message')
@component('mail::tag', ['variant' => 'info'])
Reminder
@endcomponent

@component('mail::title', ['subtitle' => 'Based on the Laravel Enso interactions/calendar reminder emails.'])
Meeting reminder
@endcomponent

Hi Jane,

You have a new upcoming meeting at **27-05-2026 09:30**.

@component('mail::panel')
Quarterly operations review @ 09:30 to 10:30
@endcomponent

@component('mail::quote', ['variant' => 'info'])
The reminder email uses the same panel and button primitives as comment and calendar notifications.
@endcomponent
@endcomponent

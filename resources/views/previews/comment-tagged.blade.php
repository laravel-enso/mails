@component('mail::message')
@component('mail::title', ['subtitle' => 'Based on the Laravel Enso comments tag notification.'])
Comment tag notification
@endcomponent

Hi Jane,

You were just tagged in a comment:

@component('mail::panel')
Please review the latest notes before the next approval step.
@endcomponent

To view the full conversation, click the button below.

@component('mail::button', ['url' => $url, 'color' => 'blue'])
View conversation
@endcomponent
@endcomponent

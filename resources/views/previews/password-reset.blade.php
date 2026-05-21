@component('mail::message')
@component('mail::title', ['subtitle' => 'Based on the Laravel Enso core reset password notification.'])
Reset password request
@endcomponent

Hi Jane,

You just asked for a password reset. To complete the process, click the button below.

@component('mail::button', ['url' => $url, 'color' => 'red'])
Set your new password
@endcomponent

@component('mail::alert', ['variant' => 'info'])
If you did not request this change, you can safely ignore this email.
@endcomponent

@component('mail::signature')
@endcomponent
@endcomponent

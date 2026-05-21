@component('mail::message')
@component('mail::title', ['subtitle' => 'A first-login password setup flow for new users.'])
Set your password
@endcomponent

Hi Jane,

An account was created for you. Set your password to activate access and finish the first login.

@component('mail::button', ['url' => $url])
Set password
@endcomponent

@component('mail::box', ['title' => 'Security note'])
This link can be used only once and expires automatically.
@endcomponent

@component('mail::signature')
@endcomponent
@endcomponent

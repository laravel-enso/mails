@component('mail::message')
@component('mail::title', ['subtitle' => 'A compact confirmation for a successful account operation.'])
Account updated
@endcomponent

Hello Jane,

Your profile details were updated successfully. No further action is needed, but you can review the current settings at any time.

@component('mail::button', ['url' => $url])
Open settings
@endcomponent

@component('mail::signature')
@endcomponent
@endcomponent

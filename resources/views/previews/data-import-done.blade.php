@component('mail::message-wide')
@component('mail::title', ['subtitle' => 'Based on the Laravel Enso data-import completion email.'])
User import done
@endcomponent

Hi Jane,

The **Users** import is done: `users.xlsx`.

@component('mail::table')
| Entries | Count |
| :-- | --: |
| Successful | 1,224 |
| Failed | 24 |
| Total | 1,248 |
@endcomponent

@component('mail::button', ['url' => $url, 'variant' => 'danger'])
Download failed report
@endcomponent
@endcomponent

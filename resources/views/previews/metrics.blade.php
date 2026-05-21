@component('mail::message')
@component('mail::title', ['subtitle' => 'A compact summary using reusable metric cards.'])
Processing summary
@endcomponent

@foreach($metrics as $metric)
@component('mail::metric', $metric)
@endcomponent
@endforeach

@component('mail::signature')
@endcomponent
@endcomponent

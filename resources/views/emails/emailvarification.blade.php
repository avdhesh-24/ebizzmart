@component('mail::message')

<h3>{!! $verification['title'] !!}<h4>

<p>{!! $verification['description'] !!}<p>

@component('mail::button', ['url' => $verification['url']])
Verify Now
@endcomponent

Sincerely<br>
The {!! config('app.name') !!} Team,
<br><br>
Need Help ?<br>
Please feel free to contact us at info@ebizzmart.com
@endcomponent

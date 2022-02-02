@component('mail::message')

<p>{!! $inquiry['description'] !!}<p>

{!! $inquiry['tabledata'] !!}<br>

Sincerely<br>
The {!! config('app.name') !!} Team,
<br><br>
Need Help ?<br>
Please feel free to contact us at info@ebizzmart.com
@endcomponent

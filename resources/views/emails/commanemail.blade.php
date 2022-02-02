@component('mail::message')

<h3>{!! $data['title'] !!}<h4>

<p>{!! $data['description'] !!}<p>

Sincerely<br>
The {!! config('app.name') !!} Team,
<br><br>
Need Help ?<br>
Please feel free to contact us at info@ebizzmart.com
@endcomponent

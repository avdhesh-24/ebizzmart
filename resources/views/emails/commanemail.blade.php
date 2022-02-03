@component('mail::message')

<h3>{!! !empty($data['title']) ? $data['title'] : '' !!}<h4>

<p>{!! $data['description'] !!}<p>

{!! $data['tabledata'] !!}

Sincerely<br>
The {!! config('app.name') !!} Team,
<br><br>
Need Help ?<br>
Please feel free to contact us at {!! Helper::InfoEnquiry() !!}
@endcomponent

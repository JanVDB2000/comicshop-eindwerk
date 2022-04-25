@component('mail::message')
# Contact Form Submission

<p>From : {{$contact['name'] }}</p>
<p>Mail : {{$contact['email'] }}</p>
<p>Phone : {{$contact['phone'] }}</p>
<p>Message : {{$contact['message'] }}</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

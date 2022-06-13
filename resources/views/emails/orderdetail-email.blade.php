@component('mail::message')
    # Order Detail

    <p>From : {{$orderdetail['name'] }}</p>
    <p>Mail : {{$orderdetail['email'] }}</p>
    <p>Phone : {{$orderdetail['phone'] }}</p>
    <p>Message : {{$orderdetail['message'] }}</p>

    @component('mail::button', ['url' => ''])
        Button Text
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent

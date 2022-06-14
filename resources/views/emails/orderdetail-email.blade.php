@component('mail::message')
# Order Confirmation

<p>Dear {!! Auth::user()->name !!}</p>

<p>Thanks for your purchase</p>

@component('mail::button', ['url' => Route('home.orderList')])
  Go to your order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

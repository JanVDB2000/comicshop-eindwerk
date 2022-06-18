<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order {{$order->id}} Comic-Time</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        table{
            font-size: x-small;
        }
        tfoot tr td{
            font-weight: bold;
            font-size: x-small;
        }
        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td align="left">
            @foreach($order->addresses as $address)
            <h3>@foreach($address->TypeAdres as $type){{$type->name}} @endforeach</h3>
            <pre>
                Adres : {{$address->address_1}}
                Country : {{$address->country}}
                State : {{$address->state}}
                Zip : {{$address->zip}}
            </pre>
            @endforeach
        </td>
        <td align="right">
            <h3>Comic-Time</h3>
            <pre>
                 Adres: Kasteeldreef 5 Brugge 8000
                 BTW: BE08445527447
                 tel: 049568574
            </pre>
        </td>
    </tr>

</table>

<br/>

<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>

    @foreach($order->orderdetails as $detail)
    <tr>
        <th scope="row">{{$detail->id}}</th>
        <td align="right">{{$detail->product->name}}</td>
        <td align="right">{{$detail->amount}}</td>
        <td align="right">€ {{$detail->price}}</td>
        <td align="right">€ {{number_format($detail->amount * $detail->price,2,'.','')}}</td>
    </tr>
   @endforeach
    </tbody>

    <tfoot>
    <tr>
        <td colspan="3"></td>
        <td align="right">SubTotal</td>
        <td align="right">€ {{$subtotal}}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Tax</td>
        <td align="right">included</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Total</td>
        <td align="right" class="gray">€ {{$subtotal}}</td>
    </tr>
    </tfoot>
</table>

</body>
</html>

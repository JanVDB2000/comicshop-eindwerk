@extends('layouts.admin')
@section('seo')
    Reviews, crud
@endsection
@section('title')
    Orders
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Orders</h1>
            <form>
                @csrf
                <input type="text" name="search" class="form-control bg-gray-300 border-0 small"
                       placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            </form>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @if($orders->isnotempty())
            @foreach($orders as $order)
                <div class="col-12 card text-black shadow-lg m-3" style="border-radius: 16px;">
                    <div x-data="{ open: false }"  class="card-body p-5">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Order ID : <span class="font-weight-bold"># {{$order->id}}</span></p>
                            <p class="mb-0">Order Transaction Code : <span class="font-weight-bold">{{$order->TC_code}}</span></p>
                            <p class="mb-0">Order User : <span class="font-weight-bold">{{$order->user->name}}</span></p>
                            <p class="mb-0">Order Date <span class="font-weight-bold"> {{$order->created_at->diffForHumans()}}</span></p>
                            <button class="btn btn-secondary btn-lg  fw-bold text-nowrap" @click="open = true">Order Details</button>
                        </div>
                        <div x-show="open" @click.away="open = false" class="m-3">
                            <table width="100%">
                                <thead style="background-color: lightgray;">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>User</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($order->orderdetails as $detail)
                                    <tr>
                                        <th scope="row">{{$detail->id}}</th>
                                        <td align="left">{{$detail->product->name}}</td>
                                        <td align="left">{{$detail->amount}}</td>
                                        <td align="right">€ {{$detail->price}}</td>
                                        <td align="right">€ {{number_format($detail->amount * $detail->price,2,'.','')}}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td align="right">SubTotal</td>
                                    <td align="right">€ {{$order->ordersubtotaal()}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td align="right">Tax</td>
                                    <td align="right">included</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td align="right">Total</td>
                                    <td align="right" class="gray">€ {{$order->ordersubtotaal()}}</td>
                                </tr>
                                </tfoot>
                            </table>
                                <div class="d-flex">
                                    @foreach($order->addresses as $address)
                                    <ul class="list-group m-3 col-4 border-success">
                                        <li class="list-group-item border-success"> Type Address :
                                            @foreach($address->TypeAdres as $type)
                                                {{$type->name}}
                                            @endforeach
                                        </li>
                                        <li class="list-group-item border-success">
                                            <p>Address : {{$address->address_1}}</p>
                                            <p>Country : {{$address->country}}</p>
                                            <p>State : {{$address->state}}</p>
                                            <p>Zip : {{$address->zip}}</p>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{$orders->withQueryString()->links()}}
            </div>
            @else
                <h1 class="text-center"> No Orders</h1>
            @endif
        </div>
    </div>
@endsection

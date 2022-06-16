@extends('layouts.admin')
@section('seo')
    Reviews, crud
@endsection
@section('title')
    Orders
@endsection
@section('content')
    <h1>Orders</h1>
    <div class="container-fluid">
        <div class="row">
            @if($orders->isnotempty())
            @foreach($orders as $order)
                <div class="col-11 card text-black shadow-lg m-3" style="border-radius: 16px;">
                    <div x-data="{ open: false }"  class="card-body p-5">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Order ID : <span class="font-weight-bold">#{{$order->id}}</span></p>
                            <p class="mb-0">Order Transaction Code : <span class="font-weight-bold">#{{$order->TC_code}}</span></p>
                            <p class="mb-0">Order Date <span class="font-weight-bold"> {{$order->created_at->diffForHumans()}}</span></p>
                            <button class="btn btn-secondary btn-lg  fw-bold text-nowrap" @click="open = true">Order Details</button>
                            <form action="{{route('orders.destroy', $order->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-lg btn-danger">Delete</button>
                            </form>
                        </div>
                        <div x-show="open" @click.away="open = false" class="m-3">
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
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center">
                {{$orders->render()}}
            </div>
            @else
                <h1 class="text-center"> No Orders</h1>
            @endif
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('title')
    Products
@endsection
@section('content')
    <div class="col-12">
        <h1>Products</h1>
        <div class="d-flex justify-content-center p-3">
            <a href="{{route('products.index')}}"
               class="badge badge-primary m-1 p-3">All</a>
            @foreach($brands as $brand)
                <a href="{{route('productsPerBrand', $brand->id)}}"
                   class="badge badge-primary m-1 p-3">{{$brand->name}}</a>
            @endforeach
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Brand</th>
                <th>Name</th>
                <th>Body</th>
                <th>Price</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($products)
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>
                            <img width="auto" height="62"
                                 src="{{$product->photo ? asset('img/products'. $product->photo->file)  : 'http://via.placeholder.com/62'}}"
                                 alt="{{$product->name}}">
                        </td>
                        <td>{{$product->productcategory ? $product->productcategory->name : 'no category'}}</td>
                        <td>{{$product->brand ? $product->brand->name : 'no brand'}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->body}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->created_at->diffForHumans()}}</td>
                        <td>{{$product->updated_at->diffForHumans()}}</td>
                        <td>
                            <a class="btn btn-warning mr-1" href="{{route('products.edit', $product->id)}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="alert alert-warning">
                        {{session('products_message')}}
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
        <div class="text-center">
            {{$products->links()}}
        </div>
    </div>
@stop

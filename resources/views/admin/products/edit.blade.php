@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Edit Product</h1>
        @include('includes.form_error')
        <div class="row">
            <div class="col-6">
                <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="{{$product->name}}" type="text" name="name" id="name" class="form-control" placeholder="Title...">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="" id="">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if($product->brand->name == $brand->name) selected @endif>{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="" id="">
                            @foreach($productcategory as $productcate)
                                <option value="{{$productcate->id}}" @if($product->productcategory->name == $productcate->name) selected @endif>{{$productcate->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                    <label for="body">Description</label>
                    <textarea class="form-control" name="body" id="body" cols="100%" rows="7" placeholder="Description...">{{$product->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo_id" id="ChooseFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Product</button>
                </form>
            </div>
            <div class="col-6">
                <p>Featured Image</p>
                <img class="img-fluid img-thumbnail" src="{{$product->photo ? asset($product->photo->file) : 'http://via.placeholder.com/400'}}" alt="{{$product->title}}">
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Create Product</h1>
        @include('includes.form_error')
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Title...">
                    </div>
                    <div class="form-group">
                        <label for="published_date">Published Date</label>
                        <input type="text" name="published_date" id="published_date" class="form-control" placeholder="Published Date...">
                    </div>
                    <div class="form-group">
                        <label for="writer">Writer</label>
                        <input type="text" name="writer" id="writer" class="form-control" placeholder="Writer...">
                    </div>
                    <div class="form-group">
                        <label for="penciled">Penciled</label>
                        <input type="text" name="penciled" id="penciled" class="form-control" placeholder="Penciled...">
                    </div>
                    <div class="form-group">
                        <label for="item_number">Item Number</label>
                        <input type="text" name="item_number" id="item_number" class="form-control" placeholder="Item Number...">
                    </div>
                </div>
                <div class="col-6">

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Price...">
                    </div>
                    <div class="form-group">
                        <label for="brand">Brand</label>
                        <select name="brand_id" class="form-control custom-select">
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="brand">Product Category</label>
                        <select name="category_id" class="form-control custom-select">
                            @foreach($productcategories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="body" cols="100%" rows="5" placeholder="Description..."></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo_id" id="ChooseFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>
    </div>

@endsection

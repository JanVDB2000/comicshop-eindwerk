@extends('layouts.admin')
@section('content')
    <div class="col-12">
        <h1>Update Products</h1>
        @include('includes.form_error')
        <div class="row">
            <div class="col-6">
                <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input value="{{$product->title}}" type="text" name="title" id="title" class="form-control"
                               placeholder="Title...">
                    </div>
                    <div class="form-group">
                        <label for="category">Category (CTRL + CLICK multiple select)</label>
                        <select name="categories[]" class="form-control custom-select" multiple>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($product->categories->contains($category->id)) selected @endif>
                                    {{$category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                <textarea class="form-control" name="body" id="body" cols="100%" rows="10" placeholder="Description...">
                    {{$product->body}}
                </textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo_id" id="ChooseFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </form>
            </div>
            <div class="col-6">
                <label for="">Featured Image</label>
                <img class="img-fluid img-thumbnail" src="{{$product->photo ? asset($product->photo->file) : 'http://via.placeholder.com/400'}}" alt="{{$product->title}}">
            </div>
        </div>


    </div>

@endsection

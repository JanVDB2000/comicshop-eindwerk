@extends('layouts.admin')
@section('seo')
    Reviews, crud
@endsection
@section('title')
    Reviews
@endsection
@section('content')

    <div class="col-12">
        @if(Session::has('user_message'))
            <p class="alert alert-info">{{session('user_message')}}</p>
        @endif
    </div>
    <h1>Reviews</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>Products</th>
            <th>Stars</th>
            <th>Users</th>
            <th>Bodys</th>
            <th>Deleted</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->product->name}}</td>
                <td>{{$review->stars}}</td>
                <td>{{$review->user->name}}</td>
                <td>{{$review->description}}</td>
                <td><form action="{{route('reviews.destroy', $review->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
    {{$reviews->render()}}
@endsection

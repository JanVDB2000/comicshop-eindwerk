@extends('layouts.admin')
@section('seo')
    users, crud
@endsection
@section('title')
    Users
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
            <th>Photo</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
            <th>File</th>
            <th>Deleted</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection

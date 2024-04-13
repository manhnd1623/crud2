@extends('layouts.master')

@section('content')
    <h1>Form tạo mới Post</h1>

    @if(\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title">

        <label for="describe" class="mt-3">Describe</label>
        <textarea name="describe" class="form-control" id="describe" cols="30" rows="10"></textarea>

        <label for="status" class="mt-3">Status</label> <br>

        <input type="radio" name="status" id="status-1" value="{{ \App\Models\Post::STATUS_DRAFT }}">
        <label for="status-1">DRAFT</label>

        <input type="radio" name="status" id="status-2" value="{{ \App\Models\Post::STATUS_PUBLISHED }}">
        <label for="status-2">PUBLISHED</label>

        <br>
        <a href="{{ route('posts.index') }}" class="btn btn-info mt-3">Trang danh sách</a>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection

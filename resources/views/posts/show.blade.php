@extends('layouts.master')

@section('content')
    <h1>Thông tin chi tiết Post: {{ $post->title }}</h1>

    <ul>
        <li>Title: {{ $post->title }}</li>
        <li>Describe: {{ $post->describe }}</li>
        <li>Status: {{ $post->status }}</li>
    </ul>

    <a href="{{ route('posts.index') }}" class="btn btn-info mt-3">Trang danh sách</a>
@endsection

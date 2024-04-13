@extends('layouts.master')

@section('content')
    <h1>Xem chi tiết: {{ $category->name }}</h1>

    <ul>
        <li>ID: {{ $category->id }}</li>
        <li>Name: {{ $category->name }}</li>
        <li>Img: <img src="{{ \Storage::url($category->img) }}" alt="" width="50px"> </li>
        <li>IsActive: {{ $category->is_active ? 'Active' : 'InActive' }}</li>
    </ul>

    <a href="{{ route('categories.index') }}" class="btn btn-info">Quay lại  danh sách</a>
@endsection
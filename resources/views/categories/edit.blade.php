@extends('layouts.master')

@section('content')
    <h1>Cập nhật danh mục: {{ $category->name }}</h1>

    @if(\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.update', $category) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">

        <label for="img">Img</label>
        <input type="file" class="form-control" name="img" id="img">
        <img src="{{ \Storage::url($category->img) }}" alt="" width="50px">

        <label for="excerpt">Excerpt</label>
        <textarea class="form-control" name="excerpt" id="excerpt">{{ $category->excerpt }}</textarea>

        <label for="is_active">IsActive</label>

        <input type="radio" value="{{ \App\Models\Category::ACTIVE }}"
               @if($category->is_active == \App\Models\Category::ACTIVE) checked @endif
               name="is_active" id="is_active-1">
        <label for="is_active-1">Active</label>

        <input type="radio" value="{{ \App\Models\Category::INACTIVE }}"
               @if($category->is_active == \App\Models\Category::INACTIVE) checked @endif
               name="is_active" id="is_active-2">
        <label for="is_active-2">InActive</label>

        <br><br>
        <a href="{{ route('categories.index') }}" class="btn btn-info">Quay lại  danh sách</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
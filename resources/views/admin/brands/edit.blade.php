@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Form cập nhật Brand: {{ $brand->name }}</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">

                @if(\Session::has('msg'))
                    <div class="alert alert-success">
                        {{ \Session::get('msg') }}
                    </div>
                @endif

                <form action="{{ route('admin.brands.update', $brand) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $brand->name }}">

                    <label for="img" class="mt-3">Img</label>
                    <input type="file" name="img" class="form-control" id="img">
                    <img src="{{ \Storage::url($brand->img) }}" alt="" width="50px">

                    <label for="is_show" class="mt-3">Is Show</label> <br>

                    <input type="radio" name="is_show" id="is_show-1"
                           @if($brand->is_show == \App\Models\Brand::SHOW) checked @endif
                           value="{{ \App\Models\Brand::SHOW }}">
                    <label for="is_show-1">SHOW</label>

                    <input type="radio" name="is_show" id="is_show-2"
                           @if($brand->is_show == \App\Models\Brand::INSHOW) checked @endif
                           value="{{ \App\Models\Brand::INSHOW }}">
                    <label for="is_show-2">HIDE</label>

                    <br>
                    <a href="{{ route('admin.brands.index') }}" class="btn btn-info mt-3">Trang danh sách</a>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
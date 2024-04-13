@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm mới Car</h1>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">

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

                <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name">

                    <label for="name">Brand</label>
                    <select name="brand_id" id="brand_id" class="form-control">

                        @foreach($brands as $id => $name)
                            <option value="{{ $id }}">{{ $id }} - {{ $name }}</option>
                        @endforeach
                    </select>

                    <label for="img_thumbnail" class="mt-3">Img Thumbnail</label>
                    <input type="file" name="img_thumbnail" class="form-control" id="img_thumbnail">

                    <label for="describe" class="mt-3">Describe</label>
                    <textarea name="describe" class="form-control" id="describe"></textarea>

                    <br>
                    <a href="{{ route('admin.cars.index') }}" class="btn btn-info mt-3">Trang danh sách</a>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
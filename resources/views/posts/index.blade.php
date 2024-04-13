@extends('layouts.master')

@section('content')
    <h1>Danh sách bài POST</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-primary">Thêm mới</a>

    <table class="table mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Img</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>

        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <img src="{{ asset($item->img) }}" alt="" width="50px">
                </td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('posts.show', $item) }}" class="btn btn-info">Show</a>

                    <a href="{{ route('posts.edit', $item) }}" class="btn btn-primary">Edit</a>

                    <form id="item-{{ $item->id }}" action="{{ route('posts.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger" onclick="
                            if (confirm('Có chắc chắn xóa không?')) {
                                document.getElementById('item-{{ $item->id }}').submit();
                            }
                        ">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $data->links() }}
@endsection

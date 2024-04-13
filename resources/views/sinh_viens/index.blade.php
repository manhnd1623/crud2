@extends('layouts.master')

@section('content')
    <h1>Danh sách sinh viên</h1>

    <a href="{{ route('sinh_viens.create') }}" class="btn btn-primary">Thêm mới</a>

    <table class="table mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên lớp</th>
            <th>Mã sinh viên</th>
            <th>Tên sinh viên</th>
            <th>Img</th>
            <th>Trạng thái</th>
            <th>Các nút</th>
        </tr>
        </thead>

        <tbody>

        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->tenlop }}</td>
                <td>{{ $item->masv }}</td>
                <td>{{ $item->tensv }}</td>
                <td>
                    <img src="{{ asset($item->img) }}" alt="" width="50px">
                </td>
                <td>{{ $item->trangthai ? 'Có mặt' : 'Vắng mặt' }}</td>
                <td>
                    <a href="{{ route('sinh_viens.show', $item) }}" class="btn btn-info">Show</a>

                    <a href="{{ route('sinh_viens.edit', $item) }}" class="btn btn-primary">Edit</a>

                    <form  action="{{ route('sinh_viens.destroy', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="
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

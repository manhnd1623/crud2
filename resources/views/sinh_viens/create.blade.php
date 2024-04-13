@extends('layouts.master')

@section('content')
    <h1>Form tạo mới sinh viên</h1>

    @if(\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
    @endif

    <form action="{{ route('sinh_viens.store') }}" method="POST">
        @csrf

        <label for="tenlop">Tên lớp</label>
        <input type="text" class="form-control" name="tenlop" id="tenlop">

        <label for="masv">Mã sinh viên</label>
        <input type="text" class="form-control" name="masv" id="masv">

        <label for="tensv">Tên sinh viên</label>
        <input type="text" class="form-control" name="tensv" id="tensv">
        
        <label for="trangthai" class="mt-3">Trạng thái</label> <br>

        <input type="radio" name="trangthai" id="trangthai-1" value="{{ \App\Models\SinhVien::ACTIVE }}">
        <label for="trangthai-1">Có mặt</label>

        <input type="radio" name="trangthai" id="trangthai-2" value="{{ \App\Models\SinhVien::INACTIVE }}">
        <label for="trangthai-2">Vắng mặt</label>

        <br>

        

        <a href="{{ route('sinh_viens.index') }}" class="btn btn-info mt-3">Trang danh sách</a>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection

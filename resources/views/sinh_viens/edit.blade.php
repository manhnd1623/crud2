@extends('layouts.master')

@section('content')
    <h1>Form cập nhật sinh viên: {{ $sinhVien->title }}</h1>

    @if(\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
    @endif

    <form action="{{ route('sinh_viens.update', $sinhVien) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="tenlop">Tên lớp</label>
        <input type="text" class="form-control" name="tenlop" id="tenlop" value="{{ $sinhVien->tenlop }}">

        <label for="masv">Mã sinh viên</label>
        <input type="text" class="form-control" name="masv" id="masv" value="{{ $sinhVien->masv }}">

        <label for="tensv">Tên Sinh viên</label>
        <input type="text" class="form-control" name="tensv" id="tensv" value="{{ $sinhVien->tensv }}">

        

        <label for="trangthai" class="mt-3">Trạng thái</label> <br>

        <input type="radio" name="trangthai" id="trangthai-1"
                @if($sinhVien->trangthai == \App\Models\SinhVien::ACTIVE) checked @endif
                value="{{ \App\Models\SinhVien::ACTIVE }}">
        <label for="trangthai-1">Có mặt</label>

        <input type="radio" name="trangthai" id="trangthai-2"
                @if($sinhVien->trangthai == \App\Models\SinhVien::INACTIVE) checked @endif
                value="{{ \App\Models\SinhVien::INACTIVE }}">
        <label for="trangthai-2">Vắng mặt</label>
        <br>
        

        
        <a href="{{ route('sinh_viens.index') }}" class="btn btn-info mt-3">Trang danh sách</a>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection

@extends('layouts.master')

@section('content')
    <h1>Thông tin của sinh viên: {{ $sinhVien->tenlop }}</h1>

    <ul>
        <li>Tenlop: {{ $sinhVien->tenlop }}</li>
        <li>Masv: {{ $sinhVien->masv }}</li>
        <li>Tensv: {{ $sinhVien->tensv }}</li>
        <li>Trangthai: {{ $sinhVien->trangthai }}</li>
        <li>Ghichu: {{ $sinhVien->ghichu }}</li>
    </ul>

    <a href="{{ route('sinh_viens.index') }}" class="btn btn-info mt-3">Trang danh sách</a>
@endsection

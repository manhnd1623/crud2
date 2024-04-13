@extends('layouts.master')

@section('content')
    <h1>Xem chi tiết: {{ $customer->name }}</h1>

    <ul>
        <li>ID: {{ $customer->id }}</li>
        <li>Img: <img src="{{ \Storage::url($customer->img) }}" alt="" width="50px"> </li>
        <li>Name: {{ $customer->name }}</li>
        <li>Date: {{ $customer->date }}</li>
        <li>Mail: {{ $customer->mail }}</li>
        <li>Phone: {{ $customer->phone }}</li>
        <li>Country: {{ $customer->country }}</li>
        <li>Order: {{ $customer->order }}</li>

    </ul>

    <a href="{{ route('customers.index') }}" class="btn btn-info">Quay lại  danh sách</a>
@endsection
@extends('layouts.master')

@section('content')

<h1>Add new Detail</h1>

     @if(\Session::has('msg'))
        <div class="alert alert-danger">
            {{ \Session::get('msg') }}
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="img">Img</label>
        <input type="file" class="form-control" name="img" id="img">

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">
        
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">  

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">
        
        <br><br>
        <a href="{{ route('customers.index') }}" class="btn btn-info">Back Menu</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection

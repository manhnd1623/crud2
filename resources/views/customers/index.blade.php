@extends('layouts.master')

@section('content')
<h1>Custormers information</h1>

<a href="{{ route('customers.create') }}" class="btn btn-warning">Add</a>

@if (\Session::has('msg'))
    <div class="alert alert-success">
        {{ \Session::get('msg') }}
    </div>
    
@endif

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Img</td>
            <td>Name</td>
            <td>Date</td>
            <td>Mail</td>
            <td>Phone</td>
            <td>Country</td>
            <td>Order</td>
            <td>Action</td>
        </tr>

        @foreach ($data as $item )
            <tr>
                <td>{{ $item->id }}</td>
                <td> <img src="{{ \Storage::url($item->img) }}" alt="" width="50px"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->mail }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->country }}</td>
                <td>{{ $item->order }}</td>
                <td>
                    <a href="{{ route('customers.show', $item) }}" class="btn btn-warning">Show</a>
                    <a href="{{ route('customers.edit', $item) }}" class="btn btn-info">Edit</a>

                    
                    <form action="{{ route('customers.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete?')">Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

{{  $data->links() }}
@endsection
@extends('layouts.app')

@section('content')
<style>
    .container {
        padding: 40px;
        background-color: #f4f4f4;
        margin-top: 30px;
        border-radius: 20px;
    }


    h4 {
    margin: 2rem 0rem 1rem;
    }

    .table-image td, .table-image th {
    vertical-align: middle;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div>
                <h3 class="mb-4">Products list</h3>
                <a href="{{ url('/create') }}"><button type="button" class="btn btn-primary mb-4">Add new product</button></a>
            </div>
            <table class="table table-image">
            <thead>
                <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Rating</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td style="width: 15%">
                            <img src="{{ asset('images/'.$item->image) }}" class="img-fluid img-thumbnail " alt="Sheep">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category }}</td>
                        <td>${{ $item->price }}</td>
                        <td>{{ $item->rating }}/10</td>
                        <td>
                            <form method="POST" action="{{ url('delete/'.$item->id) }}">
                                @csrf
                                @method('delete')
                                <a href="{{ url('update/'.$item->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>   
        </div>
    </div>
</div>
@endsection
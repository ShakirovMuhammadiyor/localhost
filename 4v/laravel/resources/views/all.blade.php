@extends('layouts.app')

@section('content')
<style>
    .container {
        padding: 40px;
        background-color: #f4f4f4;
        margin-top: 30px;
        border-radius: 20px;
    }

    body {
        background: #cc2b5e;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #753a88, #cc2b5e);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #753a88, #cc2b5e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

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
                <h3 class="mb-4">Articles List</h3>
                <a href="{{ url('/create') }}"><button type="button" class="btn btn-secondary mb-4">Create new</button></a>
            </div>
            <table class="table table-image">
            <thead>
                <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Subject</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td style="width: 15%">
                            <img src="{{ asset('images/'.$item->image) }}" class="img-fluid img-thumbnail " alt="Sheep">
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>{{ $item->creation_date }}</td>
                        <td><a href="{{ url('/update/'.$item->id) }}"><button type="button" class="btn btn-primary">Edit</button></a></td>
                    </tr>
                @endforeach
            </tbody>
            </table>   
        </div>
    </div>
</div>
@endsection
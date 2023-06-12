@extends('layouts.app')
 
@section('content')
<style>
    body {
        background: #00b09b;
        background: -webkit-linear-gradient(to right, #00b09b, #96c93d);
        background: linear-gradient(to right, #00b09b, #96c93d);
        min-height: 100vh;
    }

    .text-gray {
        color: #aaa;
    }
</style>
<div class="container py-5">

    <div class="row text-white mb-3">
        <div class="col-lg-8 mx-auto">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn btn-success btn-block mb-2">{{ $message }}</button>
          </div>
          @endif 
            <a href="{{ url("/create") }}"><button type="button" class="btn btn-light btn-block">Create new</button><a>
        </div>
    </div>
  
    <div class="row">
      <div class="col-lg-8 mx-auto">
  
        <!-- List group-->
        <ul class="list-group shadow">

          @foreach ($products as $product)
            <li class="list-group-item">
              <!-- Custom content-->
              <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                <div class="media-body order-2 order-lg-1">
                  <h5 class="mt-0 font-weight-bold mb-2">{{ $product->name }}</h5>
                  <p class="font-italic text-muted mb-0 small">{{ $product->description }}</p>
                  <div class="d-flex align-items-center justify-content-between mt-1">
                    <h6 class="font-weight-bold my-2">${{ $product->price }}</h6>
                    <ul class="list-inline small">
                      @for ($i = 0; $i < $product->rating; $i++)
                        <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                      @endfor
                    </ul>
                    <form action="{{ url("/delete/".$product->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                </div><img src="{{ asset('/images/'.$product->image) }}" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
              </div>
              <!-- End -->
            </li>
          @endforeach
  
        </ul>
        <!-- End -->
      </div>
    </div>
  </div>
@endsection
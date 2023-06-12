@extends('layouts.app')
 
@section('content')
<style>.form-control:focus{box-shadow:none}.form-control-underlined{border-width:0 0 1px;border-radius:0;padding-left:0}body{background:#ffd89b;background:-webkit-linear-gradient(to right,#ffd89b,#19547b);background:linear-gradient(to right,#ffd89b,#19547b);min-height:100vh}.form-control::placeholder{font-size:.95rem;color:#aaa;font-style:italic}</style>
<div class="container flex justify-content-center">
    <!-- For demo purpose -->
    <div class="row py-5">
      <div class="col-lg-9 mx-auto text-white text-center">
        <h1 class="display-4">Qidiruv tizimi</h1>
      </div>
    </div>
    <!-- End -->
  
  
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="bg-white p-5 pb-2 rounded shadow">
          <form action="" method="GET">
            <div class="input-group border rounded-pill p-1">
              <div class="input-group-prepend border-0">
                <button id="button-addon4" type="button" class="btn btn-link text-info"><i class="fa fa-search"></i></button>
              </div>
              <input type="search" name="search" placeholder="What're you searching for?" aria-describedby="button-addon4" class="form-control bg-none border-0">
            </div>
            <p class="mt-3">Please enter * to get all results</p>
          </form>
        </div>
      </div>
    </div>

    @if (isset($data))
    <div class="row py-5">
        <div class="col-lg-10 mx-auto">
          <div class="card rounded shadow border-0">
            <div class="card-body p-5 bg-white rounded">
              <div class="table-responsive">
                @if (count($data) == 0)
                    <p>No records match your input</p>
                @else
                <p>{{ count($data) }} redords have been found</p>
                <table id="example" style="width:100%" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Image</th>
                      <th>Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td><img style="width: 150px;" src="{{ $item->img }}" /></td>
                            <td>{{ $item->desc }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                @endif 
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
    @endif
@endsection
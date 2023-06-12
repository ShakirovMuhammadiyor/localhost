@extends('layouts.app')

@section('content')
<style>
  .btn-color{
background-color: #0e1c36;
color: #fff;

}

.profile-image-pic{
height: 200px;
width: 200px;
object-fit: cover;
}



.cardbody-color{
background-color: #ebf2fa;
}

a{
text-decoration: none;
}
</style>



<div class="container">
  <div class="row">
      <h2 class="text-center text-dark mt-5">Register Form</h2>
    <div class="col-md-6 offset-md-3">
      <div class="card my-5">

        <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ route('registerAction') }}">
          @csrf
          <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" class="mb-5" width="200px" alt="profile">
          </div>

          <div class="mb-3">
            <input type="text" class="form-control" name="name" id="Username" aria-describedby="emailHelp"
              placeholder="Enter your name">
          </div>
          <div class="mb-3">
              <input type="email" class="form-control" id="password" name="email" placeholder="Your Email address">
          </div>
          <div class="mb-3">
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter a password">
          </div>
          <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Register</button></div>
          <div id="emailHelp" class="form-text text-center mb-5 text-dark">Registered? <a href="{{ route('login') }}" class="text-dark fw-bold">Login</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endsection
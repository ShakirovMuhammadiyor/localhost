@extends('layouts.app')

@section('content')
    <div class="container-fluid">
     <p>This is a main page</p>
     @auth 
        <p>You are authorized.</p>
        <p>Your name: {{ Auth::user()->name }}</p>
        <p>You have access to view protected page</p>
     @endauth

     @guest
         <p>You are guest. Please login or register to gain access to protreced page</p>
     @endguest
    </div>
@endsection
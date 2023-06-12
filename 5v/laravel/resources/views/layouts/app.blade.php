<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <a class="navbar-brand">Aleks Universe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('mainPage') }}">Main</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('protectedPage') }}">Protected</a>
            </li>
            @guest 
            <li class="nav-item">
              <a class="nav-link" href="{{ route('registerPage') }}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            @endguest
            @auth
              <li class="nav-item">
                <form id="logout-form" action="{{ route('logoutAction') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary" style="margin-left: 10px;">Logout</button>
                </form>
              </li>
            @endauth
          </ul>
        </div>
      </nav>

      @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn btn-success btn-block mb-2">{{ $message }}</button>
          </div>
        @endif 

      @yield('content')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website - File: @yield('title')</title>
    <!-- Put the neccesary css links in here -->
</head>
<body>
    <p>Delete me and place a header or navbar, etc.. (I am inside layout.blade.php)</p>

    <div class="main container">
        @yield('content')
    </div>

    <p>Delete me and place a footer (I am inside layout.blade.php)</p>
</body>
</html>
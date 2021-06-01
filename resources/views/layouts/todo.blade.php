<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/todo.css') }}">
</head>
<body>
    <div class="container-fluied">
        <div class="row">
            <div class="top">
                <div class="top-left">
                    <h2>{{ __('content.Todo list') }}</h2>
                    <br>
                    <a href="/setLocal-en">{{ __('content.English') }}</a>
                    <a href="/setLocal-vi">{{ __('content.Vietnamese') }}</a>
                </div>
                <div class="top-right">
                    <span>{{ Auth::user()->name }}</span>
                    <a href="{{ route('auth.logout') }}">{{ __('content.Logout') }}</a>
                </div>
            </div>         
        </div> 
    </div>
    @yield('content')
</body>
</html>
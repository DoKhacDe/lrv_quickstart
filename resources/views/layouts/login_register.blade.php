<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án mới</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body >
    <div class="container">
        <div class="row" style="margin-top:80px ;">
            <div class="col-md-4 col-md-offset-4">
                <a href="/setLocal-en">{{ __('content.English') }}</a>
                <a href="/setLocal-vi">{{ __('content.Vietnamese') }}</a>
                @yield('login_register_content')
            </div>
        </div>
    </div>
</body>
</html>
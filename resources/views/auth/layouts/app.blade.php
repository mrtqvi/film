<!DOCTYPE html>
<html dir="" lang="fa-IR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/app/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/fonts.css') }}" rel="stylesheet">
    <title>سریا فیلم | ورود</title>
    <title>{{ $title ?? '<بدون عنوان>' }}</title>
</head>

<body
    class="font-sans bg-black z-50 h-screen  bg-cover bg-no-repeat">

@yield('content')

@yield('script')

</body>

</html>

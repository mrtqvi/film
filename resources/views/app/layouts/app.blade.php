<!doctype html>
<html dir="rtl">

<head>
    @include('app.layouts.includes.head-tag')
    @yield('head-tag')
    <title>{{ $title ?? '<بدون عنوان>' }}</title>
</head>

<body class="bg-main font-sans">
    @include('app.layouts.includes.navbar')

    <!-- start sidebar -->
    <div class="flex">
        @include('app.layouts.includes.sidebar')
        <main class="mb-10 text-gray-400 relative w-full md:w-[calc(100%_-_255px)]">
            @yield('content')

            @include('app.layouts.includes.footer')
        </main>
    </div>
    <!-- end sidebar -->

    @include('app.layouts.includes.script')
    @yield('script')
</body>

</html>

<!doctype html>
<html lang="fa" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('assets/app/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/plugins/video-js/video-js.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/plugins/video-js/quality-selector.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/app/plugins/video-js/video.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/video-js/videojs-quality-selector.min.js') }}"></script>
    <title> فال و فیلم | {{ $movies->fa_title }}</title>
</head>
<body class="bg-low-dark">

<div class="w-full">
    <video id="video" class="video-js vjs-default-skin rounded-lg w-full h-screen" controls preload="auto">
        @foreach($movies->videosable as $video)
            <source src="{{ asset($video->video) }}" type="video/mp4" label="{{ $video->quality }}P">
        @endforeach
    </video>
</div>

<script>
    var options, player;

    options = {
        controlBar: {
            children: [
                'playToggle',
                'progressControl',
                'volumePanel',
                'qualitySelector',
                'fullscreenToggle',
            ],
        },
    };

    player = videojs('video', options);
</script>
</body>
</html>


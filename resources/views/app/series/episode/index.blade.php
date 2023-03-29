@extends('app.layouts.app', ['title' => 'اپیزود'])

@section('head-tag')
    <link href="{{ asset('assets/app/plugins/video-js/video-js.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/plugins/video-js/quality-selector.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/app/plugins/video-js/video.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/video-js/videojs-quality-selector.min.js') }}"></script>
@endsection


@section('content')
    <div class="flex items-center p-4 mt-5 space-x-2 space-x-reverse text-2xl">
        <span>{{ $episode->title }}</span>
    </div>
    <div class="w-full">
        @auth
            <video id="video" class="video-js vjs-default-skin rounded-lg w-full h-screen" controls preload="auto">
                @foreach ($episode->videosable as $video)
                    <source src="{{ asset($video->video) }}" type="video/mp4" label="{{ $video->quality }}P">
                @endforeach
            </video>
        @endauth
        @guest
            <section>
                <div class="w-full h-[450px] relative">
                    <img src="{{ asset($episode->image) }}" class="w-full blur-sm bg-cover h-[400px]  object-cover relative"
                        alt="">
                    <div class="bg-gradient-to-t from-[#191a1f] to-transparent w-full h-[400px] top-0 absolute">
                        <div class="flex flex-col flex-wrap w-full h-full md:px-16 px-5 justify-center items-center mt-14">
                            <div class="absolute top-16 text-white text-lg">
                                <h4>برای تماشا ابتدا وارد حساب کاربری خود شوید</h4>
                            </div>
                            <div class="flex items-center space-x-3 space-x-reverse absolute top-36">
                                <a href="{{ route('login') }}"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">ورود</a>
                                <a href="{{ route('register') }}"
                                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">ثبت
                                    نام</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endguest
    </div>
    @if ($nextepisodes->isNotEmpty())
        <div class="flex items-center px-4 mt-5 space-x-2 space-x-reverse text-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062A1.125 1.125 0 013 16.81V8.688zM12.75 8.688c0-.864.933-1.405 1.683-.977l7.108 4.062a1.125 1.125 0 010 1.953l-7.108 4.062a1.125 1.125 0 01-1.683-.977V8.688z" />
            </svg>
            <span>قسمت های بعدی</span>
        </div>
        <div class="grid grid-cols-12 mt-8 px-4">
            @foreach ($nextepisodes as $seriesEpisode)
                <div class="flex justify-center bg-main rounded col-span-full lg:col-span-6 relative">
                    <div
                        class="flex items-center rounded-lg shadow border min-w-full border-gray-800 md:max-w-full md:flex-row relative">
                        <img class="w-44 h-44 object-cover rounded-3xl p-4" src="{{ asset($seriesEpisode->image) }}"
                            alt="" />
                        <div class="flex flex-col justify-start p-6 w-full">
                            <h5 class="my-2 text-gray-400">
                                {{ $seriesEpisode->title }}
                            </h5>
                            <p class="mb-4 text-xs text-gray-500 leading-6">
                                {{ Str::limit($seriesEpisode->description, 120, '...') }}
                            </p>
                            <div class="flex justify-between">
                                <a href="{{ route('episode', $seriesEpisode->id) }}"
                                    class="flex text-xs h-8 px-2   items-center  bg-yellow-500 hover:bg-yellow-600 text-slate-900 transition-all delay-200 py-2  rounded">
                                    <svg class=" ml-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                    تماشا
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    </ <!-- comment -->
    <section class="py-8 lg:py-16" id="comments">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-200 ">دیدگاه
                    ({{ $episode->comments()->approved()->get()->count() }})</h2>
            </div>
            @if ($message = session('success'))
                <div class="flex p-4 mb-4 text-sm rounded-lg bg-low-dark text-green-400 border border-green-400"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 ml-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">موفقیت آمیز</span> {{ $message }}
                    </div>
                </div>
            @endif
            <form action="{{ route('comment.store') }}" class="mb-6" method="post">
                @csrf
                <input type="hidden" name="commentable_id" value="{{ $episode->id }}">
                <input type="hidden" name="commentable_type" value="{{ get_class($episode) }}">
                <div class="py-2 px-4 mb-4 rounded-lg rounded-t-lg  bg-low-dark ">
                    <label for="comment" class="sr-only"></label>
                    <textarea id="comment" rows="2" name="comment"
                        class="px-0 w-full text-sm 0 border-0 focus:ring-0 focus:outline-none text-white placeholder-gray-400 bg-low-dark"
                        placeholder="دیدگاه خود را بنویسید ..." required></textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-green-500 rounded-lg f hover:bg-green-600">
                    اضافه کردن دیدگاه
                </button>
            </form>
            <article class=" text-base  rounded-lg">
                @foreach ($episode->comments()->approved()->get() as $comment)
                    <section class="bg-low-dark p-6 mb-3 rounded">
                        <section class="flex flex-col justify-between">
                            <div class="flex items-center">
                                <p class="inline-flex items-center ml-3 text-sm text-white"><img
                                        class="ml-2 w-10 h-10 rounded-full object-cover"
                                        src="{{ asset($comment->user->profile()) }}"
                                        alt="{{ $comment->user->full_name }}">{{ $comment->user->full_name }}</p>
                                <p class="text-sm text-gray-400"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">{{ jalaliDate($comment->created_at, '%d %B %Y') }}</time>
                                </p>
                            </div>
                        </section>
                        <div class="text-gray-500 dark:text-gray-400 mt-2">{{ $comment->comment }}</d>
                    </section>
                @endforeach
            </article>
        </div>
    </section>
    <!-- end comment -->
@endsection

@section('script')
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
@endsection

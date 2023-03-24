@extends('app.layouts.app', ['title' => 'اپیزود'])

@section('head-tag')
    <link href="{{ asset('assets/app/plugins/video-js/video-js.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/app/plugins/video-js/quality-selector.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/app/plugins/video-js/video.js') }}"></script>
    <script src="{{ asset('assets/app/plugins/video-js/videojs-quality-selector.min.js') }}"></script>
@endsection


@section('content')
    <div class="w-full">
        <video id="video" class="video-js vjs-default-skin rounded-lg w-full h-screen" controls preload="auto">
            @foreach($episode->videosable as $video)
            <source src="{{ asset($video->video) }}" type="video/mp4" label="{{ $video->quality }}P">
            @endforeach
        </video>
    </div>


    <!-- comment -->
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

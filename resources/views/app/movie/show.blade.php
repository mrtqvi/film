@extends('app.layouts.app', ['title' => "سریال $movie->fa_title"])

@section('content')
    <section>
        <div class="w-full h-[450px]">
            <img src="{{ asset($movie->wallpaper) }}" class="w-full h-[400px]  object-cover relative" alt="">
            <div class="bg-gradient-to-t from-[#191a1f] to-transparent w-full h-[400px] top-0 absolute">
                <div class="flex flex-row flex-wrap w-full md:px-16 px-5 h-full justify-center items-end mt-14">
                    <div class="grid grid-cols-12">
                        <div class="flex col-span-12 w-auto">
                            <div
                                class="bg-gray-300/20  flex text-center rounded-2xl  justify-center items-center font-light text-sm md:h-[120px] h-16 w-56 ">
                                <div class="pl-1 flex justify-center items-center">
                                    <p
                                        class="text-white md:mr-3 md:mt-2 md:text-xl sm:text-sm text-xs text-center font-bold z-30">
                                        126 دقیقه</p>
                                </div>
                            </div>
                            <div
                                class="bg-gray-300/20  mr-4 flex text-center rounded-2xl  justify-center items-center font-light text-sm md:h-[120px] h-16 w-56 ">
                                <div class="pl-1 flex justify-center items-center">
                                    <p
                                        class="text-white md:mr-3 md:mt-2 md:text-xl sm:text-sm text-xs text-center font-bold z-30">
                                        IMDB {{ $movie->imdb }}</p>
                                </div>
                            </div>
                            <div
                                class="bg-gray-300/20  mr-4 flex text-center rounded-2xl  justify-center items-center font-light text-sm md:h-[120px] h-16 w-56 ">
                                <div class="pl-1 flex justify-center items-center">
                                    <p
                                        class="text-white md:mr-3 md:mt-2 md:text-3xl sm:text-sm text-xs  text-center font-bold z-30">
                                        {{ $movie->ages }}+</p>
                                </div>
                            </div>
                            <div
                                class="bg-gray-300/20  mr-4 flex text-center rounded-2xl  justify-center items-center font-light text-sm md:h-[120px] h-16 w-56 ">
                                <div class="pl-1 flex justify-center items-center">
                                    <p
                                        class="text-white md:mr-3 md:mt-2 md:text-xl sm:text-sm text-xs text-center font-bold z-30">
                                        {{ $movie->year_construction }}</p>
                                </div>
                            </div>
                            <div
                                class="bg-[#64D947] hover:bg-gray-300/40 transition-all cursor-pointer mr-4 flex  text-center rounded-2xl  justify-center items-center text-white font-light text-sm md:h-[120px] h-16 w-56 ">
                                <div class="pl-1 flex">
                                    <svg class="mt-[2px] w-10  text-white text-5xl flex justify-center items-center"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-play-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="grid grid-cols-12 gap-6 mt-16">
        <div class="lg:col-span-6 col-span-12   flex flex-wrap">
            <div class="">
                <div class="flex md:mr-10 mr-5">
                    <img src="{{ asset($movie->poster) }}" class="w-[142px] h-[200px] md:flex  object-cover rounded-lg"
                        alt="">
                    <div class="">
                        <p class="text-white font-bold text-4xl mr-4 mt-2">{{ $movie->en_title }}</p>
                        <div class="flex justify-start items-center mr-3 mt-3">
                            @foreach ($movie->categories as $movieCategory)
                            <div
                                class="text-gray-300 border-[1px] border-gray-500 md:px-5 px-2 py-1 font-normal text-center md:text-xs text-[10px] rounded-full">
                                {{ $movieCategory->name }}
                            </div>
                            @endforeach
                        </div>
                        <div class="flex">
                            <button
                                class="bg-green-500 mt-6 mr-3 flex hover:bg-green-600 text-white font-bold py-3 md:px-12 px-3  rounded-full">
                                <div class="pl-1 flex">
                                    <svg class="mt-[2px] text-white" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                                    </svg>
                                </div>
                                تماشا
                            </button>
                            @auth
                            <div
                                class="border border-gray-600 flex justify-center items-center w-12 h-12 rounded-full mt-6 mr-2">
                                 @if($movie->user->contains(auth()->user()->id))
                                        <section class="add-to-favorite flex justify-start">
                                            <button
                                                data-url="{{ route('movies.add-to-favorite' , $movie) }}">
                                                <i class="text-red-600 ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"/>
                                                    </svg>
                                                </i>
                                            </button>
                                        </section>
                                    @else
                                        <section class="add-to-favorite">
                                            <button   data-url="{{ route('movies.add-to-favorite' , $movie) }}">
                                                <i>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z"/>
                                                    </svg>
                                                </i>
                                            </button>
                                        </section>
                                    @endif
                            </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-7 ml-10 md:mr-10 mr-5">
                <p class="text-white font-semibold">خلاصه داستان</p>
                <p class="text-gray-400 mt-1 w-full text-sm">
                    {{ $movie->description }}
                </p>
            </div>
        </div>
        <div class="lg:col-span-6  col-span-12 md:mr-10 md:ml-5 mr-5 ml-5 md:mt-0 mt-7 flex flex-wrap">
            <div class="w-full h-64">
                <video src="{{ asset($movie->teaser->teaser ?? '') }}" controls class="rounded-xl"></video>
            </div>
        </div>
    </div>
    <!-- cast -->
    <div class="md:p-10  p-5 ">
        <section class="flex items-center justify-between col-span-12 border-r-4 mb-5 border-[#1AFF23] ">
            <span class="flex items-center font-bold text-white mr-3 ">بازیگران</span>
        </section>
        <div class="swiper">
            <section class="slide-container">
                <div class="swiper-wrapper">
                    @foreach ($movie->actors as $actor)
                        <div class="swiper-slide">
                            <div class="flex justify-center">
                                <img src="{{ asset($actor->image) }}"
                                    class="rounded-full md:w-20 md:h-20 w-14 h-14 flex justify-center items-center object-cover"
                                    alt="">
                            </div>
                            <p class="flex text-sm mt-2 justify-center text-center items-center">{{ $actor->full_name }}</p>
                        </div>
                    @endforeach
                </div>
            </section>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- end cst -->

    <!-- comment -->
    <section class="py-8 lg:py-16" id="comments">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-200 ">دیدگاه
                    ({{ $movie->comments()->approved()->get()->count() }})</h2>
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
                <input type="hidden" name="commentable_id" value="{{ $movie->id }}">
                <input type="hidden" name="commentable_type" value="{{ get_class($movie) }}">
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
                @foreach ($movie->comments()->approved()->get() as $comment)
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
        $('.add-to-favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-red-600');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-red-600')
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

@endsection

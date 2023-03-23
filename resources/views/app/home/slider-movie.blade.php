<!-- start swiper slider new movie-->
<div class="p-6">
    <section class="flex items-center justify-between col-span-12 border-r-4 mb-5 border-[#1AFF23] ">
        <span class="flex items-center font-bold text-white mr-3 ">محبوب ترین ها</span>
    </section>
    <section class="swiper">
        <section class="slide-container ">
            <section class="card-wrapper swiper-wrapper w-52 h-72">
                @foreach($popularFilms as $popularFilm)
                    <section class="swiper-slide flex ">
                        <a href="{{ $popularFilm->show() }}" class="flex justify-center w-full absolute">
                            <img src="{{ asset($popularFilm->poster) }}"
                                 class="object-cover relative rounded-lg  h-64 w-52" alt="">
                            <div
                                class="transition-all flex z-50 bg-black rounded-lg opacity-0 hover:opacity-75 bottom-0 right-0 absolute w-full h-full">
                                <div class="absolute top-10 flex flex-col text-center text-white w-full">
                                    <strong class="font-bold">{{ $popularFilm->fa_title }}</strong>

                                    <small class="text-xs text-gray-400">
                                        @foreach ($popularFilm->categories as $serieCategory)
                                            {{ $serieCategory->name . ' ' }}
                                        @endforeach
                                    </small>
                                    <div class="text-xs text-gray-400 flex justify-between mt-4 mx-7">
                                        <div class="flex justify-center items-center w-full">
                                            {{--                                        <div class="flex">--}}
                                            {{--                                            <span>72%</span>--}}
                                            {{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
                                            {{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />--}}
                                            {{--                                            </svg>--}}
                                            {{--                                        </div>--}}
                                            <div class="flex justify-center items-center">
                                                        <span>
                                                            <small>10 /</small>
                                                            <small class="">{{ $popularFilm->imdb }}</small>
                                                        </span>
                                                </span>
                                                <div class="mr-0.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                         height="20" fill="#bdb722" class="t-icon-0-1-525">
                                                        <path
                                                            d="M11.107 9.587c.1-.424.122-.824.2-1.248l.122-.965.122-.918a7 7 0 0 1 .1-.706l.1-.753c.05-.235.073-.494.1-.73.024-.212 0-.212.22-.212h3.746c.122 0 .147.024.147.14V15.78c0 .094-.024.14-.122.14h-2.36c-.122 0-.147-.024-.147-.14v-6.3h-.024l-.27 1.46-.245 1.295-.22 1.295-.2 1.13-.22 1.177c-.024.094-.05.118-.147.118h-1.662c-.05 0-.1 0-.1-.07l-.343-1.837-.367-1.884-.367-1.978-.147-.73v6.357c0 .118-.024.165-.147.165h-2.4c-.122 0-.147-.024-.147-.14V4.242c0-.094.024-.14.122-.14h3.453c.073 0 .122 0 .147.094l.27 1.483.294 1.6.22 1.32a3.5 3.5 0 0 1 .272.99zm6.288.3V4.195c0-.14.05-.165.17-.165h3.942a4.46 4.46 0 0 1 1.665.235 2.66 2.66 0 0 1 1.175.8 2.25 2.25 0 0 1 .367.894 6.31 6.31 0 0 1 .049 1.176v6.352a1.8 1.8 0 0 1-.661 1.459 2.76 2.76 0 0 1-1.1.518 6.59 6.59 0 0 1-1.665.212l-3.8.024c-.122 0-.1-.07-.1-.14l-.043-5.67zm2.9-.094v3.858c0 .094.024.118.122.118a4.51 4.51 0 0 0 .563-.024.56.56 0 0 0 .514-.588V6.383c.006-.183-.1-.35-.27-.423a2.18 2.18 0 0 0-.784-.118c-.122 0-.147.024-.147.14zm8.917-3.08a5.12 5.12 0 0 1 1.494-.73 2.02 2.02 0 0 1 1.812.4 1.45 1.45 0 0 1 .588 1.2v7c-.022.595-.464 1.1-1.053 1.177a4.36 4.36 0 0 1-1.1.047 4.08 4.08 0 0 1-1.053-.26l-.857-.26c-.086-.026-.18.013-.22.094-.07.133-.12.276-.147.424-.024.07-.05.094-.122.094H26.12c-.073 0-.1-.024-.1-.07V4.22c0-.14.025-.165.17-.165h2.8c.17 0 .17 0 .17.188l.05 2.472zm.2 3.955v3.085a.46.46 0 0 0 .1.306c.082.133.244.2.392.14.17-.047.22-.118.22-.33v-6.1a.7.7 0 0 0-.024-.235c-.046-.186-.226-.308-.416-.282-.147.024-.27.07-.27.33zM1.924 9.963V4.195c0-.118.024-.14.147-.14h2.62c.122 0 .122.024.122.14v11.583c0 .118-.024.14-.147.14h-2.62c-.122 0-.147-.024-.147-.14l.025-5.815z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <svg viewBox="0 0 24 24">
                                                <use xlink:href="#ui-icon-imdb"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </section>
                @endforeach

            </section>

            <div class="">
                <button id="swiper-button-next1" type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800/80 group-hover:bg-black/70  group-focus:ring-2 group-focus:ring-white  group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                </button>
                <button id="swiper-button-prev1" type="button"
                        class="absolute top-0 right-2 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800/80 group-hover:bg-black/70  group-focus:ring-2 group-focus:ring-white   group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                </button>
            </div>
        </section>
    </section>
</div>
<!-- end swiper slider new movie-->

<!-- start swiper slider new movie-->
<div class="p-6">
    <section class="flex items-center justify-between col-span-12 border-r-4 mb-5 border-[#1AFF23] ">
        <span class="flex items-center font-bold text-white mr-3 ">جدید ترین ها</span>
    </section>
    <section class="swiper">
        <section class="slide-container ">
            <section class="card-wrapper swiper-wrapper w-52 h-72">
                @foreach($newFilms as $film)
                    <section class="swiper-slide flex ">
                        <a href="{{ $film->show() }}" class="flex justify-center w-full absolute">
                            <img src="{{ asset($film->poster) }}"
                                 class="object-cover relative rounded-lg  h-64 w-52" alt="">
                            <div
                                class="transition-all flex z-50 bg-black rounded-lg opacity-0 hover:opacity-75 bottom-0 right-0 absolute w-full h-full">
                                <div class="absolute top-10 flex flex-col text-center text-white w-full">
                                    <strong class="font-bold">{{ $film->fa_title }}</strong>

                                    <small class="text-xs text-gray-400">
                                        @foreach ($film->categories as $serieCategory)
                                            {{ $serieCategory->name . ' ' }}
                                        @endforeach
                                    </small>
                                    <div class="text-xs text-gray-400 flex justify-between mt-4 mx-7">
                                        <div class="flex justify-center items-center w-full">
                                            {{--                                        <div class="flex">--}}
                                            {{--                                            <span>72%</span>--}}
                                            {{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
                                            {{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />--}}
                                            {{--                                            </svg>--}}
                                            {{--                                        </div>--}}
                                            <div class="flex justify-center items-center">
                                                        <span>
                                                            <small>10 /</small>
                                                            <small class="">{{ $film->imdb }}</small>
                                                        </span>
                                                </span>
                                                <div class="mr-0.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                         height="20" fill="#bdb722" class="t-icon-0-1-525">
                                                        <path
                                                            d="M11.107 9.587c.1-.424.122-.824.2-1.248l.122-.965.122-.918a7 7 0 0 1 .1-.706l.1-.753c.05-.235.073-.494.1-.73.024-.212 0-.212.22-.212h3.746c.122 0 .147.024.147.14V15.78c0 .094-.024.14-.122.14h-2.36c-.122 0-.147-.024-.147-.14v-6.3h-.024l-.27 1.46-.245 1.295-.22 1.295-.2 1.13-.22 1.177c-.024.094-.05.118-.147.118h-1.662c-.05 0-.1 0-.1-.07l-.343-1.837-.367-1.884-.367-1.978-.147-.73v6.357c0 .118-.024.165-.147.165h-2.4c-.122 0-.147-.024-.147-.14V4.242c0-.094.024-.14.122-.14h3.453c.073 0 .122 0 .147.094l.27 1.483.294 1.6.22 1.32a3.5 3.5 0 0 1 .272.99zm6.288.3V4.195c0-.14.05-.165.17-.165h3.942a4.46 4.46 0 0 1 1.665.235 2.66 2.66 0 0 1 1.175.8 2.25 2.25 0 0 1 .367.894 6.31 6.31 0 0 1 .049 1.176v6.352a1.8 1.8 0 0 1-.661 1.459 2.76 2.76 0 0 1-1.1.518 6.59 6.59 0 0 1-1.665.212l-3.8.024c-.122 0-.1-.07-.1-.14l-.043-5.67zm2.9-.094v3.858c0 .094.024.118.122.118a4.51 4.51 0 0 0 .563-.024.56.56 0 0 0 .514-.588V6.383c.006-.183-.1-.35-.27-.423a2.18 2.18 0 0 0-.784-.118c-.122 0-.147.024-.147.14zm8.917-3.08a5.12 5.12 0 0 1 1.494-.73 2.02 2.02 0 0 1 1.812.4 1.45 1.45 0 0 1 .588 1.2v7c-.022.595-.464 1.1-1.053 1.177a4.36 4.36 0 0 1-1.1.047 4.08 4.08 0 0 1-1.053-.26l-.857-.26c-.086-.026-.18.013-.22.094-.07.133-.12.276-.147.424-.024.07-.05.094-.122.094H26.12c-.073 0-.1-.024-.1-.07V4.22c0-.14.025-.165.17-.165h2.8c.17 0 .17 0 .17.188l.05 2.472zm.2 3.955v3.085a.46.46 0 0 0 .1.306c.082.133.244.2.392.14.17-.047.22-.118.22-.33v-6.1a.7.7 0 0 0-.024-.235c-.046-.186-.226-.308-.416-.282-.147.024-.27.07-.27.33zM1.924 9.963V4.195c0-.118.024-.14.147-.14h2.62c.122 0 .122.024.122.14v11.583c0 .118-.024.14-.147.14h-2.62c-.122 0-.147-.024-.147-.14l.025-5.815z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <svg viewBox="0 0 24 24">
                                                <use xlink:href="#ui-icon-imdb"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </section>
                @endforeach

            </section>

            <div class="">
                <button id="swiper-button-next1" type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800/80 group-hover:bg-black/70  group-focus:ring-2 group-focus:ring-white  group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                </button>
                <button id="swiper-button-prev1" type="button"
                        class="absolute top-0 right-2 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800/80 group-hover:bg-black/70  group-focus:ring-2 group-focus:ring-white   group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                </button>
            </div>
        </section>
    </section>
</div>
<!-- end swiper slider new movie-->

<!-- start swiper slider most comment-->
<div class="p-6">
    <section class="flex items-center justify-between col-span-12 border-r-4 mb-5 border-[#1AFF23] ">
        <span class="flex items-center font-bold text-white mr-3 ">پر بحث ترین ها</span>
    </section>
    <section class="swiper">
        <section class="slide-container ">
            <section class="card-wrapper swiper-wrapper w-52 h-72">
                @foreach($mostComments as $series)
                    <section class="swiper-slide flex ">
                        <a href="{{ $series->show() }}" class="flex justify-center w-full absolute">
                            <img src="{{ asset($series->poster) }}"
                                 class="object-cover relative rounded-lg  h-64 w-52" alt="">
                            <div
                                class="transition-all flex z-50 bg-black rounded-lg opacity-0 hover:opacity-75 bottom-0 right-0 absolute w-full h-full">
                                <div class="absolute top-10 flex flex-col text-center text-white w-full">
                                    <strong class="font-bold">{{ $series->fa_title }}</strong>

                                    <small class="text-xs text-gray-400">
                                        @foreach ($series->categories as $serieCategory)
                                            {{ $serieCategory->name . ' ' }}
                                        @endforeach
                                    </small>
                                    <div class="text-xs text-gray-400 flex justify-between mt-4 mx-7">
                                        <div class="flex justify-center items-center w-full">
                                            {{--                                        <div class="flex">--}}
                                            {{--                                            <span>72%</span>--}}
                                            {{--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">--}}
                                            {{--                                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />--}}
                                            {{--                                            </svg>--}}
                                            {{--                                        </div>--}}
                                            <div class="flex justify-center items-center">
                                                        <span>
                                                            <small>10 /</small>
                                                            <small class="">{{ $series->imdb }}</small>
                                                        </span>
                                                </span>
                                                <div class="mr-0.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="35"
                                                         height="20" fill="#bdb722" class="t-icon-0-1-525">
                                                        <path
                                                            d="M11.107 9.587c.1-.424.122-.824.2-1.248l.122-.965.122-.918a7 7 0 0 1 .1-.706l.1-.753c.05-.235.073-.494.1-.73.024-.212 0-.212.22-.212h3.746c.122 0 .147.024.147.14V15.78c0 .094-.024.14-.122.14h-2.36c-.122 0-.147-.024-.147-.14v-6.3h-.024l-.27 1.46-.245 1.295-.22 1.295-.2 1.13-.22 1.177c-.024.094-.05.118-.147.118h-1.662c-.05 0-.1 0-.1-.07l-.343-1.837-.367-1.884-.367-1.978-.147-.73v6.357c0 .118-.024.165-.147.165h-2.4c-.122 0-.147-.024-.147-.14V4.242c0-.094.024-.14.122-.14h3.453c.073 0 .122 0 .147.094l.27 1.483.294 1.6.22 1.32a3.5 3.5 0 0 1 .272.99zm6.288.3V4.195c0-.14.05-.165.17-.165h3.942a4.46 4.46 0 0 1 1.665.235 2.66 2.66 0 0 1 1.175.8 2.25 2.25 0 0 1 .367.894 6.31 6.31 0 0 1 .049 1.176v6.352a1.8 1.8 0 0 1-.661 1.459 2.76 2.76 0 0 1-1.1.518 6.59 6.59 0 0 1-1.665.212l-3.8.024c-.122 0-.1-.07-.1-.14l-.043-5.67zm2.9-.094v3.858c0 .094.024.118.122.118a4.51 4.51 0 0 0 .563-.024.56.56 0 0 0 .514-.588V6.383c.006-.183-.1-.35-.27-.423a2.18 2.18 0 0 0-.784-.118c-.122 0-.147.024-.147.14zm8.917-3.08a5.12 5.12 0 0 1 1.494-.73 2.02 2.02 0 0 1 1.812.4 1.45 1.45 0 0 1 .588 1.2v7c-.022.595-.464 1.1-1.053 1.177a4.36 4.36 0 0 1-1.1.047 4.08 4.08 0 0 1-1.053-.26l-.857-.26c-.086-.026-.18.013-.22.094-.07.133-.12.276-.147.424-.024.07-.05.094-.122.094H26.12c-.073 0-.1-.024-.1-.07V4.22c0-.14.025-.165.17-.165h2.8c.17 0 .17 0 .17.188l.05 2.472zm.2 3.955v3.085a.46.46 0 0 0 .1.306c.082.133.244.2.392.14.17-.047.22-.118.22-.33v-6.1a.7.7 0 0 0-.024-.235c-.046-.186-.226-.308-.416-.282-.147.024-.27.07-.27.33zM1.924 9.963V4.195c0-.118.024-.14.147-.14h2.62c.122 0 .122.024.122.14v11.583c0 .118-.024.14-.147.14h-2.62c-.122 0-.147-.024-.147-.14l.025-5.815z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <svg viewBox="0 0 24 24">
                                                <use xlink:href="#ui-icon-imdb"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </section>
                @endforeach

            </section>

            <div class="">
                <button id="swiper-button-next1" type="button"
                        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800/80 group-hover:bg-black/70  group-focus:ring-2 group-focus:ring-white  group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                </button>
                <button id="swiper-button-prev1" type="button"
                        class="absolute top-0 right-2 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-gray-800/80 group-hover:bg-black/70  group-focus:ring-2 group-focus:ring-white   group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5l7 7-7 7"></path>
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                </button>
            </div>
        </section>
    </section>
</div>
<!-- end swiper slider most comment-->




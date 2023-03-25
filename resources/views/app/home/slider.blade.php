<!-- start swipper slider-top top -->
<div class="swiper mySwiper">
    <div class="swiper-wrapper mt-5">

        @foreach($sliders as $slider)
            <div class="swiper-slide px-3 md:px-6 lg:mx-10">
                <section href="#!" class="relative flex">
                    <img src="{{ $slider->image }}"
                         class="w-full md:h-96 rounded  sm:h-[400px] h-[370px] object-cover" alt="">
                    <div
                        class="flex flex-col  justify-end flex-wrap bg-gradient-to-b rounded from-transparent to-black/70 w-full h-full  absolute bottom-0 right-0 z-50">
                        <div class="mb-7 pr-5 md:justify-end justify-center sm:mr-0 w-96">
                            <p class="text-white md:text-5xl text-2xl font-bold mb-2">{{ $slider->title }}</p>
                            <div class="flex md:flex-row flex-col ">
                                <section class="flex">
                                    <svg class="ml-2 mt-[9px]  text-yellow-300"
                                         xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                    <p class="text-white mt-1 text-lg font-semibold">{{ $slider->series->imdb }}</p>
                                </section>
                                <div class="flex md:flex-row flex-wrap items-center ">
                                    <span class="text-white md:mx-2 md:flex hidden">|</span>
                                    <span
                                        class="font-light mt-1 md:d-flex  sm:flex-col flex text-center items-center justify-center text-sm text-gray-200">2:15:00
                                                - @foreach ($slider->series->categories as $serieCategory)
                                            {{ $serieCategory->name . ' ' }}
                                        @endforeach - {{ $slider->series->year_construction }}</span>
                                </div>
                            </div>
                            <p class="text-gray-100 text-sm md:flex hidden mt-2 w-auto ">{{ $slider->description }} </p>
                            <div class="flex flex-row  justify-start">
                                <a href="{{ $slider->series->show() }}"
                                   class="mt-5 flex text-sm h-8 px-4   items-center  bg-[#64D947] hover:bg-[#00BD08] text-black hover:text-white font-bold py-2  rounded">
                                    <svg class=" ml-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                        <path
                                            d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                                    </svg>
                                    تماشا
                                </a>
                                <a href="{{ $slider->series->show() }}"
                                    class="mt-5 mr-3 text-sm h-8 px-7 flex items-center  text-center  bg-gray-500/50 hover:bg-gray-600/50 text-gray-200 hover:text-white font-bold py-2  rounded">
                                    تیزر
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endforeach
    </div>
    <div>
        <button id="swiper-button-next" type="button"
                class="absolute top-4 left-8 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-8 sm:h-8 bg-white/30 group-hover:bg-white/50  group-focus:ring-2 group-focus:ring-white  group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
        </button>
        <button id="swiper-button-prev" type="button"
                class="absolute top-4 right-10 z-30 flex items-center justify-center h-full px-2 cursor-pointer group focus:outline-none"
                data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-8 sm:h-8 bg-white/30  group-hover:bg-white/50  group-focus:ring-2 group-focus:ring-white  group-focus:outline-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
        </button>
    </div>
</div>
<!-- end swipper slider-top top -->

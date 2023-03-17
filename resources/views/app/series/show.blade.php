@extends('app.layouts.app', ['title' => "سریال $series->fa_title"])

@section('content')
    <section>
        <div class="w-full h-[450px]">
            <img src="{{ asset($series->wallpaper) }}" class="w-full h-[400px]  object-cover relative" alt="">
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
                                        IMDB {{ $series->imdb }}</p>
                                </div>
                            </div>
                            <div
                                class="bg-gray-300/20  mr-4 flex text-center rounded-2xl  justify-center items-center font-light text-sm md:h-[120px] h-16 w-56 ">
                                <div class="pl-1 flex justify-center items-center">
                                    <p
                                        class="text-white md:mr-3 md:mt-2 md:text-3xl sm:text-sm text-xs  text-center font-bold z-30">
                                        {{ $series->ages }}+</p>
                                </div>
                            </div>
                            <div
                                class="bg-gray-300/20  mr-4 flex text-center rounded-2xl  justify-center items-center font-light text-sm md:h-[120px] h-16 w-56 ">
                                <div class="pl-1 flex justify-center items-center">
                                    <p
                                        class="text-white md:mr-3 md:mt-2 md:text-xl sm:text-sm text-xs text-center font-bold z-30">
                                        {{ $series->year_construction }}</p>
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
                    <img src="{{ asset($series->poster) }}"
                        class="w-[142px] h-[200px] md:flex  object-cover rounded-lg" alt="">
                    <div class="">
                        <p class="text-white font-bold text-4xl mr-4 mt-2">Dune</p>
                        <div class="flex justify-start items-center mr-3 mt-3">
                            <div
                                class="text-gray-300 border-[1px] border-gray-500 md:px-5 px-2 py-1 font-normal text-center md:text-xs text-[10px] rounded-full">
                                اکشن </div>
                            <div
                                class="text-gray-300 border-[1px] border-gray-500 md:px-5 px-2 py-1 font-normal text-center mr-1 md:text-xs text-[10px] rounded-full">
                                درام </div>
                            <div
                                class="text-gray-300 border-[1px] border-gray-500 md:px-5 px-2 py-1 font-normal text-center mr-1 md:text-xs text-[10px] rounded-full">
                                علمی تخیلی </div>
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
                            <div
                                class="border border-red-600 flex justify-center items-center w-12 h-12 rounded-full mt-6 mr-2">
                                <svg class="text-red-600 w-4 h-4 hover:text-red-600 text-center"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                            </div>
                            <div
                                class="border border-gray-500 flex justify-center items-center w-12 h-12 rounded-full mt-6 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="text-white w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-7 ml-10 md:mr-10 mr-5">
                <p class="text-white font-semibold">خلاصه داستان</p>
                <p class="text-gray-400 mt-1 w-full text-sm">
                    {{ $series->description }}
                </p>
            </div>
        </div>
        <div class="lg:col-span-6  col-span-12 md:mr-10 md:ml-5 mr-5 ml-5 md:mt-0 mt-7 flex flex-wrap">
            <div class="w-full h-64">
                <video src="{{ asset($series->teaser->teaser) }}" controls class="rounded-xl"></video>
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
                    @foreach($series->actors as $actor)
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

    <!-- ipizpde -->
    <div class="md:px-32 px-20 py-2 mt-12">
        <div class="rounded-md bg-gray-900 border  border-gray-800 shadow-lg">
            <div class="lg:flex px-4 leading-none max-w-4xl">
                <div class="flex-none">
                    <img src="../assets/images/dun-series.jpg" alt="pic"
                        class="h-72 w-56 rounded-md transform -translate-y-4 border-4 object-cover border-gray-300 shadow-lg" />
                </div>
                <div class="flex-col md:mr-4 mr-1 pb-5 text-gray-300">
                    <p class="md:pt-4 pt-1 md:text-2xl text-center flex font-bold mr-3 md:mt-4">قسمت 1 | فصل 1</p>
                    <hr class="hr-text" data-content="">
                    <div class="text-md flex justify-between px-4 my-2">
                        <span class="font-bold mb-2">2 ساعت و 13 دقیقه </span>
                        <span class="font-bold"></span>
                    </div>
                    <p class=" lg:block px-4 my-4 text-sm ">داستان این مجموعهٔ تلویزیونی در مورد دو برادر است که
                        یکی از آنها برای قتلی که انجام نداده به اعدام محکوم شده ... </p>


                    <div class="text-xs">
                        <button type="button"
                            class="border flex items-center  border-gray-400 text-gray-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-500 group hover:text-black focus:outline-none focus:shadow-outline">
                            <svg class="mt-[2px] text-gray-400 group-hover:text-gray-700 transition-all"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z">
                                </path>
                            </svg>
                            همین حالا تماشا کنید</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-md bg-gray-900 border mt-12 border-gray-800 shadow-lg">
            <div class="lg:flex px-4 leading-none max-w-4xl">
                <div class="flex-none ">
                    <img src="../assets/images/dune1.jpeg" alt="pic"
                        class="h-72 w-56 rounded-md transform -translate-y-4 border-4 object-cover border-gray-300 shadow-lg" />
                </div>
                <div class="flex-col md:mr-4 mr-1 pb-5 text-gray-300">
                    <p class="md:pt-4 pt-1 md:text-2xl text-center flex font-bold mr-3 md:mt-4">قسمت 2 | فصل 1</p>
                    <hr class="hr-text" data-content="">
                    <div class="text-md flex justify-between px-4 my-2">
                        <span class="font-bold mb-2">1 ساعت و 13 دقیقه </span>
                        <span class="font-bold"></span>
                    </div>
                    <p class=" md:block px-4 my-4 text-sm ">داستان این مجموعهٔ تلویزیونی در مورد دو برادر است که
                        یکی از آنها برای قتلی که انجام نداده به اعدام محکوم شده ... </p>


                    <div class="text-xs">
                        <button type="button"
                            class="border flex items-center  border-gray-400 text-gray-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-500 group hover:text-black focus:outline-none focus:shadow-outline">
                            <svg class="mt-[2px] text-gray-400 group-hover:text-gray-700 transition-all"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z">
                                </path>
                            </svg>
                            همین حالا تماشا کنید</button>
                        <!--             <p>ICON BTNS</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end ipizpde -->

    <!-- comment -->
    <section class="py-8 lg:py-16">
        <div class="max-w-4xl mx-auto px-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg lg:text-2xl font-bold text-gray-200 ">دیدگاه (20)</h2>
            </div>
            <form class="mb-6">
                <div class="py-2 px-4 mb-4 rounded-lg rounded-t-lg  bg-gray-800 ">
                    <label for="comment" class="sr-only"></label>
                    <textarea id="comment" rows="1"
                        class="px-0 w-full text-sm 0 border-0 focus:ring-0 focus:outline-none text-white placeholder-gray-400 bg-gray-800"
                        placeholder="دیدگاه خود را بنویسید ..." required></textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-green-500 rounded-lg f hover:bg-green-600">
                    اضافه کردن دیدگاه
                </button>
            </form>
            <article class="p-6 mb-6 text-base  rounded-lg bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center ml-3 text-sm text-white"><img class="ml-2 w-6 h-6 rounded-full"
                                src="../assets/images/profile.jpg" alt="Michael Gough">یاسین تقوی</p>
                        <p class="text-sm text-gray-400"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">18 اسفند 1401</time></p>
                    </div>
                </footer>
                <p class="text-gray-500 dark:text-gray-400">من این داستان دوست دارم چون کسشر محظه به نظرم فال و فیلم ریده
                    به هرچی فیلمای خارجی من فقط عاشق فیلمای ایرانیم ارعععععععععع میتونی دبخوریش؟؟</p>
                <div class="flex items-center mt-4 space-x-4">

                </div>
            </article>



        </div>
    </section>
    <!-- end comment -->
@endsection

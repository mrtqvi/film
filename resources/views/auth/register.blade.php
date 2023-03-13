@extends('app.layouts.app', ['title' => 'ثبت نام'])

@section('content')
    <section>
        <div class="flex w-full flex-col items-center mt-5 px-2 sm:px-6 mx-auto my-16 lg:py-0">
            <section class="z-30 w-full md:w-4/5 shadow rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-1 md:p-4">
                    <section class="flex justify-between items-center">
                        <div class="w-full">
                            <a href="{{ route('register') }}" class="font-bold text-white text-base md:text-2xl">
                                ثبت نام
                            </a>
                            <span class="text-3xl px-2 text-gray-600">|</span>
                            <a href="{{ route('login') }}" class="font-bold text-gray-600 text-base md:text-2xl">
                                ورود
                            </a>
                        </div>
                    </section>
                    <div class="my-4 text-sm">
                        برای تجربه کاربری بهتر وارد حساب کاربری خود شوید
                    </div>
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="flex mt-10 justify-center">
                            <input type="full_name" name="full_name" id="full_name" value="{{ old('full_name') }}"
                                class="bg-gray-800/50 text-right text-gray-200 sm:text-sm rounded-lg outline-none focus:ring-green-400 focus:border-green-400 block h-14 w-full p-1.5 sm:p-2.5 placeholder:text-right"
                                required="" placeholder="نام و نام خانوادگی">
                        </div>
                        @error('full_name')
                            <strong class="text-xs text-red-400">{{ $message }}</strong>
                        @enderror
                        <div class="flex mt-5 justify-center">
                            <input type="username" name="user_name" id="username" value="{{ old('user_name') }}"
                                class="dir-ltr bg-gray-800/50 text-gray-200 text-left sm:text-sm rounded-lg outline-none focus:ring-green-400 focus:border-green-400 block h-14 w-full p-1.5 sm:p-2.5 placeholder:text-right"
                                required="" placeholder="نام کاربری">
                        </div>
                        @error('user_name')
                            <strong class="text-xs text-red-400">{{ $message }}</strong>
                        @enderror
                        <div class="flex mt-5 justify-center">
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="dir-ltr bg-gray-800/50 text-gray-200 text-left sm:text-sm rounded-lg outline-none focus:ring-green-400 focus:border-green-400 block h-14 w-full p-1.5 sm:p-2.5 placeholder:text-right"
                                required="" placeholder=" ایمیل">
                        </div>
                        @error('email')
                            <strong class="text-xs text-red-400">{{ $message }}</strong>
                        @enderror
                        <div class="flex mt-5 justify-center">
                            <input type="password" name="password" id="password"
                                class="dir-ltr bg-gray-800/50 text-gray-200 text-left sm:text-sm rounded-lg outline-none border-none focus:ring-0 focus:border-none block h-14 w-full  p-1.5 sm:p-2.5 placeholder:text-right"
                                required="" placeholder="کلمه عبور">
                        </div>
                        @error('password')
                            <strong class="text-xs text-red-500">{{ $message }}</strong>
                        @enderror

                        <div class="flex mt-5 justify-center">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="dir-ltr bg-gray-800/50 text-gray-200 text-left sm:text-sm rounded-lg outline-none border-none focus:ring-0 focus:border-none block h-14 w-full  p-1.5 sm:p-2.5 placeholder:text-right"
                                required="" placeholder="تکرار کلمه عبور">
                        </div>

                        <div class="flex items-center justify-between mt-8">
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox" name="remember"
                                        class="w-4 h-4 border rounded-full border-gray-300  bg-gray-50 focus:ring-3 focus:ring-indigo-300">
                                </div>
                                <div class="ml-3 text-sm ">
                                    <label for="remember" class="text-gray-500 ml-2">مرا به خاطر بسپار</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-center items-center w-full mt-5">
                            <button type="submit"
                                class="w-40 flex justify-center  transition-all rounded-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-indigo-200 font-medium  text-sm px-5 py-4 text-center">ثبت نام</button>
                        </div>
                        <div class="flex mt-4 justify-center ">
                            <a href="{{ route('login') }}"
                            class="text-xs flex sm:text-sm font-medium text-gray-400 hover:underline">
                            قبلا ثبت نام کردی ؟! </a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection

@extends('auth.layouts.app', ['title' => 'ورود به حساب کاربری'])
@section('content')
    <section>
        <div
            class="flex absolute  w-full flex-col items-center justify-center px-2 sm:px-6 py-8 mx-auto md:h-screen lg:py-0">
            <section class="bg-gray-700/30  z-50 w-96 shadow rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6  sm:p-8">
                    <section class="flex justify-between items-center">
                        <div class="mt-4 w-full">
                            <a href="{{ route('register') }}" class="font-bold text-gray-600 text-2xl">
                                ثبت نام
                            </a>
                            <span class="text-3xl px-2 text-gray-600">|</span>
                            <a href="{{ route('login') }}" class="font-bold text-white text-2xl">
                                ورود
                            </a>
                        </div>

                        <a href="{{ route('home') }}" class="p-2 hover:bg-green-100/30 transition-all delay-75 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-green-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </a>
                    </section>
                    <a class="flex mr-10  justify-end pb-5 w-full text-gray-400 text-sm">
                        <p class="mt-4">
                            برای دسترسی به حساب کاربری خود وارد شوید
                        </p>
                    </a>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="flex mt-5 justify-center">
                            <input type="username" name="user_name" id="username"
                                class="dir-ltr bg-gray-800/50 text-gray-200 text-left sm:text-sm rounded-lg outline-none focus:ring-green-400 focus:border-green-400 block h-14 w-72 p-1.5 sm:p-2.5 placeholder:text-right"
                                required="" placeholder="نام کاربری">
                        </div>
                        @error('user_name')
                            <strong class="text-red-400 text-xs">{{ $message }}</strong>
                        @enderror
                        <div class="flex mt-5 justify-center">
                            <input type="password" name="password" id="password"
                                class="dir-ltr bg-gray-800/50 text-gray-200 text-left sm:text-sm rounded-lg outline-none focus:ring-green-400 focus:border-green-400 block h-14 w-72 p-1.5 sm:p-2.5 placeholder:text-right"
                                required="" placeholder="رمز عبور">
                        </div>
                        @error('password')
                            <strong class="text-red-400 text-xs">{{ $message }}</strong>
                        @enderror
                        <div class="flex items-center justify-between mt-8">
                            <div class="flex items-start space-x-2 space-x-reverse">
                                <div class="flex items-center h-5">
                                    <input id="remember" aria-describedby="remember" type="checkbox"
                                        class="w-4 h-4 border rounded-full border-gray-300  bg-gray-50 focus:ring-3 focus:ring-indigo-300">
                                </div>
                                <div class="ml-3 text-sm ">
                                    <label for="remember" class="text-gray-500 ml-2">مرا به خاطر بسپار</label>
                                </div>
                            </div>

                        </div>
                        <div class="flex flex-wrap justify-center items-center w-full mt-5">
                            <button type="submit"
                                class="w-40 flex justify-center  transition-all rounded-full text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-indigo-200 font-medium  text-sm px-5 py-4 text-center">ورود</button>
                        </div>
                    
                        @if (Route::has('password.request'))
                            <div class="flex mt-4 justify-center ">
                                <a href="{{ route('password.request') }}"
                                    class="text-xs flex sm:text-sm font-medium text-gray-400 hover:underline">فراموشی
                                    کلمه عبور</a>
                            </div>
                        @endif
                    </form>
                </div>
            </section>
        </div>
    </section>
@endsection

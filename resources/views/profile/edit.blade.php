@extends('app.layouts.app', ['title' => 'فال و فیلم | تنظیمات حساب'])

@section('content')
    <div>
        <form class="mr-10" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('put') }}
            <div class="pt-10">
                @include('profile.alerts.confirm')
                @if ($errors->any())
                    <div
                        class="p-4 mb-4  text-sm text-red-600 md:w-[500px] w-[410px]  rounded-lg  bg-gray-800  flex flex-col"
                        role="alert">
                        @foreach ($errors->all() as $error)
                            <div class="mt-2">{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <div class="flex justify-start">
                    <div class="flex">
                    </div>
                    <div class="profile-pic items-center">
                        <label class="-label -z-50  flex justify-center items-center" for="file">

                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                 class="bi bi-camera-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path
                                    d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z"/>
                            </svg>
                        </label>
                        <input id="file" name="profile_photo" type="file" onchange="loadFile(event)"/>
                        <img src="{{ asset(auth()->user()->profile_photo ?? 'images/default/avatar.jpg') }}"
                             id="output">
                    </div>
                    <div class="mr-4 mt-2">
                        <p class="text-white mt-4 flex ">{{ auth()->user()->full_name }}</p>
                        <p class="text-gray-300 text-sm mt-2 flex ">نام کاربری : {{ auth()->user()->user_name }}</p>
                        <p class="text-gray-300 text-sm mt-2 flex ">{{ auth()->user()->email  }}</p>
                    </div>
                </div>
                <p class="text-gray-300 text-xs mt-4 flex">سایز عکس انتخابی بهتر است در سایز 250x250 پیکسل باشد</p>
            </div>
            <div class="flex items-center">
                <p class="text-white flex text-lg mt-4 w-[120px] pt-5 ">اطلاعات کاربری</p>
                <span class="border-b md:w-[370px] w-[300px] flex  mt-10  border-green-400"></span>
            </div>
            <div class="flex">
                <div class="mt-8 ">
                    <label for="full_name" class="block mb-2  text-sm font-medium text-white">نام و خانوادگی</label>
                    <input type="text" name="full_name" value="{{ old('full_name', auth()->user()->full_name) }}"
                           id="full_name"
                           class=" text-sm rounded-lg focus:ring-green-500 focus:border-green-500  md:w-60 w-48 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                           required>
                </div>
                <div class="mt-8 mr-5">
                    <label for="username" class="block mb-2 text-sm font-medium text-white">نام کاربری</label>
                    <input type="text" name="user_name" value="{{old('user_name', auth()->user()->user_name) }}"
                           id="username"
                           class=" text-sm rounded-lg focus:ring-green-500 focus:border-green-500  md:w-60 w-48 p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                           required>
                </div>
            </div>
            <div class="mb-6 mt-7 ">
                <label for="username" class="block mb-2 text-sm font-medium text-white">ایمیل</label>
                <input type="text" name="email" value="{{ old('email', auth()->user()->email) }}" id="username"
                       class="text-sm rounded-lg focus:ring-green-500 focus:border-green-500 md:w-[500px] w-[405px] p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white"
                       required>
            </div>
            <button
                class="mt-3  bg-transparent border-solid border-2 transition-all border-green-500 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-lg">
                ثبت تغیرات
            </button>
        </form>
        <form class="flex" action="{{ route('profile.destroy') }}" method="post">
            @csrf
            @method('DELETE')
            <button
                class="mt-3 mr-6 text-red-600  transition-all  hover:text-red-700 font-light py-2 px-4 rounded-lg">
                حذف حساب کاربری
            </button>
        </form>

    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection

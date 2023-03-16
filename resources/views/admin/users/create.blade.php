@extends('admin.layouts.app', ['title' => 'ایجاد کاربر'])

@section('content')
    <div class="row d-flex justify-content-between">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h3 mb-0 section-heading">ایجاد کاربر </h2>
        </div>
        <div class="col-auto mb-3">
            <a href="{{ route('admin.users.index') }}" type="button" class="btn btn-success px-4">بازگشت</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="col-12 col-md-10 mx-auto pr-2 mt-3">

            <div class="alert alert-danger d-flex flex-column" role="alert">
                @foreach ($errors->all() as $error)
                    <div class="mt-2">{{ $error }}</div>
                @endforeach
            </div>
        </div>
    @endif
    <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data" id="form">
        @csrf
        <div class="row">
            <div class="col-12 col-md-9 mx-auto pr-2 mt-3">
                <div class="card">
                    <div class="card-header" onclick="openCard(this)">
                        <div class="row d-flex justify-content-between px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-person-vcard" viewBox="0 0 16 16">
                                    <path
                                        d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z" />
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z" />
                                </svg>
                                <span class="ml-1">ایجاد کاربر جدید</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="profile-pic mx-auto">
                                <label class="-label d-flex flex-column justify-content-center align-items-center"
                                    for="file">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                    </svg>
                                </label>
                                <input id="file" name="profile_photo" type="file" onchange="loadFile(event)" />
                                <img src="{{ asset('images/default/avatar.jpg') }}" id="output">
                            </div>
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="form-group col-lg-6 my-2">
                                        <label for="full_name" class="input-title mr-3">نام کامل :</label>
                                        <input type="text" name="full_name" value="{{ old('full_name') }}"
                                            placeholder="نام کاربر" class="form-control custom-focus" id="full_name">
                                    </div>
                                    <div class="form-group col-lg-6 my-2">
                                        <label for="" class="input-title mr-3">شناسه کاربری :</label>
                                        <input type="text" name="user_name" value="{{ old('user_name') }}"
                                            placeholder="شناسه کاربر" class="form-control url custom-focus" id="username">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6 my-2">
                                        <label for="email" class="input-title mr-3"> ایمیل (اختیاری) :</label>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="ایمیل"
                                            class="form-control url custom-focus" id="email">
                                    </div>
                                    <div class="form-group col-lg-6 my-2">
                                        <label for="is_admin" class="input-title mr-3"> نوع کاربر :</label>
                                        <select name="is_admin" class="form-control custom-focus" id="is_admin">
                                            <option value="0" @selected(old('is_admin') == 0)>کاربر عادی</option>
                                            <option value="1" @selected(old('is_admin') == 1)>مدیر</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-lg-6 my-2">
                                        <label for="password" class="input-title mr-3"> کلمه عبور :</label>
                                        <input type="password" name="password" placeholder="کلمه عبور"
                                            class="form-control url custom-focus" id="password">
                                    </div>
                                    <div class="form-group col-lg-6 my-2">
                                        <label for="" class="input-title mr-3">تکرار کلمه عبور :</label>
                                        <input type="password" name="password_confirmation" placeholder="تکرار کلمه عبور "
                                            class="form-control url custom-focus" id="password_confirmation">
                                    </div>
                                </div>
                            </div> <!-- /. col -->
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary px-4 mt-3">ایجاد</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </form>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>

    <script>
        const staffCheckbox = document.querySelector('#is_staff');

        staffCheckbox.addEventListener('change', () => {
            const permissionBox = document.querySelector('.permissions-area');

            if (staffCheckbox.checked)
                permissionBox.classList.remove('d-none');
            else
                permissionBox.classList.add('d-none');
        });
    </script>
@endsection

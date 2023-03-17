@extends('admin.layouts.app', ['title' => 'ویرایش فیلم سینمایی'])

@section('head-tag')
    <link href="{{ asset('assets/admin/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="row d-flex justify-content-between">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="h3 mb-0 section-heading">ویرایش فیلم سینمایی</h2>
        </div>
        <div class="col-auto mb-3">
            <a href="{{ route('admin.movies.index') }}" type="button" class="btn btn-success px-4">بازگشت</a>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger d-flex flex-column" role="alert">
            @foreach ($errors->all() as $error)
                <div class="mt-2">{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 col-md-9 position-sticky">
                <div class="row">
                    <!-- places content -->
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-md-12 my-2">
                                <label for="fa_title" class="input-title">
                                    عنوان فارسی
                                </label>
                                <input type="text" name="fa_title" value="{{ old('fa_title', $movie->fa_title) }}"
                                    onkeyup="copyToSlug(this)" placeholder="عنوان فارسی سریال را اینجا وارد کنید"
                                    class="form-control custom-input-size custom-focus @error('fa_title') is-invalid @enderror"
                                    id="fa_title">
                            </div>
                            <div class="col-12 slug d-flex">
                                <span>https://falofilm.com/movie/</span>
                                <span class="slug-box"></span>
                            </div>
                            <div class="form-group col-md-12 my-2">
                                <label for="en_title" class="input-title">
                                    عنوان لاتین
                                </label>
                                <input type="text" name="en_title"
                                    value="{{ old('en_title', old('en_title', $movie->en_title)) }}"
                                    placeholder="عنوان لاتین سریال را اینجا وارد کنید"
                                    class="form-control url custom-input-size custom-focus @error('en_title') is-invalid @enderror"
                                    id="en_title">
                            </div>
                            <div class="form-group col-md-12 my-2">
                                <label for="categories" class="input-title">
                                    ژانر فیلم
                                </label>
                                <select class="js-example-basic-multiple form-control custom-input-size custom-focus" name="categories[]"
                                    multiple="multiple" id="categories">
                                    @php 
                                        $movieCategories = $movie->categories ? $movie->categories->pluck('id')->toArray() : [];
                                    @endphp
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected(in_array($category->id , old('categories' , old('categories' , $movieCategories))))>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12 my-2">
                                <label for="categories" class="input-title">
                                    داستان سریال
                                </label>
                                <textarea name="description" id="editor" placeholder="داستان سریال را اینجا وارد کنید"
                                    class="form-control custom-input-size custom-focus @error('description') is-invalid @enderror" cols="30"
                                    rows="5">{{ old('description', $movie->description) }}</textarea>
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="director" class="input-title">
                                    کارگردان
                                </label>
                                <input type="text" name="director" value="{{ old('director', $movie->director) }}"
                                    placeholder="نام کارگردان"
                                    class="form-control custom-focus @error('director') is-invalid @enderror"
                                    id="director">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="producer" class="input-title">
                                    تهیه کننده (اختیاری)
                                </label>
                                <input type="text" name="producer" value="{{ old('producer', $movie->producer) }}"
                                    placeholder="نام تهیه کننده"
                                    class="form-control custom-focus @error('producer') is-invalid @enderror"
                                    id="producer">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="" class="input-title">
                                    کشور سازنده
                                </label>
                                <input type="text" name="country" value="{{ old('country', $movie->country) }}"
                                    placeholder="کشور سازنده"
                                    class="form-control custom-focus @error('country') is-invalid @enderror" id="country">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="imdb" class="input-title">
                                    نمره imdb
                                </label>
                                <input type="number" name="imdb" step="any"
                                    value="{{ old('imdb', $movie->imdb) }}" placeholder="نمره IMDB"
                                    class="form-control url custom-focus @error('imdb') is-invalid @enderror"
                                    id="imdb">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="" class="input-title">
                                    رده سنی
                                </label>
                                <input type="number" name="ages" value="{{ old('ages', $movie->ages) }}"
                                    placeholder="حداقل سن مجاز"
                                    class="form-control url custom-focus @error('ages') is-invalid @enderror"
                                    id="ages">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="year_construction" class="input-title">
                                    سال ساخت
                                </label>
                                <input type="number" name="year_construction"
                                    value="{{ old('year_construction', $movie->year_construction) }}"
                                    placeholder="سال ساخت"
                                    class="form-control url custom-focus @error('year_construction') is-invalid @enderror"
                                    id="year_construction">
                            </div>
                        </div>
                    </div> <!-- /. col -->
                    <!-- end places content -->
                </div> <!-- /. end-section -->
            </div>
            <div class="col-12 col-md-3 my-2 px-0">
                <div class="card">
                    <div class="card-header" onclick="openCard(this)">
                        <div class="row d-flex justify-content-between px-2">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-save" viewBox="0 0 16 16">
                                    <path
                                        d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z" />
                                </svg>
                                <span class="ml-1">ثبت و تنظیم</span>
                            </div>
                            <span class="card-dropdown-button caret-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                                    <path
                                        d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <label for="" class="input-title mt-2">
                            پوستر سریال
                        </label>
                        <div class="main-pic">
                            <label class="-label d-flex flex-column justify-content-center align-items-center"
                                for="file" style="height:15rem !important;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                    fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
                                </svg>
                            </label>
                            <input id="file" name="poster" type="file" onchange="loadFile(event)" />
                            <img style="height:15rem !important;" src="{{ asset($movie->poster) }}" id="output">
                        </div>
                        <label for="inputFile" class="input-title mt-2">
                            تصویر پس زمینه (اختیاری)
                        </label>
                        <div class="form-group inputDnD">
                            <input type="file" class="form-control-file" name="wallpaper" id="inputFile"
                                onchange="readUrl(this)" data-title="کلیک کنید یا تصویر را بکشید">
                            @if ($movie->wallpaper)
                                <label for="inputFile" class="input-title mt-2">
                                    تصویر فعلی
                                </label>
                                <img src="{{ asset($movie->wallpaper) }}" width="200" height="100"
                                    alt="">
                            @endif
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <label for="" class="input-title">
                                آپلود تیزر (اختیاری)
                            </label>
                            <div id="upload-container" class="text-center">
                                <button type="button" id="browseFile" class="btn btn-outline-dark w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                                        <path fill-rule="evenodd"
                                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
                                    </svg>
                                    <span class="ml-2">آپلود تیزر</span>
                                </button>
                            </div>
                            <div style="display: none" class="progress mt-3" style="height: 25px">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary "
                                    role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                    style="width: 75%; height: 100%">75%</div>
                            </div>
                            @if ($movie->teaser_id)
                                <video id="videoPreview"
                                    src="{{ old('teaser', $movie->teaser_id) ? URL::to('/') . '/' . old('teaser', $movie->teaser->teaser) : '' }}"
                                    controls
                                    class="{{ old('teaser', $movie->teaser->teaser) ? 'block' : 'd-none' }} mt-3"
                                    style="width: 100%; height: auto"></video>
                            @endif
                            <input type="hidden" name="teaser" value="{{ old('teaser') }}">
                        </div>
                    </div>
                    <div class="card-footer px-3">
                        <button type="submit" id="save-btn" class="btn btn-indigo w-100">
                            مرحله بعد
                            &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/plugins/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

    <script src="{{ asset('assets/admin/plugins/resumable/resumable.min.js') }}"></script>

    <script>
        let browseFile = $('#browseFile');
        let progress = $('.progress');
        let resumable = new Resumable({
            target: "{{ route('admin.teaser.store') }}",
            query: {
                _token: "{{ csrf_token() }}"
            }, // CSRF token
            fileType: ['mp4'],
            // default is 1*1024*1024, this should be less than your maximum limit in php.ini
            chunkSize: 10 * 1024 * 1024,
            headers: {
                'Accept': 'application/json'
            },
            testChunks: true,
            throttleProgressCallbacks: 1,
            maxFileSize: "{{ Config::get('chunk-upload.max_upload_file_size') }}",
            fileTypeErrorCallback: function(file, errorCount) {
                errorToast('نوع فایل نا معتبر است.');
            },
            maxFileSizeErrorCallback: function(file, errorCount) {
                errorToast("اندازه فایل نباید بزرگتر از 100 مگابایت باشد.");
            }

        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function(file) {
            showProgress();
            resumable.upload();
            $("#browseFile").remove();
        });

        resumable.on('fileProgress', function(file) {
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function(file, response) {
            response = JSON.parse(response)
            $('#videoPreview').removeClass('d-none');
            $('#videoPreview').attr('src', response.path);
            url = response.path.replace(location.origin, '', response.path).substring(1);
            $('input[name=teaser]').attr('value', url);
            progress.find('.progress-bar').removeClass('bg-primary');
            progress.find('.progress-bar').addClass('bg-success');
            progress.find('.progress-bar').removeClass('progress-bar-animated');
            successToast('آپلود ویدئو کامل شد')
            successToast('به لیست ویدئو ها اضافه شد')
        });

        resumable.on('fileError', function(file, response) {
            progress.find('.progress-bar').removeClass('bg-primary');
            progress.find('.progress-bar').addClass('bg-danger');
            errorToast('آپلود با خطا مواجه شد')
        });


        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            progress.find('.progress-bar').html('0%');
            progress.show();
        }

        function updateProgress(value) {
            progress.find('.progress-bar').css('width', `${value}%`)
            progress.find('.progress-bar').html(`${value}%`)
        }

        function hideProgress() {
            progress.hide();
        }
    </script>
@endsection

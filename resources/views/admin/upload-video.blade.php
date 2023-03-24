@extends('admin.layouts.app' , ['title' => "آپلود با کیفیت $quality"])

@section('content')

<div class="d-flex flex-column mt-2">
    @if ($item->videosable->where('quality' , $quality)->first())
        <p class="text-danger my-4">توجه ! ویدئویی برای این آیتم با این کیفیت وجود دارد ، در صورت آپلود مجدد ویدئوی قبلی پاک خواهد شد.</p>
    @endif
    <div id="upload-container" class="text-center">
        <button type="button" id="browseFile" class="btn btn-outline-dark w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                <path fill-rule="evenodd"
                    d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
            </svg>
            <span class="ml-2">آپلود با کیفیت {{ $quality }}P</span>
        </button>
    </div>
    <div style="display: none" class="progress mt-3" style="height: 25px">
        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary "
            role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
            style="width: 75%; height: 100%">75%</div>
    </div>
    <video id="videoPreview" src="{{ old('video') ? URL::to('/') . '/' . old('video') : '' }}"
        controls class="{{ old('video') ? 'block' : 'd-none' }} mt-3"
        style="width: 100%; height: auto"></video>

    <input type="hidden" name="video" value="{{ old('video') }}">
</div>


@endsection

@section('script')
<script src="{{ asset('assets/admin/plugins/resumable/resumable.min.js') }}"></script>
<script>
    let browseFile = $('#browseFile');
    let progress = $('.progress');
    let resumable = new Resumable({
        target: "{{ route('admin.upload-video.store') }}",
        query: {
            _token: "{{ csrf_token() }}",
            model : "{{ $model }}",
            id : "{{ $id }}",
            quality : "{{ $quality }}"
        }, // CSRF token 
        fileType: ['mp4'],
        // default is 1*1024*1024, this should be less than your maximum limit in php.ini
        chunkSize: 10 * 1024 * 1024,
        headers: {
            'Accept': 'application/json'
        },
        testChunks: true,
        throttleProgressCallbacks: 1,
        maxFileSize: "{{ Config::get('chunk-upload.max_upload_video_size') }}",
        fileTypeErrorCallback: function(file, errorCount) {
            errorToast('نوع فایل نا معتبر است.');
        },
        maxFileSizeErrorCallback: function(file, errorCount) {
            errorToast("اندازه فایل نباید بزرگتر از 4GB مگابایت باشد.");
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
        $('input[name=video]').attr('value', url);
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
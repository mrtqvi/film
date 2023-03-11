@extends('admin.layouts.app', ['title' => ' ثبت اطلاعات تکمیلی '])

@section('content')
<div class="row d-flex justify-content-between">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="h3 mb-0 section-heading">{{ $item->fa_title }}</h2>
    </div>
    <div class="col-auto mb-3">
        <a href="{{ $item->privatePath() }}" type="button" class="btn btn-success px-4">بازگشت</a>
    </div>
</div>
    @if ($errors->any())
        <div class="alert alert-danger d-flex flex-column row" role="alert">
            @foreach ($errors->all() as $error)
                <div class="mt-2">{{ $error }}</div>
            @endforeach
        </div>
    @endif
    <div class="row">
        <div class="col-12 pr-2">
            <div class="card">
                <div class="card-header" onclick="openCard(this)">
                    <div class="row d-flex justify-content-between px-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-add" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                <path
                                    d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                            </svg>
                            <span class="ml-1">ثبت اطلاعات عوامل سریال</span>
                        </div>
                    </div>
                </div>
                <form action="{{ route('admin.factor.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input type="hidden" name="factorizable_type" value="{{ get_class($item) }}">
                    <input type="hidden" name="factorizable_id" value="{{ $item->id }}">
                    <div class="px-4 text-danger mt-3">*** مقدار دهی موارد زیر اختیاری است***</div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-4 my-2">
                                <label for="filmnamenevis" class="input-title">
                                    فیلم‌نامه‌نویس
                                </label>
                                <input type="hidden" name="factors[0][key]" value="فیلم‌نامه‌نویس">
                                <input type="text" name="factors[0][value]"
                                    value="{{ old('factors.0.value', $item->getFactor('فیلم‌نامه‌نویس')) }}"
                                    placeholder="فیلم نامه نویس"
                                    class="form-control custom-focus @error('factors.0.value') is-invalid @enderror"
                                    id="filmnamenevis">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="filmbardar" class="input-title">
                                    مدیر فیلمبرداری
                                </label>
                                <input type="hidden" name="factors[1][key]" value="مدیر فیلمبرداری">
                                <input type="text" name="factors[1][value]"
                                    value="{{ old('factors.1.value', $item->getFactor('مدیر فیلمبرداری')) }}"
                                    placeholder="مدیر فیلمبرداری"
                                    class="form-control custom-focus @error('factors.1.value') is-invalid @enderror"
                                    id="filmbardar">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="tadvingar" class="input-title">
                                    تدوین گر
                                </label>
                                <input type="hidden" name="factors[2][key]" value="تدوین گر">
                                <input type="text" name="factors[2][value]"
                                    value="{{ old('factors.2.value', $item->getFactor('تدوین گر')) }}"
                                    placeholder="تدوین گر"
                                    class="form-control custom-focus @error('factors.2.value') is-invalid @enderror"
                                    id="tadvingar">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="ahangsaz" class="input-title">
                                    آهنگساز
                                </label>
                                <input type="hidden" name="factors[3][key]" value="آهنگساز">
                                <input type="text" name="factors[3][value]"
                                    value="{{ old('factors.3.value', $item->getFactor('آهنگساز')) }}"
                                    placeholder="آهنگساز"
                                    class="form-control custom-focus @error('factors.3.value') is-invalid @enderror"
                                    id="ahangsaz">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="tarkib-seda" class="input-title">
                                    طراحی ترکیب صدا
                                </label>
                                <input type="hidden" name="factors[4][key]" value="طراحی ترکیب صدا">
                                <input type="text" name="factors[4][value]"
                                    value="{{ old('factors.4.value', $item->getFactor('طراحی ترکیب صدا')) }}"
                                    placeholder="طراحی ترکیب صدا"
                                    class="form-control custom-focus @error('factors.4.value') is-invalid @enderror"
                                    id="tarkib-seda">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="sedabardari" class="input-title">
                                    مدیر صدابرداری
                                </label>
                                <input type="hidden" name="factors[5][key]" value="مدیر صدابرداری">
                                <input type="text" name="factors[5][value]"
                                    value="{{ old('factors.5.value', $item->getFactor('مدیر صدابرداری')) }}"
                                    placeholder="مدیر صدابرداری"
                                    class="form-control custom-focus @error('factors.5.value') is-invalid @enderror"
                                    id="sedabardari">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="tarah-lebas" class="input-title">
                                    طراح لباس
                                </label>
                                <input type="hidden" name="factors[6][key]" value="طراح لباس">
                                <input type="text" name="factors[6][value]"
                                    value="{{ old('factors.6.value', $item->getFactor('طراح لباس')) }}"
                                    placeholder="طراح لباس"
                                    class="form-control custom-focus @error('factors.6.value') is-invalid @enderror"
                                    id="tarah-lebas">
                            </div>

                            <div class="form-group col-md-4 my-2">
                                <label for="modir-tolid" class="input-title">
                                    مدیر تولید
                                </label>
                                <input type="hidden" name="factors[7][key]" value="مدیر تولید">
                                <input type="text" name="factors[7][value]"
                                    value="{{ old('factors.7.value', $item->getFactor('مدیر تولید')) }}"
                                    placeholder="مدیر تولید"
                                    class="form-control custom-focus @error('factors.7.value') is-invalid @enderror"
                                    id="modir-tolid">
                            </div>

                            <div class="form-group col-md-4 my-2">
                                <label for="jelve-vijhe" class="input-title">
                                    طراح جلوه های ویژه
                                </label>
                                <input type="hidden" name="factors[8][key]" value="آهنگساز">
                                <input type="text" name="factors[8][value]"
                                    value="{{ old('factors.8.value', $item->getFactor('طراح جلوه های ویژه')) }}"
                                    placeholder="طراح جلوه های ویژه"
                                    class="form-control custom-focus @error('factors.8.value') is-invalid @enderror"
                                    id="jelve-vijhe">
                            </div>
                            <div class="form-group col-md-4 my-2">
                                <label for="akkas" class="input-title">
                                    عکاس
                                </label>
                                <input type="hidden" name="factors[9][key]" value="عکاس">
                                <input type="text" name="factors[9][value]"
                                    value="{{ old('factors.3.value', $item->getFactor('عکاس')) }}" placeholder="عکاس"
                                    class="form-control custom-focus @error('factors.9.value') is-invalid @enderror"
                                    id="akkas">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" id="save-btn" class="btn btn-indigo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check-lg" viewBox="0 0 16 16">
                                <path
                                    d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                            </svg>
                            &nbsp;
                            ثبت
                        </button>
                    </div>
                </form>
                <!-- end places content -->
            </div>
        </div>
    </div> <!-- .row -->
@endsection

@section('script')
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
@endsection

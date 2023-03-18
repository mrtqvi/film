@extends('app.layouts.app', ['title' => 'فال و فیلم | صفحه اصلی'])

@section('content')

    @include('profile.alerts.confirm')

    @include('app.home.slider')


    @include('app.home.slider-movie')



@endsection

@extends('app.layouts.app', ['title' => "ژانر ها"])

@section('content')
<div class="grid grid-cols-12 gap-5 space-x-3 px-3 md:px-6 lg:mx-10 mt-5">
    @foreach($categories as $category)
    <a href="{{ $category->show() }}" class="col-span-6 sm:col-span-4 md:col-span-3 relative">
        <img class="h-32 w-full transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" src="{{ asset($category->image) }}" alt="{{ $category->name }}">
        <div class="absolute bottom-3 w-full text-center drop-shadow-2xl text-gray-50 text-lg ">{{ $category->name }}</div>
    </a>
    @endforeach
</div>
@endsection
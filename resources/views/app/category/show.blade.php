@extends('app.layouts.app', ['title' => " ژانر $category->name"])

@section('content')
    <div class="flex flex-wrap gap-2 px-3 md:px-6 mt-5">
        @foreach ($categories as $catgeoryItem)
            <a href="{{ $catgeoryItem->show() }}" class="relative">
                <img class="h-14 w-24 md:h-20 md:w-full transition-all duration-300 rounded-lg cursor-pointer {{ $category->id == $catgeoryItem->id ? 'border border-green-400 pointer-events-none' : 'filter grayscale hover:grayscale-0' }}"
                    src="{{ asset($catgeoryItem->image) }}" alt="{{ $catgeoryItem->name }}">
                <div class="absolute bottom-3 w-full text-center drop-shadow-2xl text-gray-50 text-xs md:text-sm">
                    {{ $catgeoryItem->name }}</div>
            </a>
        @endforeach
    </div>
    <div class="flex justify-between items-center mx-6 my-8">
        <div>
            <h2 class="font-bold">ژانر {{ $category->name }}</h2>
            <span class="text-xs text-gray-600">چینش بر اساس جدیدترین ها</span>
        </div>
    </div>
    <div class="grid grid-cols-12 gap-3 px-3 md:px-6 my-5">
        @foreach ($items->where('status' , 1) as $item)
        <div class="flex justify-center bg-main rounded col-span-full lg:col-span-6 relative">
            <span class="px-1 py-0.5 bg-lime-300 text-gray-800 border border-lime-600 absolute rounded-xl text-xs left-3 top-3">{{ get_class($item) == App\Models\Series::class ? 'سریال' : ' سینمایی' }}</span>
            <div class="flex items-center rounded-lg shadow border border-gray-800 md:min-w-full md:flex-row">
                <img class="w-36 h-48 object-cover rounded-3xl p-4" src="{{ asset($item->poster) }}" alt="" />
                <div class="flex flex-col justify-start p-6">
                    <h5 class="mb-2 text-gray-400">
                        {{ $item->fa_title }} | {{ $item->en_title }}
                    </h5>
                    <p class="mb-4 text-xs text-gray-500 leading-6">
                        {{ Str::limit($item->description, 100, '...') }}
                    </p>
                    <div class="flex justify-between">
                        <a href="{{ $item->show() }}"
                            class="flex text-xs h-8 px-4 items-center bg-[#64D947] hover:bg-[#00BD08] text-slate-900 transition-all delay-200 py-2  rounded">
                            <svg class=" ml-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                <path
                                    d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                            </svg>
                            دیدن فیلم
                        </a>
                        <div class="flex items-center">
                            <span>
                                <small class="">8.7</small>
                            </span>
                            </span>
                            <div class="mr-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="#bdb722"
                                    class="t-icon-0-1-525">
                                    <path
                                        d="M11.107 9.587c.1-.424.122-.824.2-1.248l.122-.965.122-.918a7 7 0 0 1 .1-.706l.1-.753c.05-.235.073-.494.1-.73.024-.212 0-.212.22-.212h3.746c.122 0 .147.024.147.14V15.78c0 .094-.024.14-.122.14h-2.36c-.122 0-.147-.024-.147-.14v-6.3h-.024l-.27 1.46-.245 1.295-.22 1.295-.2 1.13-.22 1.177c-.024.094-.05.118-.147.118h-1.662c-.05 0-.1 0-.1-.07l-.343-1.837-.367-1.884-.367-1.978-.147-.73v6.357c0 .118-.024.165-.147.165h-2.4c-.122 0-.147-.024-.147-.14V4.242c0-.094.024-.14.122-.14h3.453c.073 0 .122 0 .147.094l.27 1.483.294 1.6.22 1.32a3.5 3.5 0 0 1 .272.99zm6.288.3V4.195c0-.14.05-.165.17-.165h3.942a4.46 4.46 0 0 1 1.665.235 2.66 2.66 0 0 1 1.175.8 2.25 2.25 0 0 1 .367.894 6.31 6.31 0 0 1 .049 1.176v6.352a1.8 1.8 0 0 1-.661 1.459 2.76 2.76 0 0 1-1.1.518 6.59 6.59 0 0 1-1.665.212l-3.8.024c-.122 0-.1-.07-.1-.14l-.043-5.67zm2.9-.094v3.858c0 .094.024.118.122.118a4.51 4.51 0 0 0 .563-.024.56.56 0 0 0 .514-.588V6.383c.006-.183-.1-.35-.27-.423a2.18 2.18 0 0 0-.784-.118c-.122 0-.147.024-.147.14zm8.917-3.08a5.12 5.12 0 0 1 1.494-.73 2.02 2.02 0 0 1 1.812.4 1.45 1.45 0 0 1 .588 1.2v7c-.022.595-.464 1.1-1.053 1.177a4.36 4.36 0 0 1-1.1.047 4.08 4.08 0 0 1-1.053-.26l-.857-.26c-.086-.026-.18.013-.22.094-.07.133-.12.276-.147.424-.024.07-.05.094-.122.094H26.12c-.073 0-.1-.024-.1-.07V4.22c0-.14.025-.165.17-.165h2.8c.17 0 .17 0 .17.188l.05 2.472zm.2 3.955v3.085a.46.46 0 0 0 .1.306c.082.133.244.2.392.14.17-.047.22-.118.22-.33v-6.1a.7.7 0 0 0-.024-.235c-.046-.186-.226-.308-.416-.282-.147.024-.27.07-.27.33zM1.924 9.963V4.195c0-.118.024-.14.147-.14h2.62c.122 0 .122.024.122.14v11.583c0 .118-.024.14-.147.14h-2.62c-.122 0-.147-.024-.147-.14l.025-5.815z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

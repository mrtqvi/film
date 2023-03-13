<!-- start navbar -->
<nav
class="border-gray-200 bg-main z-40 px-2 sm:px-4 border-b border-b-slate-600 md:border-none sticky md:static top-0">
<div class="flex flex-wrap items-center justify-between">
    <!-- logo -->
    <div
        class="relative flex justify-center md:fixed top-0 right-0 w-auto md:w-[calc(16rem_-_1px)] order-2 md:order-1 border-0 py-5 md:border-l border-l-slate-700">
        <a href="">
            <img src="{{ asset('images/default/logo.png') }}" class="w-32" alt="لوگوی سایت">
        </a>
    </div>
    <!-- toggle sidebar -->
    <div class="flex items-center md:hidden order-1">
        <button type="button" onclick="toggleSidebar()"
            class="inline-flex items-center p-2 ml-1 text-sm rounded-lg focus:outline-none text-gray-400"
            aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <!-- search bar -->
    <div type="button" class="flex order-3 py-3 mr-0 md:mr-auto">
        <form>
            <label for="default-search" class="mb-2 text-sm font-medium sr-only text-gray-100">جستجو</label>
            <div class="relative">
                <div onclick="toggleSearch()"
                    class="absolute z-30 inset-y-0 left-0 flex items-center pl-3 cursor-pointer md:pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" id="search" name="search"
                    class="hidden transition-transform -translate-x-full md:transition-none md:translate-x-0 md:block w-full outline-none p-2 text-sm rounded-full bg-transparent border border-slate-700 placeholder-gray-400 text-gray-100 main-border-green"
                    placeholder="جستجو" autocomplete="off">
            </div>
        </form>
    </div>
    <!-- end search bar -->
</div>
</nav>
<!-- end navbar -->
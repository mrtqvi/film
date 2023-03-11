<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex flex-wrap justify-content-between align-items-center">
            <a target="_blank" class="d-flex justify-content-center mt-2 flex-fill" href="{{ route('admin.index') }}">
                <img src="{{ asset('images/default/logo.png') }}" alt="logo" class="logo">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item ">
                <a href="{{ route('admin.index') }}" aria-expanded="false"
                   class="nav-link @active('admin.index') active-sidebar @endactive">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">داشبورد</span><span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown @active('admin.series') active-sidebar @endactive">
                <a href="#series" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-camera-reels" viewBox="0 0 16 16">
                        <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0z"/>
                        <path
                            d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h7zm6 8.73V7.27l-3.5 1.555v4.35l3.5 1.556zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1z"/>
                        <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                    <span class="ml-3 item-text">سریال</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="series">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.series.index') }}"><span class="ml-1 item-text">همه سریال ها </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.series.create') }}"><span class="ml-1 item-text">سریال جدید</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown @active('admin.content.news') active-sidebar @endactive">
                <a href="#movie" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-newspaper" viewBox="0 0 16 16">
                        <path
                            d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                        <path
                            d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                    </svg>
                    <span class="ml-3 item-text">سینمایی</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="movie">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">همه سینمایی ها </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">سینمایی جدید</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown @active('admin.categories') active-sidebar @endactive">
                <a href="#categories" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-view-list" viewBox="0 0 16 16">
                        <path
                            d="M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z"/>
                    </svg>
                    <span class="ml-3 item-text">دسته بندی ها</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="categories">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.categories.index') }}"><span
                                class="ml-1 item-text">همه دسته بندی ها </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.categories.create') }}"><span
                                class="ml-1 item-text">دسته بندی جدید</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown @active('admin.content.news') active-sidebar @endactive">
                <a href="#slider" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-newspaper" viewBox="0 0 16 16">
                        <path
                            d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                        <path
                            d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                    </svg>
                    <span class="ml-3 item-text">اسلایدر</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="slider">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">همه اسلایدر ها </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">اسلایدر جدید</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown @active('admin.actors') active-sidebar @endactive">
                <a href="#actors" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-video3" viewBox="0 0 16 16">
                        <path d="M14 9.5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm-6 5.7c0 .8.8.8.8.8h6.4s.8 0 .8-.8-.8-3.2-4-3.2-4 2.4-4 3.2Z"/>
                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5.243c.122-.326.295-.668.526-1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v7.81c.353.23.656.496.91.783.059-.187.09-.386.09-.593V4a2 2 0 0 0-2-2H2Z"/>
                    </svg>
                    <span class="ml-3 item-text">بازیگران</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="actors">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.actors.index') }}"><span class="ml-1 item-text">لیست و ایجاد بازیگران </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="" aria-expanded="false" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                        <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                    </svg>
                    <span class="ml-3 item-text">کامنت ها</span><span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="" aria-expanded="false" class="nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">مدیریت کاربران</span><span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>

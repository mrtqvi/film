<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex flex-wrap justify-content-between align-items-center">
        <a target="_blank" class="mx-auto mt-2 flex-fill" href="">
          فال و فیلم
          {{-- <img src="" alt="logo" class="brand-sm "> --}}
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item ">
          <a href=""  aria-expanded="false" class="nav-link @active('admin.index') active @endactive">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">داشبورد</span><span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-2 mb-1">
        <small>بخش محتوا</small>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown @active('admin.content.news') active @endactive">
          <a href="#news" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
              <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
              <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
            </svg>
            <span class="ml-3 item-text">اخبار</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="news">
            <li class="nav-item">
              <a class="nav-link pl-3" href=""><span class="ml-1 item-text">همه اخبار </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href=""><span class="ml-1 item-text">اخبار جدید</span></a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
</aside>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script src="{{ asset('assets/app/js/jquery-3.5.1.min.js') }}"></script>



<!-- start scripts -->
<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('#sidebar');
        sidebar.classList.contains('hidden') ? sidebar.classList.remove('hidden') : sidebar.classList.add('hidden');
    }

    function toggleSearch() {
        const search = document.querySelector('#search');
        if (search.classList.contains('hidden')) {
            search.classList.remove('hidden');
            search.classList.remove('-translate-x-full');
            search.classList.add('-translate-x-0');
        } else {
            search.classList.add('hidden');
            search.classList.add('-translate-x-0');
            search.classList.remove('-translate-x-full');
        }
    }
</script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 30,
        effect: "fade",
        autoplay: {
            delay: 6500,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: "#swiper-button-next",
            prevEl: "#swiper-button-prev",
        },
    });
</script>
<script>
    var swiper = new Swiper(".slide-container-film", {
        slidesPerView: 5,
        spaceBetween: 25,
        sliderPerGroup: 5,
        loop: false,
        centerSlide: "true",
        fade: "true",
        grabCursor: "true",

        navigation: {
            nextEl: "#swiper-button-next1",
            prevEl: "#swiper-button-prev1",
        },

        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            520: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 3,
            },
            960: {
                slidesPerView: 3,
            },
            1000: {
                slidesPerView: 5,
            },
        },
    });
</script>
<script>
    var swiper = new Swiper(".slide-container", {
        slidesPerView: 5,
        spaceBetween: 10,
        sliderPerGroup: 5,
        loop: false,
        centerSlide: "true",
        fade: "true",
        grabCursor: "true",

        navigation: {
            nextEl: "#swiper-button-next1",
            prevEl: "#swiper-button-prev1",
        },

        breakpoints: {
            0: {
                slidesPerView: 4,
            },
            520: {
                slidesPerView: 4,
            },
            768: {
                slidesPerView: 3,
            },
            960: {
                slidesPerView: 3,
            },
            1000: {
                slidesPerView: 5,
            },
        },
    });
</script>
<!-- end scritps -->


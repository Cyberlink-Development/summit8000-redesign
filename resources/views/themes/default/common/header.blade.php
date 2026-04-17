<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="description" content="@yield('meta_description')">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="msvalidate.01" content="060425E21D342C866B90681D767B2665" />

    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Flowbite & Tailwind CDN -->
    <link rel="canonical" href="{{ url()->current() }}" />
    <link href="{{ asset('theme-assets/css/app.css') }}" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme-assets/assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('theme-assets/assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme-assets/assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('theme-assets/assets/favicon/site.webmanifest') }}">
    <meta name="google-site-verification" content="6sifHs62HueMxX3V1t1t6F8Ir3anLHS069K7EAijSBI" />

    {{-- GLOBAL ORGANIZATION SCHEMA --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "TravelAgency",
        "name": "Summit 8000",
        "url": "https://summit8000.com",
        "logo": "{{ asset('theme-assets/logo.svg') }}",
        "image": "{{ asset('theme-assets/logo.svg') }}",
        "address": {
            "@type": "PostalAddress",
            "addressLocality": "Kathmandu",
            "addressCountry": "NP"
        }
    }
    </script>

    {{-- Page Specific Schema --}}
    @yield('schema')

</head>

<body>
    <!-- Preloader -->
    {{-- <div id="preloader" class="fixed inset-0 flex items-center justify-center bg-white  z-50">
        <svg aria-hidden="true" class="w-16 h-16 text-neutral-tertiary animate-spin fill-brand-400"
            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor" />
            <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill" />
        </svg>
        <span class="sr-only">Loading...</span>
    </div> --}}

    {{-- <script>
        // Hide preloader when page is fully loaded
        window.addEventListener('load', () => {
            const preloader = document.getElementById('preloader');
            preloader.classList.add('opacity-0', 'transition-opacity', 'duration-500');
            setTimeout(() => preloader.style.display = 'none', 500);
        });
    </script> --}}

    @include('themes.default.common.response')
    <!-- Navbar desktop-->
    <nav id="desktop-navbar" class="sticky top-0 border-b border-gray-100 top-0 w-full  z-40 transition-all duration-300 ease-out bg-white">
        <div class="container   flex items-center justify-between">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center py-5">
                <img src="{{ asset('theme-assets/logo.svg') }}" class=" h-10" />
            </a>

            <!-- Right Side -->
            <div class="flex items-center gap-4 md:gap-6 lg:gap-8">
                <nav class="hidden lg:flex">
                    <ul
                        class="flex  items-center justify-between  space-x-2 text-base font-semibold text-gray-700 w-full">
                        <li>
                            <a href="{{ url('/') }}" class="flex items-center hover:text-brand-400 py-8 px-2 rounded-xl ">
                                Home</a>
                        </li>
                        <li>
                            <button id="mega-menu-button" data-dropdown-toggle="Expeditions" data-dropdown-delay="1"
                                data-dropdown-trigger="hover" data-dropdown-placement="bottom"
                                data-dropdown-offset-distance="0" data-dropdown-offset-skidding="0"
                                class="flex items-center hover:text-brand-400 py-8 px-2 rounded-xl ">
                                Expeditions <svg class="w-4 h-4 ms-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>
                            <!-- Mega Menu Dropdown -->
                            <div id="Expeditions"
                                class="z-50 hidden w-[868px] bg-white border border-gray-100 rounded-b-xl shadow-sm   overflow-hidden  ">
                                <div class="flex flex-col md:flex-row">
                                    <!-- Tabs (Left) -->
                                    <div
                                        class="w-full md:w-1/2 p-4 md:p-6 border-b md:border-b-0 md:border-r border-gray-100 bg-white">
                                        <ul class="space-y-2 md:space-y-4 font-bold text-gray-800"
                                            data-tabs-toggle="#mega-content">
                                            <ul class="space-y-2 md:space-y-4 font-bold text-gray-800"
                                                data-tabs-toggle="#mega-content">

                                                @foreach ($expedition as $index => $value)
                                                    <li>
                                                        <button class="w-full text-left px-5 py-4 rounded-xl transition hover:bg-gray-50 aria-selected:bg-brand-100 aria-selected:text-gray-900 aria-selected:ring-1 aria-selected:ring-brand-200" id="tab-{{ $value->id }}" data-tabs-target="#content-{{ $value->id }}" type="button" role="tab" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                                            <div class="text-base">{{ $value->title }}</div>
                                                            <div class="text-sm font-normal text-gray-500 mt-1">
                                                                {{ $value->sub_title }}
                                                            </div>
                                                        </button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </ul>
                                    </div>
                                    <!-- Content (Right) -->
                                    <div id="mega-content" class="w-full md:w-2/3 p-10 bg-gray-50/30">

                                        @foreach ($expedition as $index => $value)
                                            @php
                                                $tripList = get_triplist($value->id)->take(9);
                                            @endphp

                                            <div id="content-{{ $value->id }}" role="tabpanel"
                                                class="{{ $index !== 0 ? 'hidden' : '' }} space-y-6">

                                                <ul class="space-y-5">
                                                    @foreach ($tripList as $item)
                                                        <li>
                                                            <a href="{{ route('trip.tripdetail',$item->uri) }}"
                                                                class="text-sm font-medium text-gray-800 hover:text-brand-400 block transition-colors leading-snug">
                                                                {{ $item->trip_title }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                                <a href="{{ route('expedition-list',$value->uri) }}"
                                                    class="inline-flex items-center text-brand-400 mt-8 hover:underline">
                                                    View all
                                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                                        stroke-width="2" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                                    </svg>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <button id="" data-dropdown-toggle="Trekkings" data-dropdown-delay="1"
                                data-dropdown-trigger="hover" data-dropdown-placement="bottom"
                                data-dropdown-offset-distance="0" data-dropdown-offset-skidding="0"
                                class="flex items-center hover:text-brand-400 py-8 px-2 rounded-xl "> Trekkings
                                <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="Trekkings"
                                class="z-50 hidden bg-white border border-gray-100 rounded-b-xl shadow-sm  min-w-48">
                                <ul class="p-2 text-sm  font-medium" aria-labelledby="multiLevelDropdownButton">
                                    @foreach ($trekking as $trek)
                                        <li>
                                            <a href="{{ route('trekking-list', $trek->uri) }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium-medium hover:text-brand-400 rounded-lg">
                                                {{ $trek->title }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </li>
                        <!--<li class="relative group">-->
                        <!--    <button id="" data-dropdown-toggle="NepalTours" data-dropdown-delay="1" data-dropdown-trigger="hover" data-dropdown-placement="bottom" data-dropdown-offset-distance="0" data-dropdown-offset-skidding="0" class="flex items-center hover:text-brand-400 py-8 px-2 rounded-xl ">Tours<svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">-->
                        <!--            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />-->
                        <!--        </svg>-->
                        <!--    </button>-->
                            <!-- Dropdown menu -->
                        <!--    <div id="NepalTours"-->
                        <!--        class="z-50 hidden bg-white border border-gray-100 rounded-b-xl shadow-sm  min-w-48">-->
                        <!--        <ul class="p-2 text-sm  font-medium" aria-labelledby="multiLevelDropdownButton">-->
                        <!--            @foreach ($tours as $tour)-->
                        <!--                <li>-->
                        <!--                    <a href="{{ route('tour-list', $tour->uri) }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium-medium hover:text-brand-400 rounded-lg">-->
                        <!--                        {{ $tour->title}}-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--            @endforeach-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--</li>-->
                        <li class="relative group">
                            <button id="" data-dropdown-toggle="AboutUs" data-dropdown-delay="1" data-dropdown-trigger="hover" data-dropdown-placement="bottom" data-dropdown-offset-distance="0" data-dropdown-offset-skidding="0" class="flex items-center hover:text-brand-400 py-8 px-2 rounded-xl "> About Us<svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="AboutUs" class="z-50 hidden bg-white border border-gray-100 rounded-b-xl shadow-sm  min-w-64">
                                <ul class="p-2 text-sm  font-medium" aria-labelledby="multiLevelDropdownButton">
                                    @foreach($navigations as $nav)
                                        <li>
                                            <a href="{{route('page.posttype_detail',$nav->uri)}}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium-medium hover:text-brand-400 rounded-lg">
                                                {{ $nav->post_type }}
                                            </a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a href="{{ route('reviews') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium-medium hover:text-brand-400 rounded-lg">
                                            Read Reviews
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="relative group">
                            <a href="{{route('page.posttype_detail',$contact_us->uri)}}" class="flex items-center hover:text-brand-400 py-8 px-2 rounded-xl ">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Search Button -->
                <button type="button" data-modal-target="searchModal" data-modal-toggle="searchModal" class=" inline-flex items-center justify-center w-10 h-10
  rounded-xl border border-gray-200 hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.4a7.5 7.5 0 11-15 0
      7.5 7.5 0 0115 0z" />
                    </svg>
                </button>
                <!-- CTA Button -->
                <a href="{{ route('plan-trip') }}" class="hidden sm:inline-flex text-white bg-brand-400 hover:bg-brand-500 font-medium rounded-xl text-sm px-5 py-2.5 transition shadow-sm">
                    Plan Your Trip
                </a>

                <!-- Hamburger Menu -->
                <button class="lg:hidden inline-flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition" type="button" data-drawer-target="drawer-disable-body-scrolling" data-drawer-show="drawer-disable-body-scrolling" data-drawer-body-scrolling="false" aria-controls="drawer-disable-body-scrolling" data-drawer-placement="right">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

            </div>
        </div>
    </nav>
    <!-- Navbar desktop-->


    <!-- nav mobile -->
    <!-- drawer component -->
    <div id="drawer-disable-body-scrolling"
        class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-neutral-primary-soft w-full border-e border-default"
        tabindex="-1" aria-labelledby="drawer-disable-body-scrolling-label">
        <div class="border-b border-default pb-4 flex items-center ">
            <a href="{{ url('/') }}" class="flex items-center space-x-2 rtl:space-x-reverse">
                <img src="{{ asset('theme-assets/logo.svg') }}" alt="Summit8000" class="h-8 md:h-10">
            </a>
            <button type="button" data-drawer-hide="drawer-disable-body-scrolling" aria-controls="drawer-disable-body-scrolling" class=" bg-transparent hover:text-heading hover:bg-neutral-tertiary-medium rounded-base w-9 h-9 absolute top-2.5 end-2.5 flex items-center justify-center">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>
                <span class="sr-only">Close menu</span>
            </button>
        </div>
        <div class="py-5 overflow-y-auto">
            <ul class="space-y-4 font-medium text-base mb-8">
                <li>
                    <a href="{{ url('/') }}"
                        class="flex items-center px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group">

                        <span class="ms-3">Home</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full justify-between px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group"
                        aria-controls="m-expeditions" data-collapse-toggle="m-expeditions">

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Expeditions</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="m-expeditions" class="hidden py-2 space-y-2 text-sm">
                        @foreach ($expedition as $value)
                            <li>
                                <a href="{{ route('expedition-list',$value->uri) }}" class="pl-10 flex items-center px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group">{{ $value->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full justify-between px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group"
                        aria-controls="m-trekkings" data-collapse-toggle="m-trekkings">

                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"> Trekkings </span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="m-trekkings" class="hidden py-2 space-y-2 text-sm">
                        @foreach ($trekking as $trek)
                            <li>
                                <a href="{{ route('trekking-list', $trek->uri) }}" class="pl-10 flex items-center px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group">{{ $trek->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <!--<li>-->
                <!--    <button type="button" class="flex items-center w-full justify-between px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group" aria-controls="m-NepalTours" data-collapse-toggle="m-NepalTours">-->

                <!--        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"> Tours </span>-->
                <!--        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">-->
                <!--            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"-->
                <!--                stroke-width="2" d="m19 9-7 7-7-7" />-->
                <!--        </svg>-->
                <!--    </button>-->
                <!--    <ul id="m-NepalTours" class="hidden py-2 space-y-2 text-sm">-->
                <!--        @foreach ($tours as $tour)-->
                <!--            <li>-->
                <!--                <a href="{{ route('tour-list', $tour->uri) }}" class="pl-10 flex items-center px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group">{{ $tour->title }}</a>-->
                <!--            </li>-->
                <!--        @endforeach-->
                <!--    </ul>-->
                <!--</li>-->
                <li>
                    <button type="button" class="flex items-center w-full justify-between px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group" aria-controls="m-AboutUs" data-collapse-toggle="m-AboutUs">
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap"> About Us </span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="m-AboutUs" class="hidden py-2 space-y-2 text-sm">
                        @foreach($navigations as $nav)
                            <li>
                                <a href="{{route('page.posttype_detail',$nav->uri)}}" class="pl-10 flex items-center px-2 py-1.5  rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group">
                                    {{ $nav->post_type }}</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('reviews') }}" class="pl-10 flex items-center px-2 py-1.5 rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group">
                                Read Reviews</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('page.posttype_detail',$contact_us->uri) }}" class="flex items-center px-2 py-1.5 rounded-base hover:bg-neutral-tertiary-medium hover:text-brand-400 group">
                        <span class="ms-3">Contact Us</span>
                    </a>
                </li>

            </ul>
            <div class="block">
                <a href="{{ route('plan-trip') }}" class="w-full block text-center text-white bg-brand-400 hover:bg-brand-500 font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm">
                    Plan Your Trip
                </a>
            </div>

        </div>
    </div>

    <!-- Search Modal -->
    <div id="searchModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed backdrop-blur-sm top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow-lg">
                <button type="button" data-modal-hide="searchModal" class="absolute -top-12 right-0 text-white bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 rounded-full w-10 h-10 flex items-center justify-center transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <!-- Search Input -->
                    <form action="{{ route('trip.search') }}" method="GET">
                        <div class="relative">
                            <input type="text" name="trip_search" placeholder="Search..." class="w-full pr-28 pl-5 py-4 text-base border border-gray-200 rounded-xl focus:ring-1 focus:ring-brand-400 focus:border-brand-400 outline-none" required />
                            <button type="submit" class="absolute right-2 top-2 bottom-2 bg-brand-400 hover:bg-brand-500 text-white px-5 rounded-lg text-sm transition"> Search </button>
                        </div>
                        <p class="text-sm font-medium text-gray-500 mb-3">Search Expeditions, Treks or Tours </p>
                    </form>
                    <!-- Popular Searches -->
                    <!-- <div>
                        <p class="text-sm font-medium text-gray-500 mb-3">Popular Searches</p>
                        <div class="flex flex-wrap gap-2">
                            <a href="trip-list.php" class="px-4 py-2 bg-gray-100 hover:bg-brand-100
              text-sm rounded-full transition"> Everest Expedition </a>
                            <a href="trip-list.php" class="px-4 py-2 bg-gray-100 hover:bg-brand-100
              text-sm rounded-full transition"> Annapurna Trek </a>
                            <a href="trip-list.php" class="px-4 py-2 bg-gray-100 hover:bg-brand-100
              text-sm rounded-full transition"> Mera Peak </a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Sticky Right Contact Button -->
    <div class="fixed right-0 bottom-20 z-40 w-auto">
        <a href="https://wa.me/9779851015875" target="_blank" class="flex items-center border-l border-gray-200 pl-3 pr-4 py-2 bg-white rounded-l-full shadow-lg hover:shadow-xl transition-all max-w-[90vw] sm:max-w-[300px]">
            <!-- Icon Circle -->
            <div class="w-9 h-9 bg-brand-100 rounded-full flex items-center justify-center text-brand-400 mr-2 sm:mr-3 flex-shrink-0">
                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-brand-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
                </svg>
            </div>

            <!-- Text -->
            <div class="leading-tight truncate">
                <div class="text-sm sm:text-base font-medium text-brand-400 truncate">+9779851015875</div>
                <div class="text-xs sm:text-sm font-medium text-gray-500 truncate">Direct Call or WhatsApp 24/7</div>
            </div>

        </a>
    </div>
    <!-- end -->

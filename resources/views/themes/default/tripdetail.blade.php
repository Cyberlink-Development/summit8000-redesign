@extends('themes.default.common.master')
@section('title', $data->meta_title ? $data->meta_title : $data->trip_title)
@section('meta_keyword', $data->meta_key)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->thumbnail)
@section('content')
<!-- hero section -->
<section class="relative " id="trip-details">
    <div class="container">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" class="mx-auto px-4 my-6 text-xs sm:text-sm text-gray-500">
            <ol class="flex flex-wrap items-center gap-x-1 gap-y-2">
                <!-- Home -->
                <li class="flex items-center">
                    <a href="{{ url('/') }}" class="hover:text-brand transition flex items-center">
                        <i class="fas fa-home mr-1"></i>
                        <span class="hidden sm:inline">Home</span>
                    </a>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-chevron-right mx-2 text-[8px]"></i>
                    <span>{{$activity->activity_parent== 'activity' ? 'Tours' : ucfirst($activity->activity_parent) }}</span>
                </li>
                <!-- Popular Treks -->
                <li class="flex items-center">
                    <i class="fas fa-chevron-right mx-2 text-[8px]"></i>
                    <span class="hover:text-brand transition"> {{ ucfirst($activity->title) }} </span>
                </li>
                <!-- Current Page -->
                <li class="flex items-center max-w-full">
                    <i class="fas fa-chevron-right mx-2 text-[8px]"></i>
                    <span class="text-brand font-medium truncate max-w-[220px] sm:max-w-none">
                        {{ $data->trip_title }}
                    </span>
                </li>
            </ol>
        </nav>
        <div class="flex flex-col lg:flex-row gap-9">
            <div class="w-full lg:w-2/3 ">
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <a href="{{$data->banner ? asset('/uploads/banners/'.$data->banner) : asset('theme-assets/assets/trip/8000.jpg')}}" data-fancybox="trip-gallery" data-caption="{{ $data->banner_alt }}">
                            <div class="relative rounded-2xl overflow-hidden group cursor-pointer h-full md:h-[480px]">
                                <img src="{{$data->banner ? asset('/uploads/banners/'.$data->banner) : asset('theme-assets/assets/trip/8000.jpg')}}" alt="{{ $data->banner_alt }}" loading="lazy"
                                    class="lazy-image w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($photos as $key => $photo)
                            @if ($key <= 2)
                                <div class="relative">
                                    <a href="{{ $photo->thumbnail ? asset('/uploads/original/' . $photo->thumbnail) : asset('theme-assets/assets/trip/8000.jpg') }}"
                                    data-fancybox="trip-gallery"
                                    data-caption="{{ $photo->title }}">

                                        <div class="relative rounded-2xl overflow-hidden group cursor-pointer h-full aspect-video">
                                            <img src="{{ $photo->thumbnail ? asset('/uploads/original/' . $photo->thumbnail) : asset('theme-assets/assets/trip/8000.jpg') }}"
                                                alt="{{ $photo->title }}"
                                                loading="lazy"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">

                                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors"></div>

                                            @if ($key === 2 && count($photos) > 3)
                                                <div class="absolute inset-0 flex items-end justify-end p-4">
                                                    <span
                                                        class="bg-white/95 text-sm text-blue-500 px-4 py-2 rounded-full hover:shadow-xl transition-all">
                                                        View All ({{ count($photos) }})
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @foreach ($photos as $key => $photo)
                    @if ($key > 2)
                        <a href="{{ asset('/uploads/original/' . $photo->thumbnail) }}"
                        data-fancybox="trip-gallery"
                        data-caption="{{ $photo->title }}"
                        class="hidden">
                        </a>
                    @endif
                @endforeach
            </div>

            <div class="w-full lg:w-1/3">
                <div class=" space-y-8">
                    <!-- Price Card -->
                    <div class="bg-white overflow-hidden">
                        <div class=" ">
                            <div class=" ">
                                <!-- <div class="flex items-center mb-2">
                                    <div class="flex text-yellow-400 text-xs">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <a class="ml-2 text-xs text-gray-500" href="#reviews">4.5 (1500 reviews)</a>
                                </div> -->
                                <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
                                    {{ $data->trip_title }}
                                </h1>
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    {{ $data->sub_title }}
                                </p>
                            </div>
                            <div class="grid grid-cols-2 md:grid-cols-2 gap-6  mb-5">
                                <div class="flex items-start space-x-2">
                                    <div class="inline-flex items-center justify-center text-brand-400">
                                        <i class="fas fa-map-marker-alt text-brand"></i>
                                    </div>
                                    @if($destinations)
                                        <div>
                                            <p class="text-xs text-gray-500 font-medium">Destination</p>
                                            <p class="text-sm font-semibold text-black/80">{{ optional($destinations)->title }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex items-start space-x-2">
                                    <div class="inline-flex items-center justify-center text-brand-400">
                                        <i class="far fa-clock text-brand"></i>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Duration</p>
                                        <p class="text-sm font-semibold text-black/80">{{ $data->duration }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full p-5 bg-gray-50 rounded-xl border border-brand-100 space-y-7">
                                <!-- Accommodation Selection -->
                                <div>
                                    <label for="accommodation"
                                        class="block text-sm font-semibold text-gray-700 mb-3 tracking-wide"> Select
                                        Accommodation </label>
                                    <select id="accommodation"
                                        class="block w-full mb-4 px-4 py-3 bg-white border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm transition">
                                        <option value="5star" data-price="1525">5 Star Hotel Accommodation</option>
                                        <option value="4star" data-price="1025">4 Star Hotel Accommodation</option>
                                        <!-- <option value="3star" data-price="725">3 Star Hotel Accommodation</option> -->
                                    </select>
                                </div>
                                <div>
                                    <!-- All Inclusive Price -->
                                    <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1"> All Inclusive Price </p>
                                    <div class="flex items-baseline justify-start mb-2">
                                        <span id="price" class="text-4xl font-extrabold text-blue-600">${{$data->price}}</span>
                                        <span class="text-lg font-bold text-gray-500 ml-2">USD</span>
                                    </div>
                                    <!-- Duration -->
                                    <p class="text-sm text-gray-500 flex items-center  ">
                                        <i class="far fa-clock mr-2"></i> {{$data->walking_per_day}}
                                    </p>
                                </div>
                                <div class="flex flex-col gap-3 w-full">
                                    <!-- Bigger Button -->
                                    <a href="{{ route('book-trip',$data->uri) }}"
                                        class="w-full currsor-pointer text-center text-white bg-brand-400 hover:bg-brand-500 font-medium px-5 py-4 rounded-xl transition hover:bg-brand/90">
                                        Book Now </a>
                                    <div class="flex gap-4">
                                        <button data-modal-target="inquiry" data-modal-toggle="inquiry"
                                            class="w-full text-brand-400 border border-brand-400 hover:bg-brand-100  font-medium rounded-xl text-sm  px-5 py-2.5 transition shadow-sm">
                                            Private Departures </button>
                                        <button data-modal-target="TellAFriend" data-modal-toggle="TellAFriend"
                                            class="w-full text-brand-400 border border-brand-400 hover:bg-brand-100  font-medium rounded-xl text-sm  px-5 py-2.5 transition shadow-sm">
                                            Tell a Friend </button>
                                    </div>
                                    <!-- Bigger Button -->
                                    <a data-modal-target="inquiry_now" data-modal-toggle="inquiry_now"
                                        class="w-full text-center text-white bg-brand-400 hover:bg-brand-500 font-medium px-5 py-4 rounded-xl">
                                        Inquiry Now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Actions Row -->
                    <div class="flex justify-between px-2 text-xs font-bold text-gray-500">
                        <a href="{{ route('plan-trip') }}" class="flex items-center hover:text-brand-400">
                            <i class="fas fa-sliders-h mr-2"></i>Plan Your Trip </a>
                        <a href="{{ route('trip.download', $data->uri) }}" class="flex items-center hover:text-brand-400" target="_blank">
                            <i class="fas fa-file-pdf mr-2"></i> Download PDF </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end -->
<style>
/* Active state */
.trip-link.active {
    background-color: var(--color-brand-soft);
    color: var(--color-blue-400);
    font-weight: 600;
}
</style>

<section class="py-12">
    <!-- MOBILE SELECT (visible on small screens) -->
    <div class="lg:hidden sticky top-[80px] z-40 bg-brand-50 border-b flex items-center mb-6 py-2">
        <div class="container flex items-center gap-2">
            <label for="tripSelect">Section:</label>
            <select id="tripSelect" class="w-full text-base font-semibold text-brand-400 border-none  bg-transparent border-0">
                <option value="#overview">Overview</option>
                @if($itinerary)
                    <option value="#itinerary">Itinerary</option>
                @endif
                @if($cost_includes->count()> 0 || $cost_excludes->count() > 0)
                    <option value="#price-includes">Price Includes</option>
                @endif
                @if($schedules->count()>0)
                    <option value="#departures">Fixed Departures</option>
                @endif
                @if($data->trip_map || $data->trip_video)
                    <option value="#RouteMapVideo">Route Map / Video</option>
                @endif
                @if(!empty($data->trip_highlight))
                    <option value="#gears">Gears</option>
                @endif
                <option value="#reviews">Reviews</option>
                @if($faqs && count($faqs) > 0)
                    <option value="#faqs">FAQs</option>
                @endif
                @if($data->trip_excerpt)
                    <option value="#extrainfo">Extra Information</option>
                @endif
                <option value="#SimilarTrips">Similar Trips</option>
            </select>
        </div>
    </div>
    <div class="container">
        <!-- DESKTOP LEFT SIDEBAR -->
        <div class="flex gap-8">
            <aside id="secondaryNav"
                class="hidden lg:block w-64 sticky top-[96px] border rounded-xl h-fit bg-white   p-4">
                <nav class="space-y-2 text-base font-medium">
                    <a href="#overview" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                        <i class="far fa-eye w-5"></i> Overview </a>
                    @if($itinerary)
                        <a href="#itinerary" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                            <i class="far fa-map w-5"></i> Itinerary </a>
                    @endif
                    @if($cost_includes->count()> 0 || $cost_excludes->count() > 0)
                        <a href="#price-includes" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                            <i class="fas fa-tags w-5"></i> Price Includes </a>
                    @endif
                    @if($schedules->count()>0)
                        <a href="#departures" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                            <i class="fas fa-calendar-alt w-5"></i> Fixed Departures </a>
                    @endif
                    @if($data->trip_map || $data->trip_video)
                        <a href="#RouteMapVideo" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                            <i class="fas fa-video w-5"></i> Route Map / Video </a>
                    @endif
                    @if(!empty($data->trip_highlight))
                        <a href="#gears" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                            <i class="fas fa-hiking w-5"></i> Gears </a>
                    @endif
                    <a href="#reviews" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                        <i class="fas fa-star w-5"></i> Reviews </a>
                    @if($faqs && count($faqs) > 0)
                        <a href="#faqs" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                            <i class="far fa-question-circle w-5"></i> FAQs </a>
                    @endif
                    @if($data->trip_excerpt)
                        <a href="#extrainfo" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                            <i class="fas fa-info-circle w-5"></i> Extra Information </a>
                    @endif
                    <a href="#SimilarTrips" class="trip-link flex items-center gap-3 px-3 py-2 rounded-xl text-gray-900 hover:bg-brand-soft hover:text-brand-light">
                        <i class="fa-solid fa-mountain w-5"></i> Similar Trips </a>
                </nav>
            </aside>
            <!-- MAIN CONTENT -->
            <div class="flex-1 ">
                <!-- overview -->
                <section class="pb-6" id="overview">
                    <div class="space-y-4  md:space-y-6">
                        <!-- Quick Facts Grid -->
                        <h2 class="text-2xl  font-bold text-gray-900 text-gray-900">Quick Facts
                        </h2>
                        <div
                            class="grid grid-cols-2 md:grid-cols-3 gap-6 bg-brand-50 p-6 rounded-xl border border-brand-100 mb-10">
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="fas fa-map-marker-alt text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Destination</p>
                                    <p class="text-base font-semibold text-black/80">{{ optional($destinations)->title }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="far fa-clock text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Duration</p>
                                    <p class="text-base font-semibold text-black/80">{{ $data->duration }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="fas fa-tachometer-alt text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Trip Difficulty</p>
                                    <p class="text-base font-semibold text-black/80">{{ grade_message_trek($data->trip_grade)}}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="fas fa-hotel text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Accommodation</p>
                                    <p class="text-base font-semibold text-black/80">{{ $data->accommodation }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="fas fa-utensils text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Meals</p>
                                    <p class="text-base font-semibold text-black/80">{{ $data->meals }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="fas fa-chart-line text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Max. Elevation</p>
                                    <p class="text-base font-semibold text-black/80">{{ $data->max_altitude }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="fas fa-users text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Group Size</p>
                                    <p class="text-base font-semibold text-black/80">{{ $data->group_size }}</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-2">
                                <div class="inline-flex items-center justify-center text-brand-400">
                                    <i class="far fa-calendar-check text-brand"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Best Time</p>
                                    <p class="text-base font-semibold text-black/80">{{$data->best_season}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- end -->
                        <!-- Text Content Sections -->
                        <div class=" max-w-none text-gray-700 space-y-4">
                            <h2 class="text-2xl  font-bold text-gray-900 text-gray-900">{{ $data->trip_title }} Overview</h2>
                            <div class="prose max-w-none">{!!$data->trip_content!!}</div>
                        </div>
                        <!-- Text Content Sections -->
                    </div>
                </section>
                <!-- end -->

                <!-- WhyWithSummit8000 -->

                <!-- <section class="rounded-xl p-5 bg-brand-50  text-gray-700" id="WhyWithSummit8000">
                    <div class=" space-y-3">
                        <h2 class="text-2xl font-bold text-brand-400">Why with Summit 8000?</h2>
                        <p>Because Summit 8000 is a trekking and expedition company built on experience, passion, and a
                            commitment to safety. It combines expert local knowledge with personalized service to guide
                            adventurers through some of the world’s most breathtaking and challenging landscapes,
                            ensuring every journey is well-planned, culturally respectful, and unforgettable—from the
                            first step on the trail to the summit and back.</p>
                    </div>
                </section> -->

                <!-- end WhyWithSummit8000 -->

                <!-- Itinerary -->
                @if($itinerary->count()>0)
                    <section class="py-6" id="itinerary">
                        <div class=" space-y-3">
                            <div class="accordion-wrapper" id="">
                                <div
                                    class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
                                    <h2 class="text-2xl font-bold text-gray-900">Detailed Itinerary</h2>
                                    <button
                                        class="toggle-accordion text-brand-400 border border-brand-400 hover:bg-brand-50 transition-colors font-medium rounded-xl text-sm px-4 py-2.5 transition shadow-sm">Expand
                                        All</button>
                                </div>
                                <div id="accordion-itinerary" data-accordion="collapse"
                                    class="rounded-base border border-default overflow-hidden shadow-xs">
                                    <!--  -->
                                    @foreach($itinerary as $key => $value)
                                        <div id="heading-{{ $key+1 }}">
                                            <button type="button"
                                                class="flex items-center justify-between w-full p-5 font-semibold  rtl:text-right text-base rounded-t-base border border-t-0 border-x-0 border-b-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 text-left"
                                                data-accordion-target="#body-{{ $key+1 }}" aria-expanded="true" aria-controls="body-{{$key+1}}">
                                                <h3 class="text-brand-900">
                                                    <span class="text-brand-400 mr-1">Day {{ $value->days }}:</span>
                                                    {{ $value->title }}</h3>
                                                <i data-accordion-icon
                                                    class=" fa fa-chevron-down transition-transform duration-300 rotate-90 text-sm text-brand-400 text-sm text-brand-400"></i>
                                            </button>
                                        </div>
                                        <div id="body-{{ $key+1}}" class="hidden border border-s-0 border-e-0 border-t-0 border-b-default" aria-labelledby="heading-{{ $key+1 }}">
                                            <div
                                                class="space-y-3 py-5 text-base font-normal text-gray-700 p-4 md:p-5 p-4 md:p-5">
                                                <div class="prose max-w-none">
                                                    {!! $value->content !!}
                                                </div>
                                                @if($value->extra_info)
                                                    <div class="flex items-start   p-4 mb-4 text-sm text-fg-brand-strong rounded-base bg-brand-50"
                                                        role="alert">
                                                        <i class="fa fa-info-circle me-2 shrink-0 mt-0.5 sm:mt-0"></i>
                                                        <p>
                                                            {{ $value->extra_info }}
                                                        </p>
                                                    </div>
                                                @endif
                                                @if($value->distance || $value->duration)
                                                    <div
                                                        class="flex flex-wrap gap-4 mt-4 text-sm text-fg-brand-strong rounded-full bg-brand-100 p-1">
                                                        @if($value->distance || $value->duration)
                                                            <div class="flex items-center">
                                                                <span
                                                                    class="  text-gray-900 px-2 py-0.5 rounded mr-2 text-sm">Accommodation:</span>
                                                                <span class="font-semibold">{{ $value->distance }}</span>
                                                            </div>
                                                        @endif
                                                        @if($value->distance || $value->duration)
                                                            <div class="flex items-center">
                                                                <span class="text-gray-900 px-2 py-0.5 rounded mr-2 text-sm">Meals:</span>
                                                                <span class="font-semibold">{{ $value->duration }}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <div id="alert-additional-content-1" class="p-4 mb-4 text-sm text-brand-900 rounded-base bg-brand-50 border border-brand-100" role="alert">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-start">
                                            <svg class="w-4 h-4 shrink-0 me-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h3m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <h3 class="font-medium">If the above {{ $data->trip_title }} itinerary does not meet your needs, we can design individualized travel plans based on your preferences and specifications.</h3>
                                                <a href="{{ route('customize-trip',$data->uri) }}" class="hidden sm:inline-flex text-white bg-brand-400 hover:bg-brand-500 mt-2
                                                font-medium rounded-xl text-sm px-5 py-2.5 transition shadow-sm"> Customized Trip </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <!-- end -->
                <!-- Cost Includes -->
                <section class="py-6" id="price-includes">
                    <div class="">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
                            @if($cost_includes->count()> 0 )
                                <div class="bg-green-50 p-6 rounded-2xl border border-green-100">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Cost Includes</h2>
                                    <div class="space-y-8">
                                        <div>
                                            <ul class="space-y-3 text-sm">
                                                @foreach($cost_includes as $key => $value)
                                                    <li class="flex items-start">
                                                        <i class="far fa-check-circle text-green-500 mt-1 mr-3 shrink-0"></i>
                                                        <span>
                                                            {{ $value->title }}
                                                        </span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($cost_excludes->count() > 0)
                                <div class="bg-red-50 p-6 rounded-2xl border border-red-100">
                                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Cost Excludes</h2>
                                    <div class="space-y-8">
                                        <div>
                                            <ul class="space-y-3 text-sm">
                                                @foreach($cost_excludes as $key => $value)
                                                    <li class="flex items-start">
                                                        <i class="far fa-times-circle text-red-500 mt-1 mr-3 shrink-0"></i>
                                                        <span>{{ $value->title }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- end -->
                
                <!-- Altitude Graph -->
                    @if($itinerary->count()>0)
                        <div class=" max-w-none text-gray-700 space-y-6 altitude-chart-wrapper">
                            <p class="text-2xl font-bold text-gray-900">Altitude Graph</p>
                            <div style="border:1px solid #e5e7eb; padding:20px; border-radius:8px; height:400px;" >
                                <canvas id="altitudeChart"></canvas>
                            </div>
                        </div>
                    @endif
                <!-- Altitude Graph -->
                
                <!-- Dates Table -->
                @if($schedules->count()>0)
                    <section class="py-6" id="departures">
                        <div class="">
                            <div class="mb-8">
                                <div class="flex justify-between items-center mb-6">
                                    <h2 class="text-2xl font-bold text-gray-900">Cost and Date</h2>
                                </div>
                                <div
                                    class="p-4 mb-4 text-sm text-brand-900 rounded-base bg-brand-50 border border-brand-100   ">
                                    <b> Start dates</b> indicate your arrival in Nepal, and <b>end dates</b> reflect your Departures from Nepal. The scheduled Departuress for the {{ $data->trip_title }} are specifically organized for group joining option. If the listed dates do not fit your availability, please reach out to us, and our team will provide alternative date options.
                                </div>
                                <div class="relative overflow-x-auto border rounded-xl shadow-sm">
                                    <div class="Departures-list bg-white shadow-base py-3">
                                        <!--  -->
                                      <ul class="[&>li+li]:border-t [&>li+li]:border-t-gray-200 before:border-gray-200">
                                            @foreach($schedules as $row)
                                                <li>
                                                    <div
                                                        class="item items-center leading-[1.35] p-6 grid grid-cols-2 md:grid-cols-5 gap-3 lg:px-6 rounded-sm text-headings/80 hover:bg-secondary/10 group transition-all duration-200">
                                                        <div class="col">
                                                            <span class="text-xs   block pb-0.5">Start Date</span>
                                                            <span class="text-brand-900 font-semibold">{{ $row->start_date }}</span>
                                                        </div>
                                                        @if($row->end_date)
                                                        <div class="col">
                                                            <span class="text-xs block pb-0.5">End Date</span>
                                                            <span class="text-brand-900 font-semibold">{{ $row->end_date }}</span>
                                                        </div>
                                                        @endif
                                                        <div class="col">
                                                            <div class="availability">
                                                                <div class="flex items-center gap-x-2">
                                                                    @if($row->availability == 'AVAILABLE')
                                                                        <span class="inline-flex items-center px-2 py-1 rounded-xl bg-green-50 text-green-600 text-xs font-medium border border-green-200">
                                                                            <i class="fa fa-check mr-1"></i> Available </span>
                                                                    @else
                                                                        <span class="inline-flex items-center px-2 py-1 rounded-xl bg-red-50 text-red-600 text-xs font-medium border border-red-200">
                                                                            <i class="fa fa-times mr-1"></i> Fully Occupied </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col md:text-center">
                                                            <span class="price text-brand-400 font-bold text-base">US ${{ $row->price }}</span>
                                                            <span class="text-headings text-xs block">Per person</span>
                                                        </div>
                                                        @if($row->availability == 'AVAILABLE')
                                                            <div class="col lg:ml-auto">
                                                                <a href="{{ route('book-trip',$data->uri) }}" class="cursor-pointer  group-hover:bg-brand-400 group-hover:text-white  text-brand-400 border border-brand-400 transition-colors font-medium rounded-xl text-sm  transition  px-4 py-2.5">Book Now</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <!--  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <!-- end -->

                <!-- video and map -->
                @if($data->trip_map || $data->trip_video)
                    <section class="py-6" id="RouteMapVideo">
                        <div class="">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-12">
                                <!-- Route Map -->
                                @if($data->trip_map)
                                    <div id="route-map">
                                        <div class="flex justify-between items-center mb-6">
                                            <h2 class="text-2xl font-bold text-gray-900">Route Map</h2>

                                            <a href="{{ asset('uploads/original/'.$data->trip_map) }}"
                                            download class="text-gray-500 border px-4 py-1.5 rounded-md text-xs flex items-center hover:bg-brand-400 hover:text-white hover:border-brand-400">
                                                <i class="fas fa-download mr-2"></i> Download Route Map
                                            </a>
                                        </div>
                                        <div class="rounded-xl overflow-hidden border border-gray-200  aspect-video">
                                            <a href="{{ asset('uploads/original/'.$data->trip_map) }}" data-fancybox="gallery"
                                                data-caption="{{$data->trip_title}} Route Map">
                                                <img src="{{ asset('uploads/original/'.$data->trip_map) }}" alt="{{$data->tripmap_alt}}" loading="lazy"
                                                    class="lazy-image w-full h-auto">
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <!-- Video Section -->
                                @if($data->trip_video)
                                    <div id="video">
                                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Trek Video</h2>
                                        <div class="relative group cursor-pointer rounded-2xl overflow-hidden shadow-2xl aspect-video">
                                            <img src="https://i.ytimg.com/vi/{{$data->trip_video}}/hqdefault.jpg" alt="{{$data->trip_title}}" loading="lazy" class="lazy-image w-full h-full object-cover">
                                            <div class="absolute inset-0 bg-black/20 flex items-center justify-center transition group-hover:bg-black/40">
                                                <a href="https://www.youtube.com/watch?v={{$data->trip_video}}" data-fancybox
                                                    class="w-20 h-20 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center border-2 border-white/50 group-hover:scale-110 transition duration-300">
                                                    <i class="fas fa-play text-white text-3xl ml-1"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                @endif
                <!-- end -->
                <!-- gears -->
                @if(!empty($data->trip_highlight))
                    <section class="py-6" id="gears">
                        <div class=" space-y-3">
                            <div class="mb-8" id="gears">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6">Gears List</h2>
                                <div class="prose max-w-none">
                                    {!! $data->trip_highlight !!}
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <!-- end -->

                <!-- review -->
                <section class="py-6" id="reviews">
                    <div class="">
                        <!-- Reviews -->
                        <div>
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Travellers' Reviews</h2>
                                    <!-- <p class="text-xs text-gray-500 mb-4">Read our <span
                                            class="font-bold text-gray-800">genuine
                                            feedback</span> from past travelers with <span
                                            class="font-bold text-gray-800">Summit 8000 Team</span> sourced from <span
                                            class="font-bold text-gray-800">TripAdvisor, Google, Facebook, and
                                            Trustpilot.</span>
                                    </p> -->
                                </div>

                                <div>
                                    <button data-modal-target="WriteReview" data-modal-toggle="WriteReview"
                                        class="w-full text-brand-400 border border-brand-400 hover:bg-brand-100  font-medium rounded-xl text-sm  px-5 py-2.5 transition shadow-sm">
                                        Write a Review </button>
                                </div>
                            </div>

                            <!-- Text Review Card -->
                            @foreach($reviews as $review)
                                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 mb-8 relative overflow-hidden">
                                    <i class="fas fa-quote-right absolute top-4 right-4 text-6xl text-gray-200"></i>
                                    <h3 class="font-bold text-lg mb-4 pr-14">{{ $review->title }}</h3>
                                    <div class="flex items-center text-yellow-400 text-sm mb-4">
                                        @for($i=0 ; $i<$review->rating ; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        <span class="ml-2 text-gray-400 font-normal"></span>
                                    </div>
                                    <div class="text-sm text-gray-600 leading-relaxed space-y-4">
                                        <div class="prose max-w-none">
                                            {!! $review->message !!}
                                        </div>
                                    </div>
                                    <div class="mt-8 flex items-center">
                                        <div
                                            class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center font-bold text-gray-500">{{ strtoupper(substr($review->full_name, 0, 1)) }}
                                            </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-bold">{{ $review->full_name }}</p>
                                            <p class="text-xs text-gray-400 uppercase">{{ $review->created_at->format('M j, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- end -->

                <!-- faq -->
                @if($faqs && count($faqs) > 0)
                    <section class="py-5" id="faqs">
                        <div class="">
                            <!-- FAQs -->
                            <div class="accordion-wrapper">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
                                    <h2 class="text-2xl font-bold text-gray-900">{{ $data->trip_title }}  FAQs </h2>
                                    <button class="toggle-accordion text-brand-400 border border-brand-400 hover:bg-brand-50 transition-colors font-medium rounded-xl text-sm px-4 py-2.5 transition shadow-sm">Expand All</button>
                                </div>
                                <div id="accordion-card" data-accordion="collapse">
                                    <!-- FAQ 1 -->
                                    @foreach($faqs as $key => $value)
                                        <div id="accordion-card-heading-{{ $key+1 }}">
                                            <button type="button" class="text-left flex items-center justify-between w-full p-4 font-medium text-body rounded-base shadow-xs border border-default hover:text-heading hover:bg-neutral-secondary-medium gap-3 [&[aria-expanded='true']]:rounded-b-none [&[aria-expanded='true']]:shadow-none" data-accordion-target="#accordion-card-body-{{ $key+1 }}" aria-expanded="false" aria-controls="accordion-card-body-{{ $key+1 }}">
                                                <h3>{{ $value->title }}</h3>
                                                <i data-accordion-icon
                                                    class=" fa fa-chevron-down transition-transform duration-300 rotate-90 text-sm text-brand-400"></i>
                                            </button>
                                        </div>
                                        <div id="accordion-card-body-{{ $key+1 }}" class="hidden border border-t-0 border-default rounded-b-base shadow-xs" aria-labelledby="accordion-card-heading-{{ $key+1 }}">
                                            <div class="p-4 text-body prose max-w-none"> {!! $value->content  !!} </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <!-- end faq -->

                <!-- extra info -->
                @if(!empty($data->trip_excerpt))
                    <section class="py-6" id="extrainfo">
                        <div class=" space-y-3">
                            <div class="mb-8" id="extrainfo">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6">Extra Information</h2>
                                <div class="prose max-w-none">
                                    {!! $data->trip_excerpt !!}
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <!-- end -->

                <div class="sticky bottom-0 left-0 z-30 w-full h-16 bg-neutral-primary-soft border-t border-default">
                    <div class="grid h-full max-w-xl grid-cols-2 mx-auto font-medium items-center text-center px-4 gap-5">

                        <a href="#trip-details"
                            class="w-full block text-center text-white bg-brand-400 hover:bg-brand-500 px-5 py-3 rounded-xl text-sm transition">
                            Inquiry Now
                        </a>

                        @if($schedules->count()>0)
                            <a href="#departures" class="w-full text-brand-400 border border-brand-400 hover:bg-brand-100 rounded-xl text-sm px-5 py-3 transition shadow-sm">
                                Fixed Departures
                            </a>
                        @endif

                    </div>
                    <!-- <div class="grid h-full max-w-xl grid-cols-2 mx-auto font-medium items-center px-4 gap-5">
                        @if($schedules->count()>0)
                            <div>
                                <a href="#departures" class="w-full block text-center text-white bg-brand-400 hover:bg-brand-500  px-5 py-3 rounded-xl text-sm transition hover:bg-brand/90"> Fixed Departures </a>
                            </div>
                        @endif
                        <div>
                            <button data-modal-target="inquiry" data-modal-toggle="inquiry"
                                class="w-full text-brand-400 border border-brand-400 hover:bg-brand-100   rounded-xl text-sm  px-5 py-3 transition shadow-sm">
                                Private Departures </button>
                        </div>
                    </div> -->
                </div>

                <!-- Section: Related -->
                <section class="py-16  relative" id="SimilarTrips">
                    <div class="">
                        <div class="flex justify-between items-end mb-10">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900">Similar Trips</h2>
                            </div>
                        </div>
                        <!-- Grid of Cards -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!--  -->
                            @foreach($similar_trips as $row)
                                <a href="{{ route('trip.tripdetail',$row->uri) }}"
                                    class="block bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 transition-transform hover:-translate-y-1">
                                    <div class="relative h-64 overflow-hidden">
                                        <img src="{{ $row->thumbnail ? asset('uploads/thumbnails/'.$row->thumbnail) : asset('theme-assets/assets/trip/2.jpg')}}" alt="{{$row->thumbnail_alt}}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-5">
                                        <div class="flex items-center gap-1 mb-2">
                                            <i class="fa fa-star text-yellow-400 text-xs"></i>
                                            <i class="fa fa-star text-yellow-400 text-xs"></i>
                                            <i class="fa fa-star text-yellow-400 text-xs"></i>
                                            <i class="fa fa-star text-yellow-400 text-xs"></i>
                                            <i class="fa fa-star-half text-yellow-400 text-xs"></i>
                                            <span class="text-slate-400 text-xs ml-1">4.0 (10 reviews)</span>
                                        </div>
                                        <h3 class="text-xl font-bold text-slate-900 mb-4">{{$row->trip_title}}
                                        </h3>
                                        <div
                                            class="flex justify-between items-center text-xs text-slate-500 mb-6 pb-6 border-b border-slate-100">
                                            <span class="flex items-center gap-1 text-xs">
                                                <img src="{{asset('theme-assets/assets/icons/map-point.svg')}}" class="h-4"> {{ optional($row->destinations->first())->title }}
                                            </span>
                                            <span class="flex items-center gap-1">
                                                <img src="{{asset('theme-assets/assets/icons/clock.svg')}}" class="h-4"> {{$row->duration}} </span>
                                            <span class="flex items-center gap-1">
                                                <img src="{{asset('theme-assets/assets/icons/spring.svg')}}" class="h-4"> {{$row->best_season}} </span>
                                        </div>
                                        <div class="flex justify-between items-end">
                                            <div>
                                                <p class="text-sm text-slate-400 font-medium"></p>
                                                <p class="text-xl font-bold text-slate-900">US$ {{$row->price}}</p>
                                            </div>
                                            <button class="text-white bg-brand-400 hover:bg-brand-500  font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm">More Info</button>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                            <!--  -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<!-- Inquiry modal -->
<div id="inquiry" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed backdrop-blur-sm top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-xl shadow-sm  ">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default p-4  ">
                <h3 class="text-lg font-medium text-heading">Private Trip of '{{ $data->trip_title }}' </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="inquiry">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('custom-trip-post') }}"  method="post">
                @csrf
                <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response"/>
                <input type="hidden" name="type" value="private"/>
                <input type="hidden" name="trip_id" value="{{ $data->id }}"/>
                <div class="p-5">
                    <div class="grid gap-4 grid-cols-2 ">
                        <div class="col-span-2">
                            <input type="text" name="name" id="name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Full Name*" required>
                        </div>
                        <div class="col-span-2">
                            <input type="email" name="email" id="namemaile"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="E-mail*" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <input type="tel" name="phone" id="phone"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Mobile*" required min="10">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <input type="number" name="peoples" id="peoples"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="No of Travellers*" required min="1">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Trip Start Date</label>
                            <input type="date" name="start_date" id="start_date"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Trip Start Date*" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Trip End Date</label>
                            <input type="date" name="end_date" id="end_date"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Trip End Date*" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-span-2">
                            <textarea id="message" rows="4" name="message"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Message*"></textarea>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4 border-t border-default p-4">
                    <button type="submit" class="flex items-center  text-white bg-brand-400 hover:bg-brand-500 font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Inquiry modal -->

<!-- Inquiry now modal -->
<div id="inquiry_now" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed backdrop-blur-sm top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-xl shadow-sm  ">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default p-4  ">
                <h3 class="text-lg font-medium text-heading"> Trip Inquiry of '{{ $data->trip_title }}' </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="inquiry_now">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('post-inquiry') }}"  method="post">
                @csrf
                <input type="hidden" id="g_recaptcha_response4" name="g_recaptcha_response4"/>
                <input type="hidden" name="trip_id" value="{{ $data->id }}"/>
                <div class="p-5">
                    <div class="grid gap-4 grid-cols-2 ">
                        <div class="col-span-2">
                            <input type="text" name="name" id="name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Full Name*" required>
                        </div>
                        <div class="col-span-2">
                            <input type="email" name="email" id="namemaile"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="E-mail*" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <input type="tel" name="phone" id="phone"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Mobile*" required min="10">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <input type="number" name="peoples" id="peoples"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="No of Travellers*" required min="1">
                        </div>

                        <div class="col-span-2">
                            <textarea id="message" rows="4" name="message"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Message*"></textarea>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4 border-t border-default p-4">
                    <button type="submit" class="flex items-center  text-white bg-brand-400 hover:bg-brand-500 font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Inquiry now modal -->

<!-- Tell a Friend modal -->
<div id="TellAFriend" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed backdrop-blur-sm top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-xl shadow-sm  ">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default p-4  ">
                <h3 class="text-lg font-medium text-heading">Tell your Friend About <spane class="text-brand-400">{{ $data->trip_title }}</spane>
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="TellAFriend">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('tell-friend-post') }}" method="post">
                @csrf
                <input type="hidden" id="g_recaptcha_response2" name="g_recaptcha_response"/>
                <input type="hidden" name="trip_id" value="{{ $data->id }}"/>
                <div class="p-5">
                    <div class="grid gap-4 grid-cols-2 ">
                        <div class="col-span-2">
                            <input type="text" name="name" id="name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Full Name*" required>
                        </div>
                        <div class="col-span-2">
                            <input type="email" name="email" id="namemaile"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Your E-mail*" required>
                        </div>
                        <div class="col-span-2">
                            <input type="femail" name="femail" id="namemaile"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Friend's Email*" required>
                        </div>
                        <div class="col-span-2">
                            <textarea id="message" rows="4" name="message"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Message*"></textarea>
                        </div>
                    </div>
                </div>
                <div class="flex items-center space-x-4 border-t border-default p-4">
                    <button type="submit" class="flex items-center  text-white bg-brand-400 hover:bg-brand-500 font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>

 <!-- Write Review modal -->
<div id="WriteReview" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed backdrop-blur-sm top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-lg max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-xl shadow-sm  ">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default p-4  ">
                <h3 class="text-lg font-medium text-heading">Write a Review </h3>
                <button type="button" class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="WriteReview">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('review.post') }}" method="Post">
                @csrf
                <input type="hidden" id="g_recaptcha_response3" name="g_recaptcha_response3"/>
                <input type="hidden" name="trip_id" value={{ $data->id }} >
                <div class="p-5">
                    <div class="grid gap-6 grid-cols-1">
                        <!-- Full Name -->
                        <div>
                            <input type="text" name="name" id="name"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                placeholder="Full Name*" required>
                        </div>
                        <!-- Email -->
                        <div>
                            <input type="email" name="email" id="email" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="E-mail*" required>
                        </div>
                        <!-- Rating -->
                        <fieldset class="space-y-3">
                            <legend class="text-sm font-medium text-gray-500">Rate your experience</legend>
                            <div class="flex flex-col sm:flex-row items-center gap-2 w-full">
                                <div>
                                    <div class="flex flex-row-reverse justify-end gap-1 sm:gap-2">
                                        <!-- Star 5 -->
                                        <input type="radio" id="star5" name="rating" value="5" class="peer sr-only" required>
                                        <label for="star5"
                                            class="cursor-pointer text-gray-300 text-2xl sm:text-3xl transition-all duration-200 peer-checked:text-amber-500 hover:text-amber-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6 sm:w-7 sm:h-7">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        </label>

                                        <!-- Star 4 -->
                                        <input type="radio" id="star4" name="rating" value="4" class="peer sr-only">
                                        <label for="star4"
                                            class="cursor-pointer text-gray-300 text-2xl sm:text-3xl transition-all duration-200 peer-checked:text-amber-500 hover:text-amber-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6 sm:w-7 sm:h-7">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        </label>

                                        <!-- Star 3 -->
                                        <input type="radio" id="star3" name="rating" value="3" class="peer sr-only">
                                        <label for="star3"
                                            class="cursor-pointer text-gray-300 text-2xl sm:text-3xl transition-all duration-200 peer-checked:text-amber-500 hover:text-amber-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6 sm:w-7 sm:h-7">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        </label>

                                        <!-- Star 2 -->
                                        <input type="radio" id="star2" name="rating" value="2" class="peer sr-only">
                                        <label for="star2"
                                            class="cursor-pointer text-gray-300 text-2xl sm:text-3xl transition-all duration-200 peer-checked:text-amber-500 hover:text-amber-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6 sm:w-7 sm:h-7">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        </label>

                                        <!-- Star 1 -->
                                        <input type="radio" id="star1" name="rating" value="1" class="peer sr-only">
                                        <label for="star1"
                                            class="cursor-pointer text-gray-300 text-2xl sm:text-3xl transition-all duration-200 peer-checked:text-amber-500 hover:text-amber-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6 sm:w-7 sm:h-7">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>

                                <!-- Rating Text -->
                            <div id="rating-text" class="mt-2 sm:mt-0 sm:ml-2 text-gray-600 font-normal text-sm sm:text-base text-center sm:text-left">
                            </div>
                        </div>

                        </fieldset>

                        <!-- Review Title -->
                        <div>
                            <input type="text" name="review_title" id="review_title"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Review Title*" required>
                        </div>
                        <!-- Review Message -->
                        <div>
                            <textarea name="review_message" id="review_message" rows="4"
                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Write your review here... *" required></textarea>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="flex items-center space-x-4 border-t border-default p-4">
                    <button type="submit" class="flex items-center text-white bg-brand-400 hover:bg-brand-500 font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm">
                        Submit Review </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Write Review modal -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

let altitudeData = @json($chartData);
let days = altitudeData.map(item => item.day);
let altitude = altitudeData.map(item => item.altitude);
let titles = altitudeData.map(item => item.title);

const ctx = document.getElementById('altitudeChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: days,
        datasets: [{
            label: 'Altitude (m)',
            data: altitude,
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.2)',
            fill: true,
            tension: 0.4,
            pointRadius: 4
        }]
    },
    options: {
        responsive: true,
        plugins:{
            legend:{
                display:false
            },
            tooltip:{
                callbacks:{
                    title:function(context){
                        let index = context[0].dataIndex;
                        return titles[index]; // itinerary title
                    },
                    label:function(context){
                        return "Altitude: " + context.parsed.y + " m";
                    }
                }
            }
        },
        scales:{
            x:{
                title:{
                    display:true,
                    text:'Days',
                    font: {
                        size: 16,
                        weight: 'bold'
                    }
                },
                grid: {
                    display: false   // removes vertical crossed lines
                },
                ticks: {
                    autoSkip: false
                }
            },
            y:{
                title:{
                    display:true,
                    text:'Altitude (m)',
                    font: {
                        size: 16,
                        weight: 'bold'
                    }
                },
                grid: {
                    color: "#e5e7eb"
                }
            }
        }
    }
});

</script>

<script src="{{ asset('theme-assets/js/trip-details.js') }}"></script>

<script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
<script>
    grecaptcha.ready(function () {
        function executeRecaptcha() {
            grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function (token) {
                document.getElementById('g_recaptcha_response').value = token;
                document.getElementById('g_recaptcha_response2').value = token;
                document.getElementById('g_recaptcha_response3').value = token;
                document.getElementById('g_recaptcha_response4').value = token;
            });
        }

        // Initial execution of reCAPTCHA
        executeRecaptcha();

        // Refresh the reCAPTCHA token every 100 seconds (less than 2 minutes)
        setInterval(executeRecaptcha, 900000);
    });

</script>
@stop
@section('schema')
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@graph":[
            {
                "@type": "TouristTrip",
                "name": "{{ $data->trip_title }}",
                "description": "{{ strip_tags($data->sub_title) }}",
                "url": "{{ url()->current() }}",
                "image": "{{ asset('/uploads/banners/'.$data->banner) }}",

                "offers": {
                    "@type": "Offer",
                    "price": "{{ $data->price }}",
                    "priceCurrency": "USD"
                },

                "provider": {
                    "@type": "TravelAgency",
                    "name": "Summit 8000"
                },

                "itinerary": {
                    "@type": "ItemList",
                    "itemListElement": [
                        @foreach($itinerary as $key => $value)
                        {
                            "@type": "ListItem",
                            "position": "{{ $key+1 }}",
                            "name": "Day {{ $value->days }}: {{ $value->title }}",
                            "description": "{{ strip_tags($value->content) }}"
                        }@if(!$loop->last),@endif
                        @endforeach
                    ]
                }
            },
            {
                "@type": "FAQPage",
                "mainEntity": [
                    @foreach($faqs as $key => $value)
                    {
                        "@type": "Question",
                        "name": "{{ strip_tags($value->title) }}",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "{{ strip_tags($value->content) }}"
                        }
                    }@if(!$loop->last),@endif
                    @endforeach
                ]
            }
        ]
    }
    </script>
@endsection

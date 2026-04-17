@extends('themes.default.common.master')
@section('title', $setting->site_name)
@section('meta_keyword', $setting->meta_key)
@section('meta_description', $setting->meta_description)
@section('content')

<!-- Hero Section -->
<div class="relative h-[480px] bg-cover bg-center flex items-center"
    style="background-image: url('{{asset('theme-assets/assets/trip/7000.jpg')}}');">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative container  ">
        <div class="lg:w-9/12 lg:mx-auto space-y-6 text-white">
            <h1 class="text-3xl font-extrabold leading-tight  lg:text-5xl">
                Review
            </h1>

            <p class="text-lg  ">To operate as a legal trekking agency in Nepal, a company must obtain
                approval and membership from the relevant authorities. Summit 8000 holds all required documents and
                certifications, making us a fully legal trekking agency in Nepal. Our positive client reviews reflect
                our commitment to safety, professionalism, and exceptional trekking experiences.</p>
        </div>

    </div>
</div>
<!--   Section -->

<!--   Section -->
<section class="py-16 relative pattern-white relative">

    <div class="container ">
        <div class="lg:w-9/12 lg:mx-auto space-y-6">
            <div class="space-y-8">
                <!-- Text Review Card -->
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 relative overflow-hidden">
                    <i class="fas fa-quote-right absolute top-4 right-4 text-6xl text-gray-200"></i>
                    <h3 class="font-bold text-lg mb-4">Everest Base Camp- A wonderful hiking experience</h3>
                    <div class="flex items-center text-yellow-400 text-sm mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="ml-2 text-gray-400 font-normal">Excellent</span>
                    </div>
                    <div class="text-sm text-gray-600 leading-relaxed space-y-4">
                        <p>My wife (57y old) and I (63y) did the Everest Base Camp Trek between Oct 28- Nov 8, which was
                            expected to be a dry season. Unfortunately, we suffered many rains in the first 4 days and
                            could only see the Himalayas mountains when we reached Deboche. Luckily, the rest days were
                            clear, which allowed us to enjoy the stunning mountain views.</p>
                        <p>A huge part of our successful journey goes to our guide, Vishnu Bhatta. He was a genuinely
                            kind and thoughtful person. His steady encouragement, patience, and support were
                            instrumental in helping us complete the trek comfortably and confidently.</p>
                    </div>
                    <div class="mt-8 flex items-center">
                        <div
                            class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center font-bold text-gray-500">
                            H</div>
                        <div class="ml-4">
                            <p class="text-sm font-bold">Mr. Hao Ding</p>
                            <p class="text-xs text-gray-400 uppercase">12th Nov 2025</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 relative overflow-hidden">
                    <i class="fas fa-quote-right absolute top-4 right-4 text-6xl text-gray-200"></i>
                    <h3 class="font-bold text-lg mb-4">Everest Base Camp – An Unforgettable Himalayan Journey</h3>
                    <div class="flex items-center text-yellow-400 text-sm mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="ml-2 text-gray-400 font-normal">Excellent</span>
                    </div>
                    <div class="text-sm text-gray-600 leading-relaxed space-y-4">
                        <p>My husband (52 years old) and I (50 years old) completed the Everest Base Camp Trek from
                            April 6 to April 18. The weather was mostly clear, though we experienced some light snow
                            around Dingboche. Despite the challenges, the views of Everest, Nuptse, and Ama Dablam were
                            breathtaking and made every step worthwhile.</p>
                        <p>Our guide, <b>Pemba Sherpa</b>, played a vital role in our success. He was extremely caring,
                            knowledgeable, and always attentive to our pace and well-being. His encouragement and
                            positive attitude kept our spirits high throughout the trek. </p>
                    </div>
                    <div class="mt-8 flex items-center">
                        <div
                            class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center font-bold text-gray-500">
                            S</div>
                        <div class="ml-4">
                            <p class="text-sm font-bold">Mrs. Susan Miller</p>
                            <p class="text-xs text-gray-400 uppercase">20th April 2025</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 p-6 rounded-2xl border border-gray-200 relative overflow-hidden">
                    <i class="fas fa-quote-right absolute top-4 right-4 text-6xl text-gray-200"></i>
                    <h3 class="font-bold text-lg mb-4">Everest Base Camp – A Truly Rewarding Trek</h3>
                    <div class="flex items-center text-yellow-400 text-sm mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span class="ml-2 text-gray-400 font-normal">Excellent</span>
                    </div>
                    <div class="text-sm text-gray-600 leading-relaxed space-y-4">
                        <p>I (45 years old) joined the Everest Base Camp Trek from March 22 to April 3 as a solo
                            traveler. While the trail was busy in some sections, the overall experience was incredibly
                            rewarding. The gradual ascent allowed proper acclimatization, and the mountain scenery was
                            beyond my expectations.</p>
                        <p>I am especially grateful to our guide, <b>Lakpa Tamang</b>, whose professionalism and calm
                            demeanor made the trek smooth and enjoyable. He was always ready to help and share insights
                            about local culture and the region. </p>
                    </div>
                    <div class="mt-8 flex items-center">
                        <div
                            class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center font-bold text-gray-500">
                            D</div>
                        <div class="ml-4">
                            <p class="text-sm font-bold">Mr. David Thompson</p>
                            <p class="text-xs text-gray-400 uppercase">30th October 2025</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

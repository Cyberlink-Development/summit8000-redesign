@extends('themes.default.common.master')
@section('title', $trips->trip_title)
@section('meta_keyword', $trips->meta_key)
@section('meta_description', $trips->meta_description)
@section('content')

<section class="py-16 relative">
    <div class="container ">
        <div class="lg:w-9/12 lg:mx-auto space-y-6">
            <h1 class=" text-3xl font-extrabold leading-tight text-brand-900 lg:text-4xl ">
                Customize your <em>{{ $trips->trip_title }}</em> Trip
            </h1>
            <p class="text-lg text-gray-500">Looking for a private or customized trekking experience? Whether you’re traveling with family, friends, or at your own pace, Summit 8000 creates tailor-made treks across Nepal. Share your travel dates and interests, and we’ll design a personalized itinerary just for you.</p>

            <form action="{{ route('custom-trip-post') }}"  method="post">
                @csrf
                <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response"/>
                <input type="hidden" name="type" value="customize"/>
                <input type="hidden" name="trip_id" value="{{ $trips->id }}"/>
                <div class="grid gap-4 grid-cols-2 ">
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Trip Name</label>
                        <input class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" value="{{ $trips->trip_title }}" readonly>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Full Name*" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                        <input type="email" name="email" id="namemaile"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="E-mail*" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Contact Number</label>
                        <input type="tel" name="phone" id="phone"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Mobile*" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Number of Travellers</label>
                        <input type="number" name="peoples" id="peoples"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="No of Travellers*" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Trip Start Date</label>
                        <input type="date" name="start_date" id="start_date" min="{{ date('Y-m-d') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="Start Date*" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Trip End Date</label>
                        <input type="date" name="end_date" id="end_date" min="{{ date('Y-m-d') }}"
                            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                            placeholder="End Date*" required>
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-600 mb-1">Extra Requirements</label>
                        <textarea id="message" name="message" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Message"></textarea>
                    </div>
                    <div class="col-span-2">
                        <button type="submit" class="flex items-center  text-white bg-brand-400  hover:bg-brand-500 font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm"> Send Message </button>
                    </div>
                </div>

            </form>

            <div class="space-y-6 mt-8">
                <div>
                    <div class="flex items-start gap-3">
                        <div>
                            <svg class="w-6 h-6 mt-1 text-brand-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold mb-2 text-brand-900">Emergency SOS (24/7):</h4>
                            <p class="text-sm text-brand-900">Landline: {{ $setting->phone }}</p>
                            <p class="text-sm text-brand-900">Mobile: {{ $setting->fax }}</p>
                            <p class="text-sm text-brand-900">WhatsApp: {{ $setting->usa_phone }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-start gap-3">
                        <div>
                            <svg class="w-6 h-6 mt-1 text-brand-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold mb-2 text-brand-900">Email:</h4>
                            <p class="text-sm text-brand-900">{{ $setting->email_primary }} <br> {{ $setting->email_secondary }}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-start gap-3">
                        <div>
                            <svg class="w-6 h-6 mt-1 text-brand-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold mb-2 text-brand-900">Address:</h4>
                            <p class="text-sm text-brand-900 leading-relaxed">{{ $setting->address }}</p>
                        </div>
                    </div>
                </div>

                <h4 class="font-bold m-0  text-brand-900">Follow us on Social Media
                </h4>
                <div class="flex gap-4">
                    @if($setting->youtube_link)
                        <a href="{{ $setting->youtube_link }}">
                            <img src="{{asset('theme-assets/assets/social/youtube.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->instagram_link)
                        <a href="{{ $setting->instagram_link }}">
                            <img src="{{asset('theme-assets/assets/social/instagram.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->twitter_link)
                        <a href="{{ $setting->twitter_link }}">
                            <img src="{{asset('theme-assets/assets/social/twitter.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->facebook_link)
                        <a href="{{ $setting->facebook_link }}">
                            <img src="{{asset('theme-assets/assets/social/facebook.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->linkedin_link)
                        <a href="{{ $setting->linkedin_link }}">
                            <img src="{{asset('theme-assets/assets/social/linkedIn.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->tiktok_link)
                        <a href="{{ $setting->tiktok_link }}">
                            <img src="{{asset('theme-assets/assets/social/tiktok.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

<script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
<script>
    grecaptcha.ready(function () {
        function executeRecaptcha() {
            grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function (token) {
                document.getElementById('g_recaptcha_response').value = token;
            });
        }

        // Initial execution of reCAPTCHA
        executeRecaptcha();

        // Refresh the reCAPTCHA token every 100 seconds (less than 2 minutes)
        setInterval(executeRecaptcha, 900000);
    });

</script>

@stop

<footer class="relative">
    <!-- Top Mountain Silhouette -->
    <div class="w-full overflow-hidden bg-transparent">
        <img src="{{asset('theme-assets/assets/footer/footer-mountains.svg')}}" alt="Summit8000"
            class="w-full object-cover h-auto">
    </div>

    <!-- Main Footer Section -->
    <div class="bg-summit-teal pt-12 pb-20  ">
        <div class="container mx-auto">
            <!-- Header: Logo and Newsletter -->
            <div class="flex flex-col lg:flex-row justify-between items-center mb-16 gap-8">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <img src="{{asset('theme-assets/assets/logo-white.svg')}}" alt="Summit8000 Logo Icon ">
                    </div>
                </div>
                <!-- Subscription Box -->
                <div class="w-full max-w-3xl border border-white/30 rounded-xl p-4 flex flex-col sm:flex-row items-center gap-4 bg-white/5 backdrop-blur-sm">
                    <div class="flex items-center gap-3 text-white">
                        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-sm">Get our latest articles and promotions straight to your inbox</p>
                    </div>
                    <!-- Input + Button -->
                    <form action="{{ route('subscribe') }}"  method="post">
                        <div class="flex w-full sm:w-auto">
                            @csrf
                            <input type="hidden" id="g_recaptcha_response3" name="g_recaptcha_response3"/>
                            <input type="email" name="email" placeholder="Enter your email*" required class="w-full sm:w-64 rounded-l-xl bg-white/90 px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-400" />

                            <button type="submit" class="flex items-center gap-2 rounded-r-xl bg-brand-400 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-500 hover:shadow-lg hover:shadow-brand-400/30 focus:outline-none focus:ring-2 focus:ring-brand-400">
                                Subscribe
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Custom Divider with Mountain Icon -->
            <div class="relative flex items-center mb-16 overflow-hidden">
                <div class="flex-grow border-t border-white/20"></div>
                <div class="px-4">
                    <svg width="50" height="25" viewBox="0 0 50 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30.4365 13.9618L32.978 11.0227L40.6769 20.8489H35.7366L30.4365 13.9618ZM22.9429 17.0778L19.6892 12.8615L13.5772 20.8489H8.276L19.5872 6.63546L25.4095 14.0034L22.9429 17.0778ZM33.0682 4.2164L27.9841 10.6536L19.4732 -1.14441e-05L0 24.9063L15.55 24.9418L19.7889 19.4565L22.8859 23.6075L28.0115 17.2796L34.0154 24.9063H49.0526L33.0682 4.2164Z" fill="#BEDBFF" />
                    </svg>

                </div>
                <div class="flex-grow border-t border-white/20"></div>
            </div>

            <!-- Navigation Links Grid -->
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5 justify-between text-white text-base font-medium">
                <!-- Column 1 -->
                <div>
                    <h3 class="font-bold text-lg mb-6">Popular Trips</h3>
                    <ul class="space-y-4 text-sm text-gray-300">
                        @foreach($best_sellers as $row)
                            <li>
                                <a href="{{ route('trip.tripdetail',$row->uri) }}" class="hover:text-white transition-colors">{{ $row->trip_title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Column 2 -->
                <div>
                    <h3 class="font-bold text-lg mb-6">Luxury Trips</h3>
                    <ul class="space-y-4 text-sm text-gray-300">
                        @foreach($luxury_tirps as $row)
                            <li>
                                <a href="{{ route('trip.tripdetail',$row->uri) }}" class="hover:text-white transition-colors">{{ $row->trip_title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Column 3 -->
                <div>
                    <h3 class="font-bold text-lg mb-6">Company</h3>
                    <ul class="space-y-4 text-sm text-gray-300">
                        @foreach($footer as $row)
                            <li>
                                <a href="{{route('page.posttype_detail',$row->uri)}}" class="hover:text-white transition-colors">{{ $row->post_type }}</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('reviews') }}" class="hover:text-white transition-colors">Read Reviews</a>
                        </li>
                    </ul>
                </div>
                <!-- Column 4 -->
                <div>
                    <h3 class="font-bold text-lg mb-6">Things to Know</h3>
                    <ul class="space-y-4 text-sm text-gray-300">
                        @foreach($ttk as $row)
                            <li>
                                <a href="{{ route('page.posttype_detail',$row->uri) }}" class="hover:text-white transition-colors">{{ $row->post_type }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Contact Info Column -->
                <div class="space-y-6">
                    <!-- Emergency SOS -->
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-6 h-6 text-white flex items-center justify-center overflow-hidden">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div>
                            <h4 class="font-bold mb-2 text-white">Emergency SOS (24/7):</h4>
                            <p class="text-sm text-gray-300">Landline: {{ $setting->phone }}</p>
                            <p class="text-sm text-gray-300">Mobile: {{ $setting->fax }}</p>
                            <p class="text-sm text-gray-300">WhatsApp: {{ $setting->usa_phone }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-6 h-6 text-white flex items-center justify-center overflow-hidden">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div>
                            <h4 class="font-bold mb-2 text-white">Email:</h4>
                            <p class="text-sm text-gray-300">{{ $setting->email_primary }} <br> {{ $setting->email_secondary }}</p>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-6 h-6 text-white flex items-center justify-center overflow-hidden">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h4 class="font-bold mb-2 text-white">Address:</h4>
                            <p class="text-sm text-gray-300 leading-relaxed">
                                {{ $setting->address }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Wavy Divider Transition -->
    <div class="w-full bg-summit-teal">
        <img src="{{asset('theme-assets/assets/footer/vector.svg')}}" alt="Summit8000" class="w-full object-cover">
    </div>

    <!-- White Background Associations Section -->
    <div class="bg-white py-12 px-4">
        <div class="container mx-auto flex flex-col lg:flex-row justify-between items-start gap-12">
            <!-- Payment Icons -->
            <div>
                <h4 class="text-gray-500 font-bold mb-6 text-sm">We Accept</h4>
                <div class="flex flex-wrap gap-4 items-center">
                    <img src="{{ $homebrief->image ? asset('uploads/original/'.$homebrief->image) : asset('theme-assets/assets/online-pay.webp')}}" alt="Sectigo" class="h-8">
                </div>
            </div>

            <!-- Associations -->
            <div>
                <h4 class="text-gray-500 font-bold mb-6 text-sm ">We are associated with</h4>
                <div class="flex flex-wrap gap-6 items-center">
                    <img src="{{asset('theme-assets/assets/associated/ntb.webp')}}" alt="NTB" class="h-10">
                    <img src="{{asset('theme-assets/assets/associated/taan.webp')}}" alt="TAAN" class="h-10">
                    <img src="{{asset('theme-assets/assets/associated/himalayan-rescue-association.webp')}}" alt="HRA"
                        class="h-10">
                    <img src="{{asset('theme-assets/assets/associated/keep.webp')}}" alt="KEEP" class="h-10">
                    <img src="{{asset('theme-assets/assets/associated/nepal-gov.webp')}}" alt="Nepal Gov" class="h-10">
                    <img src="{{asset('theme-assets/assets/associated/nma.webp')}}" alt="NMA" class="h-10">
                </div>
            </div>

            <!-- Social Links -->
            <div>
                <h4 class="text-gray-500 font-bold mb-6 text-sm ">Connect with us</h4>
                <div class="flex gap-4">
                    @if($setting->youtube_link)
                        <a href="{{ $setting->youtube_link }}" target="_blank">
                            <img src="{{asset('theme-assets/assets/social/youtube.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->instagram_link)
                        <a href="{{ $setting->instagram_link }}" target="_blank">
                            <img src="{{asset('theme-assets/assets/social/instagram.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->twitter_link)
                        <a href="{{ $setting->twitter_link }}" target="_blank">
                            <img src="{{asset('theme-assets/assets/social/twitter.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->facebook_link)
                        <a href="{{ $setting->facebook_link }}" target="_blank">
                            <img src="{{asset('theme-assets/assets/social/facebook.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->linkedin_link)
                        <a href="{{ $setting->linkedin_link }}" target="_blank">
                            <img src="{{asset('theme-assets/assets/social/linkedIn.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                    @if($setting->tiktok_link)
                        <a href="{{ $setting->tiktok_link }}" target="_blank">
                            <img src="{{asset('theme-assets/assets/social/tiktok.svg')}}"
                                class="w-8 h-8 rounded-full  flex items-center justify-center   hover:opacity-70 transition-opacity">
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Final Copyright Bar -->
    <div class="bg-summit-teal py-6 px-4">
        <div
            class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center text-center md:text-left gap-4">
            <p class="text-white/60 text-sm">{{ $setting->copyright_text }}</p>
            <p class="text-white/60 text-xs max-w-2xl">
                {{ $setting->flight_brief }}
            </p>
        </div>
    </div>
<style>
    .grecaptcha-badge {
        visibility: hidden !important;
    }
</style>
<script src="https://www.google.com/recaptcha/api.js?render={{env('SITE_KEY')}}"></script>
<script>
    grecaptcha.ready(function () {
        function executeRecaptcha() {
            grecaptcha.execute('<?php echo env("SITE_KEY"); ?>', {action: 'homepage'}).then(function (token) {
                document.getElementById('g_recaptcha_response3').value = token;
            });
        }

        // Initial execution of reCAPTCHA
        executeRecaptcha();

        // Refresh the reCAPTCHA token every 100 seconds (less than 2 minutes)
        setInterval(executeRecaptcha, 900000);
    });

</script>
</footer>

</body>
<!-- Include Swiper JS -->
 <script src="{{ asset('theme-assets/js/flowbite.min.js') }}"></script>
 <script src="{{ asset('theme-assets/js/swiper-bundle.min.js') }}"></script>
 <script src="{{ asset('theme-assets/js/fancybox.umd.js') }}"></script>
 <script src="{{ asset('theme-assets/js/app.js') }}"></script>
 <script src="https://kit.fontawesome.com/564ea3e674.js" crossorigin="anonymous"></script>

<script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

</script>

</html>

@extends('themes.default.common.master')
@section('title', $setting->site_name)
@section('meta_keyword', $setting->meta_key)
@section('meta_description', $setting->meta_description)
@section('content')
<script>
    const tripPrice = {{ $trip->price }};
</script>
<script src="{{asset('theme-assets/js/trip-booking.js')}}"></script>

<div class="section  py-8 px-4">
    <div class="container">
        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold tracking-tight mb-2">
                        {{ $trip->trip_title }}
                    </h1>
                    <p class="text-brand-400 text-sm font-semibold tracking-wide uppercase">
                        {{ date('M,Y') }} |
                        <span id="header-traveler-count">1</span> People
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <form action="{{ route('book-trip-success') }}" method="post">
        @csrf
            <input type="hidden" id="g_recaptcha_response" name="g_recaptcha_response"/>
            <input type="hidden" name="trip_uri" value="{{ $trip->uri }}">
            <div class="bg-white rounded-2xl border shadow-xs overflow-hidden relative">
                <div class="grid lg:grid-cols-5 gap-0">
                    <!-- Left: Form Section -->
                    <div class="lg:col-span-3 p-6 lg:p-10 space-y-10 border-r border-gray-100 lg:max-h-[calc(100vh-200px)] lg:overflow-y-auto">

                        <!-- 1. Traveller Count -->
                        <section>
                            <div class="flex items-center gap-3 mb-6">
                                <div>
                                    <span
                                        class="w-6 h-6 rounded-full text-sm flex items-center justify-center bg-brand-400 text-white">1</span>
                                </div>
                                <h3 class="text-lg font-extrabold text-slate-800">How many are travelling?</h3>
                            </div>
                            <div class="pl-9">
                                <div class="space-y-2">
                                    <label class="block text-brand-900 mb-1.5 font-bold">No of Travelers</label>
                                    <div
                                        class="flex items-center gap-2 bg-neutral-secondary-medium border border-default-medium  rounded-full   w-fit">
                                        <button type="button" onclick="changeTravelers(-1)"
                                            class="w-8 h-8 rounded-full bg-white border border-slate-300 flex items-center justify-center hover:bg-brand-400 hover:text-white transition-colors shadow-sm">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <span id="traveler-count-val"
                                            class="text-xl font-bold text-slate-800 w-8 text-center">1</span>
                                        <button type="button" onclick="changeTravelers(1)"
                                            class="w-8 h-8 rounded-full bg-white border border-slate-300 flex items-center justify-center hover:bg-brand-400 hover:text-white transition-colors shadow-sm">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Dynamic Traveler Sections -->
                        <div id="traveler-forms" class="space-y-10">
                            <!-- Traveler #1 (Lead) -->
                            <section id="traveler-1">
                                <div class="flex items-center gap-3 mb-6">
                                    <div>
                                        <span
                                            class="w-6 h-6 rounded-full text-sm flex items-center justify-center bg-brand-400 text-white">2</span>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-extrabold text-slate-800"> Lead <span
                                                class="text-brand-600">Traveller</span> #1 </h3>
                                        <p class="text-xs text-slate-500 ">This traveller will serve as the contact
                                            person for the booking.</p>
                                    </div>
                                </div>
                                <div class="pl-9 space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <input type="text" id="fullName" name="lead-fullname"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                placeholder="Full Name*" required />
                                        </div>
                                        <div>
                                            <select id="gender" name="lead-gender"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                required>
                                                <option value="" disabled selected hidden>Gender*</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input type="email" id="email" name="lead-email"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                placeholder="E-mail ID*" required />
                                        </div>
                                        <div>
                                            <select id="nationality" name="lead-nationality" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required>
                                                @include('themes.default.common.country')
                                            </select>
                                        </div>
                                        <div class="md:col-span-2">
                                            <div class="grid grid-cols-3 gap-2">
                                                <input type="date" id="DOB" name="lead-dob" max="<?= date('Y-m-d') ?>"
                                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Date of Birth*" required />
                                                <input type="text" id="mobile" name="lead-mobile" placeholder="Mobile number*"
                                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                                <input type="text" id="passport" name="lead-passport" placeholder="Passport no*"
                                                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- Flight Details -->
                        <section>
                            <div class="flex items-center gap-3 mb-6">
                                <div>
                                    <span
                                        class="w-6 h-6 rounded-full text-sm flex items-center justify-center bg-brand-400 text-white section-number">3</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-extrabold text-slate-800">Flight Details</h3>
                                </div>
                            </div>
                            <div class="pl-9 space-y-6">
                                <div class="space-y-3">
                                    <label class="flex items-center gap-3 cursor-pointer border rounded-xl p-3">
                                        <input type="radio" name="flight-status" value="booked"
                                            class="w-4 h-4 bg-neutral-secondary-medium text-brand-500 border border-default-medium focus:ring-brand-400">
                                        <span class="text-sm   text-slate-700">I have already booked my flight</span>
                                    </label>
                                    <label class="flex items-center gap-3 cursor-pointer border rounded-xl p-4">
                                        <input type="radio" name="flight-status" value="not-booked"
                                            class="w-4 h-4 bg-neutral-secondary-medium text-brand-500 border border-default-medium focus:ring-brand-400">
                                        <span class="text-sm font-semibold text-slate-700">Flight is not booked yet. I
                                            will send the flight itinerary by email once it is confirmed.</span>
                                    </label>
                                </div>
                                <div id="flight-info" class="space-y-6" style="display: none;">
                                    <!-- Arrival -->
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-brand-900 mb-1.5 font-bold">Arrival Date / Flight
                                                <p class="help-text font-normal text-xs text-slate-500">Arrival date,
                                                    time and flight number</p>
                                            </label>
                                        </div>
                                        <div class="grid grid-cols-3  gap-2">
                                            <input type="date" id="arrival_date" name="arrival_date" min="<?= date('Y-m-d') ?>"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Date of Birth*" />
                                            <input type="text" id="arrival_flight_number" name="arrival_flight_number"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                placeholder="Flight number">
                                        </div>
                                        <div class="flex flex-col ">
                                            <div>
                                                <label class="block text-brand-900 mb-1.5 font-bold">Airport Pickup ?
                                                </label>
                                            </div>
                                            <div class="flex gap-4">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" id="pickup-yes" name="pickup" value="yes"
                                                        class="w-4 h-4 text-brand-500 border   focus:ring-brand-400">
                                                    <span class="text-sm">Yes</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" id="pickup-no" name="pickup" value="no"
                                                        class="w-4 h-4 text-brand-500 border   focus:ring-brand-400">
                                                    <span class="text-sm">No</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-brand-900 mb-1.5 font-bold">Departures Date /
                                                Flight
                                                <p class="help-text font-normal text-xs text-slate-500">Arrival
                                                    Departures date, time and flight number </p>
                                            </label>
                                        </div>
                                        <div class="grid grid-cols-3  gap-2">
                                            <input type="date" id="departure_date" name="departure_date" min="<?= date('Y-m-d') ?>"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Date of Birth*" />
                                            <input type="text" id="departure_flight_number" name="departure_flight_number"
                                                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                                                placeholder="Flight number">
                                        </div>
                                        <div class="flex flex-col ">
                                            <div>
                                                <label class="block text-brand-900 mb-1.5 font-bold">Airport Dropoff ?
                                                </label>
                                            </div>
                                            <div class="flex gap-4">
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" id="dropoff-yes" name="dropoff" value="yes"
                                                        class="w-4 h-4 text-brand-500 border   focus:ring-brand-400">
                                                    <span class="text-sm">Yes</span>
                                                </label>
                                                <label class="flex items-center gap-2 cursor-pointer">
                                                    <input type="radio" id="dropoff-no" name="dropoff" value="no"
                                                        class="w-4 h-4 text-brand-500 border   focus:ring-brand-400">
                                                    <span class="text-sm">No</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- Other Info -->
                        <section>
                            <div class="flex items-center gap-3 mb-6">
                                <div>
                                    <span
                                        class="w-6 h-6 rounded-full text-sm flex items-center justify-center bg-brand-400 text-white section-number">4</span>
                                </div>
                                <div>
                                    <h3 class="text-lg font-extrabold text-slate-800">Other Information</h3>
                                </div>
                            </div>
                            <div class="pl-9 space-y-6">
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-brand-900 mb-1.5 font-bold">Travel Insurance <p
                                                class="help-text font-normal text-xs text-slate-500">Travel insurance is
                                                mandatory and must include medical, evacuation, and high-altitude
                                                coverage. </p>
                                        </label>
                                    </div>
                                    <div class="space-y-3">
                                        <label class="flex items-center gap-3 cursor-pointer">
                                            <input type="radio" id="insurance-yes" name="insurance" value="yes"
                                                class="w-4 h-4 bg-neutral-secondary-medium text-brand-500 border border-default-medium focus:ring-brand-400">
                                            <span class="text-sm font-semibold text-slate-700">I have full coverage of
                                                Insurance</span>
                                        </label>
                                        <label class="flex items-center gap-3 cursor-pointer">
                                            <input type="radio" id="insurance-no" name="insurance" value="no"
                                                class="w-4 h-4 bg-neutral-secondary-medium text-brand-500 border border-default-medium focus:ring-brand-400">
                                            <span class="text-sm font-semibold text-slate-700">Not yet bought (I will
                                                buy insurance later)</span>
                                        </label>
                                    </div>
                                    <div
                                        class="relative mb-4 text-xs text-brand-40/90  mt-2 border border-brand-/40 bg-brand-100/40  tracking-wide rounded-md px-4 py-2 ">
                                        <p>Please email us a copy of your insurance before your trek begins.</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <label for="message" class="block text-brand-900 mb-1.5 font-bold">Special
                                        Requirements</label>
                                    <textarea id="message" rows="4" name="message"
                                        placeholder="Special Requirement? Please tell us more about yourself to help you better."
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body"></textarea>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-primary font-bold text-md mb-2">How did you find
                                        Us?</label>
                                    <select id="find-us" name="find_us"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body" required>
                                        <option value="" selected disabled >Select an option</option>
                                        <option value="Google">Google</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="Yahoo">Yahoo</option>
                                        <option value="Bing">Bing</option>
                                        <option value="Trip Advisor">Trip Advisor</option>
                                        <option value="Friend">Friend</option>
                                        <option value="Client Reference">Client Reference</option>
                                        <option value="I am regular client">I am regular client</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="space-y-2 specify" style="display: none;">
                                    <input type="text" placeholder="Please Specify" name="find_us_specify"
                                        class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:outline-none focus:ring-1 focus:ring-blue-400 focus:border-blue-400 block w-full px-3 py-2.5 shadow-xs placeholder:text-body">
                                </div>
                                <div
                                    class="relative mb-4 text-xs text-brand-40/90  mt-2 border border-brand-/40 bg-brand-100/40  tracking-wide rounded-md px-4 py-2 ">
                                    <h5 class="text-sm font-bold text-brand-800 mb-1">Trip Deposit (20% Payment Now)
                                    </h5>
                                    <p class="text-xs text-brand-600">Pay 20% of the total trip cost now to confirm your
                                        booking. The remaining balance can be paid in Kathmandu by card or cash.</p>
                                </div>
                            </div>
                        </section>

                    </div>

                    <!-- Right: Pricing Sidebar -->
                    <div class="lg:col-span-2 bg-gray-50 p-6 lg:p-10 relative overflow-visible">
                        <div class="sticky top-[100px] bg-white rounded-2xl p-4 shadow">
                            <div class="space-y-4 mb-8">
                                <!-- Trip Price Row -->
                                <div class="flex justify-between items-start pb-4 border-b border-gray-300">
                                    <div>
                                        <h3 class="text-sm font-bold text-gray-800">Trip Price</h3>
                                        <p class="text-xs text-gray-600 font-medium">US $ <span
                                                id="base-price-display">{{ $trip->price }}</span> x <span
                                                id="traveler-count-summary">1</span>
                                        </p>
                                    </div>
                                    <span class="text-sm font-bold text-blue-600">US$ <span
                                            id="trip-total-display">{{ $trip->price }}</span></span>
                                </div>

                                <!-- Deposit Amount Row -->
                                <div class="flex justify-between items-start pb-4 border-b border-gray-300">
                                    <div>
                                        <h3 class="text-sm font-bold text-gray-800">Deposit Amount</h3>
                                        <p class="text-xs text-gray-600 font-medium">20% of total price</p>
                                    </div>
                                    <span class="text-sm font-bold text-blue-600">US$ <span
                                            id="deposit-amount">{{ number_format($trip->price * 0.2, 2) }}</span></span>
                                </div>

                                <!-- Bank Charge Row -->
                                <div class="flex justify-between items-start pb-4 border-b border-gray-300">
                                    <div>
                                        <h3 class="text-sm font-bold text-gray-800">Bank Charge</h3>
                                        <p class="text-xs text-gray-600 font-medium">3.5% Card Processing Fee</p>
                                    </div>
                                    <span class="text-sm font-bold text-blue-600">US$ <span
                                            id="bank-charge">{{ number_format(($trip->price * 0.2) * 0.035, 2) }}</span></span>
                                </div>

                                <!-- Total Payable Now Row -->
                                <div class="flex justify-between items-center pt-4 bg-blue-100 rounded-lg px-4 py-3">
                                    <h3 class="text-sm font-extrabold text-gray-800">Total Payable Now</h3>
                                    <span class="text-lg font-extrabold text-blue-600">US$ <span
                                            id="total-payable">{{ number_format(($trip->price * 0.2) + (($trip->price * 0.2) * 0.035), 2) }}</span></span>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <label class="flex items-start gap-3 cursor-pointer group">
                                    <input type="checkbox" name="agree_terms" required
                                        class="mt-1 w-4 h-4 bg-gray-200 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                    <span
                                        class="text-xs text-gray-600 group-hover:text-gray-800 transition-colors leading-relaxed">
                                        I agree to the <a class="text-blue-600 hover:underline font-semibold">Terms
                                            and Conditions</a> and the <a
                                            class="text-blue-600 hover:underline font-semibold">Privacy Policy</a> of
                                        Summit8000.
                                    </span>
                                </label>

                                <button type="submit"
                                    class="w-full py-3 bg-blue-500 text-white rounded-xl font-bold hover:bg-blue-600 active:scale-95 transition-all shadow-lg flex items-center justify-center gap-2">
                                    <i class="fas fa-credit-card"></i>
                                    Proceed to Payment
                                </button>

                                <div class="text-center space-y-3">
                                    <p class="text-xs text-gray-500 italic">This is a secure and SSL encrypted payment. Your
                                        card details are safe!</p>
                                    <div class="flex flex-wrap justify-center gap-3">
                                        <span class="text-xs font-semibold text-gray-600">Visa</span>
                                        <span class="text-xs font-semibold text-gray-600">Mastercard</span>
                                        <span class="text-xs font-semibold text-gray-600">Discover</span>
                                        <span class="text-xs font-semibold text-gray-600">American Express</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

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

@extends('themes.default.common.master')
@section('title', $query)
@section('content')

    <!-- Hero Section -->
    <div class="relative h-[480px] bg-cover bg-center flex items-center lazy-image "
        style="background-image: url('{{ asset('theme-assets/assets/trip/8000.jpg') }}');" loading="lazy">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative container  ">
            <div class="max-w-2xl text-white">
                <h1 class="text-5xl font-bold mb-6">Search Result of</h1>
                <h2 class="text-4xl font-bold mb-6"><em>{{ ucfirst($query) }}</em></h2>
            </div>
        </div>
    </div>

    <!-- Product Grid Section -->
    <section class="py-16  pattern-white relative">
        @if($data->count() > 0)
            <div class="container">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($data as $row)
                        <a href="{{ route('trip.tripdetail',$row->uri) }}" class="block bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 transition-transform hover:-translate-y-1">
                            <div class="relative h-64 overflow-hidden">
                                <img src="{{ $row->thumbnail ? asset('uploads/thumbnails/'.$row->thumbnail)  : asset('theme-assets/assets/trip/1.jpg')}}" alt="{{ $row->thumbnail_alt }}" loading="lazy" class="lazy-image w-full h-full object-cover">
                            </div>
                            <div class="p-5">
                                <div class="flex items-center gap-1 mb-2">
                                    <i class="fa fa-star text-yellow-400 text-xs"></i>
                                    <i class="fa fa-star text-yellow-400 text-xs"></i>
                                    <i class="fa fa-star text-yellow-400 text-xs"></i>
                                    <i class="fa fa-star text-yellow-400 text-xs"></i>
                                    <i class="fa fa-star-half text-yellow-400 text-xs"></i>
                                    <span class="text-slate-400 text-xs ml-1">1547 reviews</span>
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 mb-4">{{ $row->trip_title }}</h3>
                                <div class="flex justify-between items-center text-xs text-slate-500 mb-6 pb-6 border-b border-slate-100">
                                    <span class="flex items-center gap-1 text-xs">
                                        <img src="{{asset('theme-assets/assets/icons/map-point.svg')}}" class="h-4"> {{ trip_destination_title($row->id) }}
                                    </span>
                                    <span class="flex items-center gap-1"><img src="{{asset('theme-assets/assets/icons/clock.svg')}}" class="h-4">
                                        {{ $row->duration }}
                                    </span>
                                    <span class="flex items-center gap-1"><img src="{{asset('theme-assets/assets/icons/summer.svg')}}" class="h-4">
                                        {{ $row->best_season }}
                                    </span>
                                </div>
                                <div class="flex justify-between items-end">
                                    <div>
                                        <p class="text-sm text-slate-400 font-medium"></p>
                                        <p class="text-xl font-bold text-slate-900">US$ {{ $row->price }}</p>
                                    </div>
                                    <button class="text-white bg-brand-400 hover:bg-brand-500  font-medium rounded-xl text-sm px-5 py-3 transition shadow-sm">
                                        More Info
                                    </button>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            <div class="flex items-center justify-center h-64">
                <p class="text-center text-xl text-slate-500 font-medium">Trip Not Found for {{ $query }} ! </p>
            </div>
        @endif
    </section>

@stop

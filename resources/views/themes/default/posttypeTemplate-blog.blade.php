@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

    <section class="py-14">
        <div class="container">
            <!-- Blog Grid -->
            <h1 class="text-3xl font-extrabold leading-tight text-brand-900 lg:text-4xl mb-2">
                {{$data->post_type}}
            </h1>
            <div class="prose max-w-none">
                {!! $data->content !!}
            </div>
            @php
                $featuredPost = $posts->first();
            @endphp
            <div class="grid grid-rows gap-8 mt-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                    <!-- Large Featured Card (Left) -->
                    @if($featuredPost)
                    <a href="{{ route('page.pagedetail', $featuredPost->uri) }}"
                        class="lg:col-span-7 relative group cursor-pointer overflow-hidden rounded-2xl shadow-lg ">
                        <img src="{{$featuredPost->page_thumbnail ? asset('uploads/medium/' . $featuredPost->page_thumbnail) : asset('theme-assets/assets/trip/1.jpg')}}"
                            alt="{{ $featuredPost->post_title }}" loading="lazy"
                            class="lazy-image w-full h-[500px] lg:h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/60 transition-colors duration-500">
                        </div>

                        <!-- Bottom Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent flex flex-col justify-end p-8 text-white">
                            <p class="text-sm font-medium mb-2 opacity-90">{{ $featuredPost->sub_title }}</p>
                            <h2 class="text-3xl font-bold leading-tight">{{ $featuredPost->post_title }}</h2>
                        </div>
                    </a>
                    @endif

                    <!-- Smaller Cards (Right) -->
                    <div class="lg:col-span-5 flex flex-col justify-between gap-8">
                        <!-- Post 1 -->
                        @foreach($posts->skip(1)->take(3) as $post)
                            <a href="{{ route('page.pagedetail', $post->uri) }}"
                                class="flex  flex-row gap-6 group cursor-pointer">
                                <div class="shrink-0 overflow-hidden rounded-2xl  w-48 h-32 shadow-md">
                                    <img src="{{$post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/trip/2.jpg')}}"
                                        alt="{{ $post->post_title }}" loading="lazy"
                                        class="lazy-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                </div>
                                <div class="flex flex-col justify-center">
                                    <p class="text-sm text-gray-500 mb-2 font-medium">{{ $post->sub_title }}</p>
                                    <h4
                                        class="text-xl font-bold text-black leading-snug group-hover:text-brand-400 transition-colors">
                                        {{ $post->post_title }}
                                    </h4>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-8">
                    <!-- Post   -->
                    @foreach($posts->skip(4) as $post)
                        <a href="{{ route('page.pagedetail', $post->uri) }}" class="flex  flex-col gap-6 group cursor-pointer">
                            <div class="shrink-0 overflow-hidden rounded-2xl  w-full h-64 shadow-md">
                                <img src="{{$post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/trip/8000.jpg')}}"
                                    alt="{{ $post->post_title }}" loading="lazy"
                                    class="lazy-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                            </div>
                            <div class="flex flex-col justify-center">
                                <p class="text-sm text-gray-500 mb-2 font-medium">{{ $post->sub_title }}</p>
                                <h4
                                    class="text-xl font-bold text-black leading-snug group-hover:text-brand-400 transition-colors">
                                    {{ $post->post_title }}
                                </h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            {!! $posts->links('themes.default.common.pagination') !!}
        </div>

    </section>

@endsection

@section('schema')
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "TouristTrip",
        "name": "{{ $data->post_type }}",
        "description": "{{ strip_tags($data->associated_title) }}",
        "url": "{{ url()->current() }}",
        "provider": {
            "@type": "TravelAgency",
            "name": "Summit 8000"
        }
        }
    </script>
@endsection

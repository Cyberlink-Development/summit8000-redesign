@extends('themes.default.common.master')
@section('title', $data->post_title)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->page_thumbnail)
@section('content')
<section class="  relative pattern-white">
    <div class="container">
        <div class="lg:w-9/12 lg:mx-auto">
            <div class="page-title pt-8 pb-6">
                <p class="text-brand-500 mb-0 font-medium">{{ $data->sub_title }}</p>
                <h1 class="text-4xl">{{ $data->post_title }}</h1>
            </div>
            <div class="team-list space-y-2 mb-0 text-left">
                <div class="item">
                    <div class="grid grid-cols-12 gap-6">
                        <div class="col-span-3">
                            <div class="image-slot rounded-md before:pt-[120%] shadow shadow-primary/20">
                                <img alt="{{ $data->post_title }}" width="300" height="300" class="rounded" src="{{$data->page_thumbnail ? asset('uploads/medium/' . $data->page_thumbnail) : asset('theme-assets/assets/trip/8000.jpg')}}" style="color: transparent;">
                            </div>
                        </div>
                        <div class="col-span-9">
                            <article class="space-y-3 mb-5">
                                <div class="prose max-w-none">
                                    {!! $data->post_content !!}
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<aside aria-label="Related articles" class="pt-4 pb-8 lg:pb-24 lg:pt-8 bg-gray-50  ">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 text-2xl font-bold text-gray-900 ">Other Team Members</h2>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Post   -->
            @foreach($related as $post)
                <a href="{{ route('page.teamdetail', $post->uri) }}" class="flex  flex-col gap-6 group cursor-pointer">
                    <div class="shrink-0 overflow-hidden rounded-2xl  w-full h-64 shadow-md">
                        <img src="{{$post->page_thumbnail ? asset('uploads/medium/'.$post->page_thumbnail) : asset('theme-assets/assets/trip/8000.jpg')}}" alt="{{ $post->post_title }}" loading="lazy" class="lazy-image w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">

                    </div>
                    <div class="flex flex-col justify-center">
                        <p class="text-sm text-gray-500 mb-2 font-medium">{{ $post->sub_title }}</p>
                        <h1 class="text-xl font-bold text-black leading-snug group-hover:text-sky-600 transition-colors">{{ $post->post_title }}</h1>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</aside>
@endsection

@section('schema')
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "TouristTrip",
        "name": "{{ $data->post_title }}",
        "description": "{{ strip_tags($data->post_excerpt) }}",
        "url": "{{ url()->current() }}",
        "provider": {
            "@type": "TravelAgency",
            "name": "Summit 8000"
        }
        }
    </script>
@endsection

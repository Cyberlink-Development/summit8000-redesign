@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

    <!-- Hero Section -->
    <div class="relative h-[480px] bg-cover bg-center flex items-center lazy-image" loading="lazy"
        style="background-image: url('{{$data->banner ? asset('uploads/original/' . $data->banner) : asset('theme-assets/assets/trip/8000.jpg')}}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative container ">
            <div class="space-y-6 text-white">
                <h1 class="text-3xl font-extrabold leading-tight  lg:text-5xl">
                    {{$data->post_type}}
                </h1>
            </div>
        </div>
    </div>
    <!--   Section -->
    <section class="py-16 relative  pattern-white relative">
        <div class="container ">
            <div class="lg:w-10/12 lg:mx-auto space-y-8">
                <h1 class=" text-3xl font-extrabold leading-tight text-brand-900 lg:text-4xl ">
                    {{$data->associated_title}}
                </h1>
                <div class="prose max-w-none">
                    {!! $data->content !!}
                </div>


                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                    <!-- Certificate 1 -->
                    @foreach($posts as $post)
                        <a href="{{$post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/doc/1.jpg')}}"
                            data-fancybox="certificates" data-caption="{{ $post->post_title }}"
                            class="group relative block document-card rounded-xl overflow-hidden bg-white border border-gray-200">
                            <div class="h-80 bg-gray-100 p-3">
                                <img src="{{$post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/doc/1.jpg')}}"
                                    alt="{{ $post->post_title }}" class="w-full h-full object-contain rounded-xl">
                            </div>
                            <div class="mt-3 p-4">
                                <h3 class="text-lg font-bold">{{ $post->post_title }}</h3>
                            </div>
                        </a>
                    @endforeach
                </div>
                {!! $posts->links('themes.default.common.pagination') !!}
            </div>
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

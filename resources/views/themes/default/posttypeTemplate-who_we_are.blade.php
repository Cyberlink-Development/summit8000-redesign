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
        <div class="relative container  ">
            <div class="space-y-6 text-white">
                <h1 class="text-3xl font-extrabold leading-tight  lg:text-5xl">
                    {{$data->post_type}}
                </h1>
            </div>
        </div>
    </div>

    <!--   Section -->
    <section class="py-16 pattern-white relative">

        <div class="container ">
            <article class="max-w-5xl mx-auto format format-sm sm:format-base lg:format-lg format-blue ">

                <h2 class=" text-3xl font-extrabold leading-tight text-brand-900    lg:text-4xl no-format ">
                    {{$data->associated_title}}
                </h2>
                <div class="prose max-w-none">
                    {!! $data->content !!}
                </div>

                @foreach($posts as $post)
                    <h3>{{ $loop->iteration }}. {{ $post->post_title }} </h3>
                    <div class="prose max-w-none">
                        {!! $post->post_content !!}
                    </div>
                    <figure><img
                            src="{{$post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/trip/8000.jpg')}}"
                            alt="{{ $post->post_title }}" class="rounded-2xl">
                        <figcaption>
                            {{ $post->post_title }}
                        </figcaption>
                    </figure>
                @endforeach

            </article>
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

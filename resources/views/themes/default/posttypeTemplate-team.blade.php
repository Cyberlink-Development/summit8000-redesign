@extends('themes.default.common.master')
@section('title', $data->post_type)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('thumbnail', $data->banner)
@section('content')

    <!-- Hero Section -->
    <div class="relative h-[480px] bg-cover bg-center flex items-center  lazy-image" loading="lazy"
        style="background-image: url('{{$data->banner ? asset('uploads/original/' . $data->banner) : asset('theme-assets/assets/trip/nepal-tours.jpg')}}');">
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

    <!--   Section -->
    <section class="py-16 relative pattern-white relative">

        <div class="container ">
            <article class="max-w-5xl mx-auto format format-sm sm:format-base lg:format-lg format-blue ">

                <h2 class=" text-3xl font-extrabold leading-tight text-brand-900    lg:text-4xl no-format ">
                    {{$data->associated_title}}
                </h2>
                <div class="prose max-w-none">
                    {!! $data->content !!}
                </div>
            </article>
            <div class="lg:w-10/12 lg:mx-auto space-y-8">
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
                    <!-- Team Member 1: Cody Fisher -->
                    @foreach($posts as $post)
                        <a href="{{ route('page.teamdetail', $post->uri) }}"
                            class="group relative block document-card rounded-xl overflow-hidden bg-white border border-gray-200 flex flex-col">
                            <img src="{{$post->page_thumbnail ? asset('uploads/medium/' . $post->page_thumbnail) : asset('theme-assets/assets/trip/8000.jpg')}}"
                                alt="{{ $post->post_title }}" loading="lazy"
                                class="lazy-image w-full h-5/6 object-cover rounded-3xl">
                            <div class="bg-white p-6 text-center -mt-10 mx-4 relative z-10 rounded-2xl shadow-sm">
                                <h3 class="text-xl font-bold text-gray-900">{{ $post->post_title }}</h3>
                                <p class="text-gray-500 mt-1">{{ $post->sub_title }}</p>
                            </div>
                        </a>
                        <!-- <div class="flex flex-col">
                                <img src="{{$post->page_thumbnail ? asset('uploads/medium/'.$post->page_thumbnail) : asset('theme-assets/assets/trip/8000.jpg')}}" alt="{{ $post->post_title }}" loading="lazy" class="lazy-image w-full h-5/6 object-cover rounded-3xl">
                                <div class="bg-white p-6 text-center -mt-10 mx-4 relative z-10 rounded-2xl shadow-sm">
                                    <h3 class="text-xl font-bold text-gray-900">{{ $post->post_title }}</h3>
                                    <p class="text-gray-500 mt-1">{{ $post->sub_title }}</p>
                                </div>
                            </div> -->
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

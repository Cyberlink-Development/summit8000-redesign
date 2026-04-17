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

<main class="antialiased p-4">
    <div class="flex justify-between">
        <article class="mx-auto w-full format format-sm sm:format-base lg:format-lg format-blue dark:format-invert container ">
            <!-- Content -->
            <div class="prose max-w-none">
                {!! $data->content !!}
            </div>
        </article>
    </div>
</main>

@endsection

@extends('themes.default.common.master')
@section('title', $setting->site_name)
@section('meta_keyword', $setting->meta_key)
@section('meta_description', $setting->meta_description)

@section('content')

<div style="
    min-height:60vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f8f9fa;
">

    <div style="
        width:100%;
        max-width:650px;
        margin:0 auto;
    ">

        <div style="
            background:#ffffff;
            padding:60px 50px;
            border-radius:14px;
            box-shadow:0 15px 40px rgba(0,0,0,0.08);
            text-align:center;
        ">

            <!-- Icon -->
            <div style="margin-bottom:25px;">
                <div style="
                    width:90px;
                    height:90px;
                    margin:0 auto;
                    border-radius:50%;
                    background:#eaf8f0;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                ">
                    <i class="fa fa-check fa-2x" style="color:#28a745;"></i>
                </div>
            </div>

            <!-- Heading -->
            <h2 style="color:#28a745; font-weight:700; margin-bottom:10px;">
                {{ $heading }}
            </h2>

            <!-- Name -->
            <p style="font-size:18px; margin:0;">
                Dear <strong>{{ $name }}</strong>,
            </p>

            <!-- Message -->
            <p style="color:#666; margin-top:10px;">
                {{ $information }}
            </p>

            <!-- Divider -->
            <div style="
                width:60px;
                height:3px;
                background:#28a745;
                margin:30px auto;
                border-radius:10px;
            "></div>

            <!-- Footer -->
            <p style="margin:0 0 25px 0;">
                Best Wishes,<br>
                <strong>Summit8000 </strong>
            </p>

            <!-- Button -->
            <a href="{{ url('/') }}" style=" display:inline-block; padding:12px 40px; background:#0ea5e9;
                   color:#fff;
                   border-radius:30px;
                   text-decoration:none;
                   font-weight:500;
               ">
                Return to Home
            </a>

        </div>

    </div>

</div>

@endsection

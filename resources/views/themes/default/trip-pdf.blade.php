<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $trip->trip_title }}</title>
        <style>

            @page {
                margin: 130px 40px 150px 40px;
            }

            body {
                font-family: DejaVu Sans, sans-serif;
                font-size: 12px;
                color: #333;
            }

            /* HEADER */
            header {
                position: fixed;
                top: -110px;
                left: 0;
                right: 0;
                height: 130px;
                text-align: center;
            }

            /* FOOTER */
            footer {
                position: fixed;
                bottom: -130px;
                left: 0;
                right: 0;
                height: 150px;
            }

            /* CONTENT */
            .container {
                width: 100%;
            }

            .row {
                width: 100%;
                margin-bottom: 20px;
            }

            .col-left {
                width: 48%;
                float: left;
            }

            .col-right {
                width: 48%;
                float: right;
            }

            h1 {
                font-size: 22px;
                margin-bottom: 5px;
            }

            h3 {
                margin-top: 15px;
                font-size: 16px;
                border-bottom: 1px solid #cccccc;
                padding-bottom: 5px;
            }

            .facts-table {
                width: 100%;
                border-collapse: collapse;
            }

            .facts-table td {
                padding: 6px;
                border-bottom: 1px solid #eee;
            }

            .price-box {
                background: #f3f3f3;
                padding: 10px;
                margin-top: 10px;
                font-weight: bold;
                font-size: 14px;
            }

            .clear {
                clear: both;
            }

            img {
                max-width: 100%;
            }

        </style>

    </head>
    <body>

        <!-- HEADER (repeats on every page) -->
        <header>
            <div style="text-align:center;">
                <img src="{{ public_path('theme-assets/logo.svg') }}"
                    style="height:45px; display:block; margin:0 auto;">
                <div style="font-size:11px; margin-top:5px;">
                    <a href="https://summit8000.com/" style="color:#333; text-decoration:none;" target="_blank">
                        https://summit8000.com/
                    </a>
                </div>

            </div>
        </header>

        <!-- FOOTER (repeats on every page) -->
        <footer>
            <div>
                <img src="{{ public_path('theme-assets/assets/footer/footer-mountains.png') }}"
                    style="width:100%; height:45px;">
            </div>
            <div style="background-color:#18597b ; padding:10px 20px;">
                <table width="100%">
                    <tr>
                        <td width="50%" style="text-align:left;">
                            <img src="{{ public_path('theme-assets/assets/logo-white.svg') }}"
                                style="height:28px;">
                        </td>
                        <td width="50%" style="text-align:right; color:#ffffff; font-size:10px;">
                            Copyright © {{ date('Y') }}, Summit 8000.
                            All Rights Reserved.
                        </td>
                    </tr>
                </table>
            </div>
        </footer>

        <!-- DomPDF Fix: duplicate footer to force it on page 1 -->
        <div style="position:fixed; bottom:-130px; left:0; right:0; height:150px;">
            <div>
                <img src="{{ public_path('theme-assets/assets/footer/footer-mountains.png') }}"
                    style="width:100%; height:45px;">
            </div>
            <div style="background-color:#1f5f78; padding:10px 20px;">
                <table width="100%">
                    <tr>
                        <td width="50%" style="text-align:left;">
                            <img src="{{ public_path('theme-assets/assets/logo-white.svg') }}"
                                style="height:28px;">
                        </td>
                        <td width="50%" style="text-align:right; color:#ffffff; font-size:10px;">
                            Copyright © {{ date('Y') }}, Summit 8000.
                            All Rights Reserved.
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="container">

            <!-- Top Section -->
            <div class="row">

                <!-- LEFT: Image -->
                <div class="col-left">
                    @if($trip->banner)
                        <!--<img src="{{ public_path('uploads/banners/'.$trip->banner) }}" style="width:100%; max-height:350px;">-->
                    @endif
                    @if($trip->thumbnail)
                        <!--<img src="{{ public_path('uploads/thumbnails/'.$trip->thumbnail) }}" style="width:100%; max-height:350px;">-->
                    @endif
                </div>

                <!-- RIGHT: Title + Quick Facts -->
                <div class="col-right">
                    <h1>{{ $trip->trip_title }}</h1>
                    <p><strong>{{ $trip->sub_title }}</strong></p>

                    <h3>Quick Facts</h3>
                    <table class="facts-table">
                        <tr>
                            <td><strong>Duration:</strong></td>
                            <td>{{ $trip->duration }}</td>
                        </tr>
                        <tr>
                            <td><strong>Max Altitude:</strong></td>
                            <td>{{ $trip->max_altitude }}</td>
                        </tr>
                        <tr>
                            <td><strong>Best Season:</strong></td>
                            <td>{{ $trip->best_season }}</td>
                        </tr>
                        <tr>
                            <td><strong>Group Size:</strong></td>
                            <td>{{ $trip->group_size }}</td>
                        </tr>
                        <tr>
                            <td><strong>Accommodation:</strong></td>
                            <td>{{ $trip->accommodation }}</td>
                        </tr>
                        <tr>
                            <td><strong>Route:</strong></td>
                            <td>{{ $trip->route }}</td>
                        </tr>
                        <tr>
                            <td><strong>Difficulty:</strong></td>
                            <td>{{ grade_message_trek($trip->trip_grade)}}</td>
                        </tr>
                    </table>
                </div>

                <div class="clear"></div>
            </div>

            <!-- Trip Overview -->
            <div class="row">
                <h3>Trip Overview</h3>
                {!! $trip->trip_content !!}
            </div>

            <!--@if($photos->count() > 0)-->
            <!--    <div class="row">-->
            <!--        <h3 style="margin-bottom:10px;">Trip Photos</h3>-->

            <!--        @foreach($photos as $key => $row)-->

            <!--            @if($key % 2 == 0)-->
            <!--                <div style="width:100%; clear:both;">-->
            <!--            @endif-->

            <!--            <div style="width:48%; float:left; margin-bottom:10px;">-->
            <!--                <img src="{{ public_path('/uploads/original/'.$row->thumbnail) }}"-->
            <!--                    style="width:100%; height:180px;">-->
            <!--            </div>-->

            <!--            @if($key % 2 == 1)-->
            <!--                </div>-->
            <!--            @endif-->

            <!--        @endforeach-->

            <!--        <div style="clear:both;"></div>-->
            <!--    </div>-->
            <!--@endif-->

            @if($itinerary->count() > 0)
                <div class="row" style="margin-bottom:10px;">
                    <h3 style="margin-bottom:8px;">Detailed Itinerary</h3>

                    @foreach($itinerary as $value)

                        <div style="">

                            <!-- Day Title -->
                            <div style="
                                font-weight:bold;
                                font-size:12px;
                                color:#1e5c73;
                            ">
                                <em>Day {{ $value->days }}</em>: {{ $value->title }}
                            </div>

                            <!-- Content -->
                            <div style="
                                font-size:12px;
                                line-height:1.5;
                            ">
                                {!! $value->content !!}
                            </div>

                            @if($value->extra_info)
                                <div style="
                                    margin-top:4px;
                                    font-size:11px;
                                    color:#555;
                                ">
                                    <strong>Note:</strong> {{ $value->extra_info }}
                                </div>
                            @endif
                            @if($value->max_altitude || $value->duration)
                                <div>
                                    @if($value->max_altitude || $value->duration)
                                        <div>
                                            <span>Accommodation:</span>
                                            <span>{{ $value->max_altitude }}</span>
                                        </div>
                                    @endif
                                    @if($value->max_altitude || $value->duration)
                                        <div>
                                            <span>Meals:</span>
                                            <span>{{ $value->duration }}</span>
                                        </div>
                                    @endif
                                </div>
                            @endif

                        </div>

                    @endforeach
                </div>
            @endif


            <!-- Trip Highlights -->
            @if($trip->trip_highlight)
                <div class="row">
                    <h3>Gears Lists</h3>
                    {!! $trip->trip_highlight !!}
                </div>
            @endif

            @if($cost_includes->count() > 0)
                <div class="row" style="margin-bottom:10px;">
                    <h3 style="margin-bottom:8px;">Cost Includes</h3>

                    @foreach($cost_includes as $value)

                        <div style="">

                            <!-- Day Title -->
                            <div >
                                <em><strong>{{ $loop->iteration }}.</strong></em>  {{ $value->title }}
                            </div>

                        </div>

                    @endforeach
                </div>
            @endif
            @if($cost_excludes->count() > 0)
                <div class="row" style="margin-bottom:10px;">
                    <h3 style="margin-bottom:8px;">Cost Excludes</h3>
                    @foreach($cost_excludes as $value)
                        <div>
                            <div>
                                <em><strong>{{ $loop->iteration }}.</strong></em>  {{ $value->title }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            <!-- Map -->
            @if($trip->trip_map)
                <div class="row">
                    <h3>Route Map</h3>
                    <!--<img src="{{ public_path('uploads/original/'.$trip->trip_map) }}" style="width:50%; height:300px;">-->
                </div>
            @endif

        </div>

    </body>
</html>

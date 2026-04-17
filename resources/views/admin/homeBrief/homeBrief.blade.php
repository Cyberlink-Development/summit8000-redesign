@extends('admin.master')
@section('title', 'Home Brief')
@section('breadcrumb')
@endsection
@section('content')
    <form action="{{ route('home_brief.update', $data->id) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        <div class="col-md-12">
            <!-- Input Fields -->
            @method('PUT')
            @csrf
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Home Brief Section</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Title in banner</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="" name="title" class="form-control" placeholder=""
                                    value="{{$data->title}}">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Brief</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <textarea class="form-control" id="contentEditor5" name="brief"
                                    rows="3">{{$data->brief}}</textarea>
                            </div>
                        </div>
                    </div> -->
                    {{-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Picture 1</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                @if($data->thumbnail)
                                <span class="thumbnail{{$data->id}}">
                                    <a href="{{$data->id}}" id="remove_thumbnail"><span>X</span></a>
                                    <a href="{{asset('uploads/original/'.$data->thumbnail)}}" target="_blank"><img
                                            src="{{asset('uploads/original/'.$data->thumbnail)}}" name="thumbnail"
                                            width="150" /></a>
                                    <hr>
                                </span>
                                @endif
                                <input type="file" name="thumbnail" class="form-control" />
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">We Accept Image of Footer </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="file" name="image" id="" class="form-control">
                                <label>Image of Dimension 882*84 pixels</label> <br>
                                @if($data->image)
                                    <span class="image{{$data->id}}">
                                        <a href="{{$data->id}}" id="remove_image"><span>X</span></a>
                                        <a href="{{asset('uploads/original/'.$data->image)}}" target="_blank"><img
                                                src="{{asset('uploads/original/'.$data->image)}}" name="image"
                                                width="150" /></a>
                                        <hr>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Picture 3</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                @if($data->pic)
                                <span class="pic{{$data->id}}">
                                    <a href="{{$data->id}}" id="remove_pic"><span>X</span></a>
                                    <a href="{{asset('uploads/original/'.$data->pic)}}" target="_blank"><img
                                            src="{{asset('uploads/original/'.$data->pic)}}" name="pic" width="150" /></a>
                                    <hr>
                                </span>
                                @endif
                                <input type="file" name="pic" id="" class="form-control">
                            </div>
                        </div>
                    </div> --}}
                    {{-- @if($data->video != '' OR $data->video != null)
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="banner"></label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <a href="{{ $data->id }}" id="video">X</a>
                                <span class="video{{$data->id}}">
                                    <video uk-video uk-cover preload="auto" width="100%" height="auto" loop playsinline
                                        autoplay muted data-setup='{"fluid": true,"controls": false,"loop":true}'>
                                        <source src="{{asset('uploads/original/'.$data->video)}}" type="video/mp4" muted>
                                    </video>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="banner">Video</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="file" class="form-control" name="video" />
                                <br> ( Video Size: Less than 20MB )
                            </div>
                        </div>
                    </div> --}}

                    <!-- <div class="form-group">
                        <label class="col-lg-2 control-label" for="banner">Video</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="video" value="{{$data->video}}"
                                    placeholder="-KxR0JY2vJ0" />
                                <br> ( Video ID: https://youtu.be/ <b>-KxR0JY2vJ0</b> )
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for=""></label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script type="text/javascript">
        (function ($) {
            $('#remove_thumbnail').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route("pic1-destroy", ["id" => ':id']) }}';

                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'delete',
                        url: url,
                        data: { _token: csrf },
                        success: function (data) {
                            $('.thumbnail' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
        (function ($) {
            $('#remove_image').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route("pic2-destroy", ["id" => ':id']) }}';

                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'delete',
                        url: url,
                        data: { _token: csrf },
                        success: function (data) {
                            $('.image' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
        (function ($) {
            $('#remove_pic').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route("pic3-destroy", ["id" => ':id']) }}';

                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'delete',
                        url: url,
                        data: { _token: csrf },
                        success: function (data) {
                            $('.pic' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
        (function ($) {
            $('#video').on('click', function (e) {
                e.preventDefault();
                if (confirm('Are you sure to delete??')) {
                    var csrf = $('meta[name="csrf-token"]').attr('content');
                    var id = $(this).attr('href');
                    var url = '{{ route("video_delete", ["id" => ':id']) }}';

                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'delete',
                        url: url,
                        data: { _token: csrf },
                        success: function (data) {
                            $('.video' + id).remove();
                        },
                        error: function (data) {
                            alert('Error occurred!');
                        }
                    });
                }
            });

        }(jQuery));
    </script>:
@endsection

@extends('admin.master')
@section('title', 'Post Category')
@section('breadcrumb')
    <a href="{{ route('trip-review')}}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{route('edit-trip-review', $data->id)}}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$data->id}}">
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Trip Review</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Trip</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <select class="form-control" name="trip_id" required>
                                    <option value="" selected disabled>--Please select trip--</option>
                                    @foreach($trip as $value)
                                        @if($data->trips)
                                            <option @if($value->id == $data->trips->id) selected @endif value="{{$value->id}}">
                                                {{$value->trip_title}}</option>
                                        @else
                                            <option value="{{$value->id}}">{{$value->trip_title}}</option>
                                        @endif
                                    @endforeach

                                </select>
                                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="category" name="full_name" class="form-control"
                                    value="{{$data->full_name}}" required/>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="country" class="form-control" value="{{$data->country}}" />
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="email" class="form-control" value="{{ $data->email }}" required />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Contact</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="contact" class="form-control" value="{{ $data->contact }}" />
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Review Title</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text"  name="title" class="form-control"
                                    value="{{$data->title}}" />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Message</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <div class="bs-component">
                                    <textarea class="textarea form-control" id="textArea3" name="message" rows="9"
                                        autocomplete="off">
              {!! $data->message !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="admin-form">
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
                        </div>
                    </div>
                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>
                <!-- <div class="sid_bvijay mb10">
                    <h4>Image </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            <input type="file" name="photo" />
                        </div>
                        <small>(width: 1000px height: 1000px)</small>
                        @if($data->image)
                            <img src="{{url('uploads/reviews/' . $data->image)}}" width="150">
                        @endif
                    </div>
                </div> -->

            </div>

        </div>
    </form>
@endsection

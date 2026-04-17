@extends('admin.master')
@section('title', 'Post Category')
@section('breadcrumb')
    <a href="{{ route('trip-review')}}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ route('post-trip-review') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Create Trip Review</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Trip</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <select class="form-control" name="trip_id" required>
                                    <option value="" selected disabled>Please Select Trip</option>
                                    @foreach($trip as $value)
                                        <option value="{{$value->id}}">{{$value->trip_title}}</option>
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
                                <input type="text" id="category" name="full_name" class="form-control" placeholder="" required/>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Country</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="country" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="email" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Contact</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="contact" class="form-control" />
                            </div>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Review Title</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="title" id="category" name="title" class="form-control" placeholder="Review Title" required />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Messsage</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <div class="bs-component">
                                    <textarea class="textarea form-control" id="textArea3" name="message" rows="9"
                                        autocomplete="off"></textarea>
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
                    </div>
                </div> -->

            </div>

        </div>
    </form>
@endsection

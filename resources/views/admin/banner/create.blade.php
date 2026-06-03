@extends('admin.master')
@section('title', 'Banner')
@section('breadcrumb')
    <a href="admin/banner" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

    <form class="form-horizontal" role="form" action="{{ url('admin/banner') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">New Banner</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="title" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Caption</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="caption" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="banner">Banner</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="file" class="form-control" name="picture" />
                            </div>
                            ( Width: 1350px, Height:550px all time fix size )
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Banner Alt Text</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="picture_alt" class="form-control"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label class="col-lg-2 control-label" for="banner">Video</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="file" class="form-control" name="video" />
                                <br> ( Video Size: Less than 20MB )
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group">
                        <label class="col-lg-2 control-label" for="link">Youtube ID</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="youtube_link"
                                    placeholder="Unique Video ID of youtube video" /> <br />
                                https://youtu.be/<b>iwhpS4ow7Zc</b>
                            </div>
                        </div>
                    </div> --}}


                    {{-- <div class="form-group">
                        <label class="col-lg-2 control-label" for="link">Button Link</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="link" placeholder="http://www.google.com" />
                                <br />
                            </div>
                        </div>
                    </div> --}}
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="link">Primary Button Text</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="primary_cta" placeholder="Primary Button Text" />
                                <br />
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label" for="link">Primary Link</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="primary_cta_link" placeholder="http://www.google.com" />
                                <br />
                            </div>
                        </div>
                    </div>

                         <div class="form-group">
                        <label class="col-lg-2 control-label" for="link">Secondary Button Text</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="secondary_cta" placeholder="Secondary Button Text" />
                                <br />
                            </div>
                        </div>
                    </div>

                        <div class="form-group">
                        <label class="col-lg-2 control-label" for="link">Secondary Link</label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="secondary_cta_link" placeholder="http://www.google.com" />
                                <br />
                            </div>
                        </div>
                    </div>

                        {{-- <div class="form-group">
                        <label class="col-lg-2 control-label" for="link">Status </label>
                        <div class="col-lg-6">
                            <div class="bs-component">
                                <select name="status" class="form-control input-sm">
                                    <option value="0"> Hide </option>
                                    <option value="1"> Show </option>
                                </select>
                            </div>
                        </div>
                    </div> --}}

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

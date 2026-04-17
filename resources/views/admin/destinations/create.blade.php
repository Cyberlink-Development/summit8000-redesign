@extends('admin.master')
@section('title', '')
@section('breadcrumb')
    <a href="{{ route('destination.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ route('destination.store') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Add Tour</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Title </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="title" name="title" class="form-control" />
                                <input type="hidden" id="uri" name="uri" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Sub Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" name="brief" class="form-control" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Content</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea type="text" id="content" name="content" class="my-editor form-control"> </textarea>
                            </div>
                        </div>
                    </div>
                     <div class="form-group">
                       <label for="inputStandard" class="col-lg-2 control-label"> Banner</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="file" name="banner[]" multiple />
                            </div>
                        </div>
                    </div>
        
                </div>
                <!--<div class="panel">-->
                <!--    <div class="panel-heading">-->
                <!--        <span class="panel-title">Related Activity</span>-->
                <!--    </div>-->
                <!--    <div class="panel-body">-->
                <!--        <div class="form-group">-->
                <!--            <div class="col-lg-12">-->
                <!--                <div class="bs-component">-->
            
                <!--                    <select class="form-control related-activity" name="activity_id[]" multiple="multiple">-->
                <!--                        @if ($relatedActivities->count() > 0)-->
                <!--                            @foreach ($relatedActivities as $row)-->
                <!--                                {{-- @foreach ($data->relatedActivities as $_row) --}}-->
                <!--                                    {{-- @if ($row->id == $_row->pivot->trip_id) --}}-->
                <!--                                        <option value="{{ $row->id }}"> {{ $row->title }}-->
                <!--                                        </option>-->
                <!--                                        {{-- @continue --}}-->
                <!--                                    {{-- @endif --}}-->
                <!--                                {{-- @endforeach --}}-->
                <!--                                {{-- <option value="{{ $row->id }}">{{ $row->title }}</option> --}}-->
                <!--                            @endforeach-->
                <!--                        @endif-->
                <!--                    </select>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>

        <div class="col-md-3">
            <div class="admin-form">
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status:
                            <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">
                                Active
                            </a>
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
                <div class="sid_bvijay mb10">
                    <label class="field">
                        <input type="number" id="ordering" name="ordering" class="form-control"
                            value="{{ $ordering }}" />
                    </label>
                </div>
                <!--<div class="sid_bvijay mb10">-->
                <!--    <label class="field">Video ID-->
                <!--        <input type="text" id="video" name="video" class="form-control" />-->
                <!--        <br>https://youtu.be/<b>iwhpS4ow7Zc</b>-->
                <!--    </label>-->
                <!--</div>-->

                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            <input type="file" name="thumbnail" />
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var title;
                title = $('#title').val();
                title = title.replace(/[^a-zA-Z0-9 ]+/g, "");
                title = title.replace(/\s+/g, "-");
                $('#uri').val(title);
            });
        });
        $('.related-activity').select2();
    </script>

@endsection
@section('additional-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

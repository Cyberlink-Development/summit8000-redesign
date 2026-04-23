@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
    <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Back </button>
    <a href="{{ url('admin/activity') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i>
        Show List </a>
@endsection

@section('content')
    <form class="form-horizontal" role="form" action="{{ url('admin/activity/' . $data->id) }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">New Activity </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ $data->title }}" placeholder="Title" />
                                <input type="hidden" id="uri" name="uri" value="{{ $data->uri }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Sub Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="" name="sub_title" class="form-control"
                                    value="{{ $data->sub_title }}" placeholder="Sub Title" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea3"> Brief </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="" name="excerpt" rows="3">{{ $data->excerpt }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="external_link" class="col-lg-2 control-label">External Link</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="url" id="external_link" name="external_link" class="form-control"
                                    value="{{ $data->external_link }}" placeholder="External Link" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Content</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">

                        <div class="col-lg-12">
                            <div class="bs-component">
                                <textarea class="form-control my-editor" id="" name="content" rows="3">{{ $data->content }}</textarea>
                            </div>
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

            <!--                    <select class="form-control related-activity" name="related_activity[]" multiple="multiple">-->
            <!--                        @if ($relatedActivities->count() > 0)-->
            <!--                            @foreach ($relatedActivities as $row)
    -->
            <!--                                @foreach ($data->relatedActivities as $_row)
    -->
            <!--                                    @if ($row->id == $_row->pivot->trip_id)
    -->
            <!--                                        <option value="{{ $row->id }}" selected> {{ $row->title }}-->
            <!--                                        </option>-->
            <!--                                        @continue-->
            <!--
    @endif-->
            <!--
    @endforeach-->
            <!--                                <option value="{{ $row->id }}">{{ $row->title }}</option>-->
            <!--
    @endforeach-->
            <!--                        @endif-->
            <!--                    </select>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--     <div class="panel">-->
            <!--    <div class="panel-heading">-->
            <!--        <span class="panel-title"> Video ID </span>-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        <div class="form-group">-->
            <!--            <div class="col-lg-12">-->
            <!--                <div class="bs-component">-->
            <!--                    <input type="text" class="form-control" name="category_video" value="{{ $data->category_video }}"-->
            <!--                       placeholder="Unique Video ID of youtube video"/>-->
            <!--                       <span>https://youtu.be/<b>iwhpS4ow7Zc</b></span>                        -->
            <!--                </div>-->
            <!--            </div>             -->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            @include('admin.seo.seo-form', [
                'seo' => $data->seo ?? null
            ])
        </div>

        <div class="col-md-3">
            <div class="admin-form">
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status: <a href="avoid:javascript;" data-toggle="collapse"
                                data-target="#publish_1">Active</a>
                        </div>
                    </div>
                    <footer>
                        <!--<a href="{{ route('activity.banner.index', $data->id) }}"class="btn btn-default btn-sm">Manage Banners</a>-->
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-sm" value="Publish" />
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <div class="clearfix"></div>
                </div>

                <div class="sid_bvijay mb10">
                    <label class="field select">
                        <select id="template" name="template">
                            @foreach ($templates as $key => $template)
                                <option value="{{ $key }}" {{ $template == $data->template ? 'selected' : '' }}>
                                    {{ ucfirst($template) }} </option>
                            @endforeach
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
                <div class="sid_bvijay mb10">
                    <h4>Select Parent</h4>
                    <label class="field select">
                        <select name="activity_parent" required>
                            <option value="expedition" {{ $data->activity_parent == 'expedition' ? 'selected' : '' }}>
                                Expedition</option>
                            <option value="trekking" {{ $data->activity_parent == 'trekking' ? 'selected' : '' }}>Trekking
                            </option>
                            <option value="activity" {{ $data->activity_parent == 'activity' ? 'selected' : '' }}>Tours
                            </option>
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>


                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <input type="number" id="" name="ordering" class="form-control"
                            placeholder="Ordering" value="{{ $data->ordering }}" />
                    </label>
                </div>

                <div class="sid_bvijay mb10">
                  <div class="hd_show_con">
                   Show in Home
                    <input type="checkbox" name="status" value="{{ $data->status }}"  {{ $data->status == 1 ? 'checked' : '' }}/>
                  </div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">
                        @if ($data->thumbnail)
                            <span class="thumbid{{ $data->id }}">
                                <a href="#{{ $data->id }}" class="icondelete">X</a>
                                <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/icon/' . $data->thumbnail) }}"
                                    width="100%" />
                                <hr />
                            </span>
                        @endif
                        <div id="xedit-demo">
                            <input type="file" name="thumbnail" />
                            ( Width: 1500px, Height:971px )
                        </div>
                    </div>
                    <h4>Thumbnail Alt Text</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <label class="field text">
                                <input type="text" name="thumbnail_alt" class="form-control" placeholder="" value="{{ $data->thumbnail_alt }}" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4> Banner </h4>
                    <div class="hd_show_con">
                        @if ($data->banner)
                            <span class="bannerid{{ $data->id }}">
                                <a href="#{{ $data->id }}" class="imagedelete">X</a>
                                <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner) }}"
                                    width="100%" />
                                <hr />
                            </span>
                        @endif
                        <div id="xedit-demo">
                            <input type="file" name="banner[]" />
                        </div>
                    </div>
                    <h4>Banner Alt Text</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <label class="field text">
                                <input type="text" name="banner_alt" class="form-control" placeholder=""  value="{{ $data->banner_alt }}"/>
                            </label>
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
        $('.imagedelete').on('click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'delete',
                url: "{{ url('delete_activity_thumb') . '/' }}" + id,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('span.bannerid' + id).remove();
                },
                error: function(data) {
                    alert(data + 'Error!');
                }
            });
        });
        /**/
        $('.icondelete').on('click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'delete',
                url: "{{ url('delete_activity_icon') . '/' }}" + id,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('span.thumbid' + id).remove();
                },
                error: function(data) {
                    alert(data + 'Error!');
                }
            });
        });

        $(document).ready(function() {
            $('#title').on('keyup', function() {
                var trip_title;
                trip_title = $('#title').val();
                trip_title = trip_title.replace(/[^a-zA-Z0-9 ]+/g, "");
                trip_title = trip_title.replace(/\s+/g, "-");
                $('#uri').val(trip_title);
            });
        });

        // Go back link
        $('.backlink').click(function() {
            var url = '<?= url()->previous() ?>';
            window.location = url;
        });
        $('.related-activity').select2();
    </script>
@endsection
@section('additional-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

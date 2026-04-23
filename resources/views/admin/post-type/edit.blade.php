@extends('admin.master')
@section('title', 'Post Type')
@section('breadcrumb')
    <a href="{{ route('type.posttype.index', Request::segment(2)) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ url('type/posttype', $data->id) }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Post Type</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label">Post Type</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="post_type" name="post_type" class="form-control" placeholder=""
                                    value="{{$data->post_type}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Uri</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="uri" id="uri" class="form-control" placeholder=""
                                    value="{{$data->uri}}" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Associated Title</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" name="associated_title" class="form-control" placeholder=""
                                    value="{{$data->associated_title}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Ordering </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="ordering" name="ordering" class="form-control"
                                    value="{{ $data->ordering }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Is Header? </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <select name="is_menu" class="form-control input-sm">
                                    <option value="0" {{($data->is_menu == '0') ? 'selected' : ''}}> No </option>
                                    <option value="1" {{($data->is_menu == '1') ? 'selected' : ''}}> Yes </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-3 control-label"> Is Things To Know? </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <select name="is_footer" class="form-control input-sm">
                                    <option value="0" {{($data->is_footer == '0') ? 'selected' : ''}}> No </option>
                                    <option value="1" {{($data->is_footer == '1') ? 'selected' : ''}}> Yes </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--<input type="hidden" name="is_menu" value="{{$data->is_menu}}">-->

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="textArea3"> Content </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <textarea class="form-control my-editor" id="" name="content"
                                    rows="3"> {{ $data->content }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="col-lg-3 control-label" for="">Meta Keywords</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" class="form-control" name="meta_keyword"
                                    value="{{ old('meta_keyword', $data->meta_keyword) }}"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="">Meta Description</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <textarea class="form-control" name="meta_description" rows="3">{{ old('meta_description',$data->meta_description) }}</textarea>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
            @include('admin.seo.seo-form', [
                'seo' => $data->seo ?? null
            ])
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
                    <label class="field select">
                        <select id="template" name="template">
                            @foreach($templates as $key => $template)
                                <option value="{{$key}}" {{ ($template == $data->template) ? 'selected' : '' }}>
                                    {{ ucfirst($template) }}
                                </option>
                            @endforeach
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
                <div class="sid_bvijay mb10">
                    <h4> Image </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            @if($data->banner)
                                <span class="thumb_id{{$data->id}}">
                                    <a href="#{{$data->id}}" class="imagedelete">X</a>
                                    <img src="{{asset(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner)}}" width="150"
                                        class="responsive" alt="{{ $data->post_type}}" />
                                </span>
                                <hr>
                            @endif
                            <input type="file" name="banner" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('scripts')
    <script type="text/javascript">

        $('.imagedelete').on('click', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'delete',
                url: "{{url('delete_posttype_thumb') . '/'}}" + id,
                data: { _token: csrf },
                success: function (data) {
                    $('span.thumb_id' + id).remove();
                },
                error: function (data) {
                    alert(data + 'Error!');
                }
            });
        });


        $(document).ready(function () {
            var post_type;
            $('#post_type').on('keyup', function () {
                post_type = $('#post_type').val();
                post_type = post_type.replace(/[^a-zA-Z0-9 ]+/g, "");
                post_type = post_type.replace(/\s+/g, "-");
                $('#uri').val(post_type);
            });
        });
    </script>
@endsection

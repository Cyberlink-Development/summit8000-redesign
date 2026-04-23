@extends('admin.master')
@section('title', Request::segment(2))
@section('breadcrumb')
    <a href="{{ route('admin.post.index', Request::segment(2)) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

    <form class="form-horizontal" role="form" action="{{ url('admin/' . Request::segment(2) . '/' . $data->id) }}"
        method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="post_type" value="{{ Request::segment(2) }}" />
        <input type="hidden" name="post_date" value="<?= date('Y-m-d h:i:s') ?>" />
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Post</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="post_title" name="post_title" class="form-control"
                                    value="{{ $data->post_title }}" />
                                <input type="hidden" id="uri" name="uri" class="form-control" value="{{ $data->uri }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        @if(Request::segment(2) == 'blogs')
                            <label for="inputStandard" class="col-lg-2 control-label">Date</label>
                        @else
                            <label for="inputStandard" class="col-lg-2 control-label">Sub Title</label>
                        @endif
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="sub_title" class="form-control"
                                    value="{{ $data->sub_title }}" />
                            </div>
                        </div>
                    </div>
                    @if(Request::segment(2) == 'blogs')
                        <div class="form-group">
                                <label for="inputStandard" class="col-lg-2 control-label">Author </label>
                            <div class="col-lg-9">
                                <div class="bs-component">
                                    <input type="text" id="inputStandard" name="author" class="form-control"
                                        value="{{ $data->author }}" />
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($category->count() > 0)
                        <div class="form-group">
                            <label for="inputSelect" class="col-lg-2 control-label"> Category </label>
                            <div class="col-lg-9">
                                <div class="bs-component">

                                    <select name="category" class="form-control">
                                        <option value="0"> Select Category </option>
                                        @if ($category)
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}" {{ $row->id == $data->post_category ? 'selected' : '' }}>
                                                    {{ $row->category }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                    <div class="form-group">
                        <label for="inputSelect" class="col-lg-2 control-label">Select Parent</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <select name="post_parent" class="form-control">
                                    <option value="0"> Choose Parent</option>
                                    @foreach($parent_post as $row)
                                        @if($row->id == $data->id)
                                            @continue
                                        @endif
                                        <option value="{{$row->id}}" {{ ($row->id == $data->post_parent) ? 'selected' : '' }}>
                                            {{$row->post_title}}</option>
                                    @endforeach
                                </select>
                                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea3"> Brief </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="textArea3" name="post_excerpt"
                                    rows="5"> {{ $data->post_excerpt }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2">Content</label>
                        <div class="col-lg-10">
                            <div class="bs-component">
                                <textarea class="form-control my-editor" id="editor2" name="post_content"
                                    rows="12"> {{ $data->post_content }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="meta_keyword" class="form-control"
                                    value="{{ $data->meta_keyword }}" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea3"> Meta Description </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="textArea3" name="meta_description"
                                    rows="3">{{ $data->meta_description }}</textarea>
                            </div>
                        </div>
                    </div>
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
                            Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
                        </div>
                    </div>
                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-sm" value="Update" />
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
                {{-- <div class="sid_bvijay mb10">
                    <label class="field select">
                        <select id="template_child" name="template_child">
                            @foreach ($templates_child as $key => $template_child)
                            <option value="{{ $key }}" {{ $template_child==$data->template_child ? 'selected' : '' }} >{{
                                ucfirst($template_child) }} </option>
                            @endforeach
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div> --}}

                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <input type="number" id="inputStandard" name="post_order" class="form-control"
                            placeholder="Post Order" value="{{ $data->post_order }}" />
                    </label>
                </div>

                <!--<div class="sid_bvijay mb10">-->
                <!--  <div class="hd_show_con">-->
                <!--      Show project in home                        -->
                <!--    <input type="checkbox" name="show_in_home" value="{{ $data->show_in_home }}" {{ $data->show_in_home == 1 ? 'checked' : '' }} /> -->
                <!--  </div>-->
                <!--</div>-->

                <div class="sid_bvijay mb10">
                    <h4> Page Banner </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            @if ($data->page_banner)
                                <span class="banner{{ $data->id }}">
                                    <a href="#{{ $data->id }}" class="bannerdelete">X</a>
                                    <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/banners/' . $data->page_banner) }}"
                                        width="150" />
                                    <hr>
                                </span>
                            @endif
                            <input type="file" name="page_banner" />
                        </div>
                        <small>(width: 2000px height: 1200px)</small>
                    </div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            @if ($data->page_thumbnail)
                                <span class="id{{ $data->id }}">
                                    <a href="#{{ $data->id }}" class="imagedelete">X</a>
                                    <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/medium/' . $data->page_thumbnail) }}"
                                        width="150" />
                                    <hr>
                                </span>
                            @endif
                            <input type="file" name="page_thumbnail" />
                        </div>
                        <small>(width: 1600px height: 1200px)</small>
                    </div>
                </div>

                <!-- <div class="sid_bvijay mb10">-->
                <!--   <h4> Video </h4>-->
                <!--   <div class="hd_show_con">-->
                <!--     <div id="xedit-demo">-->
                <!--      <input type="text" name="page_video" class="form-control" value="{{ $data->page_video }}" />-->
                <!--    </div>-->
                <!--  </div>-->
                <!--</div>-->

            </div>
        </div>
    </form>
@endsection

@section('libraries')
    <script type="text/javascript">
        $('.imagedelete').on('click', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'delete',
                url: "{{ url('delete_post_thumb') . '/' }}" + id,
                data: { _token: csrf },
                success: function (data) {
                    $('span.id' + id).remove();
                },
                error: function (data) {
                    alert(data + 'Error!');
                }
            });
        });

        $('.bannerdelete').on('click', function (e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            $.ajax({
                type: 'delete',
                url: "{{ url('delete_post_banner') . '/' }}" + id,
                data: { _token: csrf },
                success: function (data) {
                    $('span.banner' + id).remove();
                },
                error: function (data) {
                    alert(data + 'Error!');
                }
            });
        });

        $(document).ready(function () {
            $('#post_title').on('keyup', function () {
                var post_title;
                post_title = $('#post_title').val();
                post_title = post_title.replace(/[^a-zA-Z0-9 ]+/g, "");
                post_title = post_title.replace(/\s+/g, "-");
                $('#uri').val(post_title);
            });
        });

        // Go back link
        $('.backlink').click(function () {
            var url = '<?= url()->previous() ?>';
            window.location = url;
        });

    </script>
@endsection

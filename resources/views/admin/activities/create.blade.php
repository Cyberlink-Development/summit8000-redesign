@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
    <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Back </button>
    <a href="{{ url('admin/activity') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i>
        Show List </a>
@endsection

@section('content')
    <form class="form-horizontal" role="form" action="{{ url('admin/activity') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"> New Activity </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="title" name="title" class="form-control" placeholder="" />
                                <input type="hidden" id="uri" name="uri" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Sub Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="" name="sub_title" class="form-control" placeholder="" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea3"> Brief </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="" name="excerpt" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="external_link" class="col-lg-2 control-label">External Link</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="external_link" name="external_link" class="form-control"
                                    placeholder="External Link" />
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"> Content</span>
                </div>
                <div class="panel-body">
                    <div class="form-group">

                        <div class="col-lg-12">
                            <div class="bs-component">
                                <textarea class="form-control my-editor" id="" name="content" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  <div class="panel">-->
            <!--    <div class="panel-heading">-->
            <!--        <span class="panel-title"> Video ID </span>-->
            <!--    </div>-->
            <!--    <div class="panel-body">-->
            <!--        <div class="form-group">-->
            <!--            <div class="col-lg-12">-->
            <!--                <div class="bs-component">-->
            <!--                    <input type="text" class="form-control" name="category_video" value="{{ old('category_video') }}"-->
            <!--                       placeholder="Unique Video ID of youtube video"/>-->
            <!--                       <span>https://youtu.be/<b>iwhpS4ow7Zc</b></span>                        -->
            <!--                </div>-->
            <!--            </div>             -->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title"> Map and Meta data </span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="" name="meta_keyword" class="form-control"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea3"> Meta Description </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="textArea3" name="meta_description" rows="3"></textarea>
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
                            Action
                        </div>
                    </div>
                    <footer>
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
                                <option value="{{ $key }}">{{ ucfirst($template) }}</option>
                            @endforeach
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>
                <div class="sid_bvijay mb10">
                    <h4>Select Parent</h4>
                    <label class="field select">
                        <select name="activity_parent" required>
                            <option value="" disabled selected>---- Select ----</option>
                            <option value="expedition">Expedition</option>
                            <option value="trekking">Trekking</option>
                            <option value="activity">Tours</option>
                        </select>
                        <i class="arrow"></i>
                    </label>
                </div>


                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <input type="number" id="" name="ordering" class="form-control"
                            placeholder="Ordering" value="{{ $ordering }}" />
                    </label>
                </div>

                <div class="sid_bvijay mb10">
                  <div class="hd_show_con">
                   Show in Home
                    <input type="checkbox" name="status" value="1" />
                  </div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            <input type="file" name="icon" />
                            ( Width: 1500px, Height:971px )
                        </div>
                    </div>
                    <h4>Thumbnail Alt Text</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <label class="field text">
                                <input type="text" name="thumbnail_alt" class="form-control" placeholder="" />
                            </label>
                        </div>
                    </div>
                </div>

                <div class="sid_bvijay mb10">
                    <h4> Banner </h4>
                    <div class="hd_show_con">
                        <div id="xedit-demo">
                            <input type="file" name="banner[]" />
                        </div>
                    </div>
                    <h4>Banner Alt Text</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <label class="field text">
                                <input type="text" name="banner_alt" class="form-control" placeholder="" />
                            </label>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
@endsection
@section('scripts')
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

        // Go back link
        $('.backlink').click(function() {
            var url = '<?= url()->previous() ?>';
            window.location = url;
        });
    </script>
@endsection

@extends('admin.master')
@section('title', '')
@section('breadcrumb')
    <a href="{{ route('destination.index') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

    <form class="form-horizontal" role="form" action="{{ route('destination.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PUT')
        <div class="col-md-9">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Edit Tour </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Title </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" id="title" name="title" class="form-control" value="{{ $data->title }}" />
                                <input type="hidden" id="uri" name="uri" value="{{ $data->uri }}" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Sub Title</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" name="brief" class="form-control" value="{{ $data->brief }}"></input>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Content</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea type="text" id="content" name="content" class="my-editor form-control" rows="12">{{ $data->content }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                     <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label"> Banner</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                 <input type="file" name="banner" />
                                 @if ($data->banner)
                                 <span class="bannerid{{$data->id}}">
                              <a href="#{{$data->id}}" class="delete_banner">X</a>
                                <img src="{{ asset('/uploads/original/' . $data->banner) }}" width="100%" />
                                 @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
                {{-- <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Related Activity</span>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="bs-component">
                                    <select class="form-control related-activity" name="activity_id[]" multiple="multiple">
                                        
                                        @foreach ($relatedActivities as $row)
                                        
                                        @if(selected($row->id, $data->id) != null)
                                        <option value="{{ $row->id }}" selected>{{ $row->title }}</option>
                                        @else
                                        <option value="{{ $row->id }}">{{ $row->title }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
        </div>

        <div class="col-md-3">
            <div class="admin-form">

                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status:
                            <a href="javascript:void(0);" id="statusToggle">
                                {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                            </a>
                            <input type="hidden" name="status" id="statusInput" value={{ $data->status }}>
                        </div>
                    </div>
                    <footer>
                        {{-- <a href="{{route('destination.page.index',$data->id)}}"  class="btn btn-default">Multiple Banners</a> --}}

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
                            value="{{ $data->ordering }}" />
                    </label>
                </div>
                <!--<div class="sid_bvijay mb10">-->
                <!--    <label class="field">Video ID-->
                <!--        <input type="text" id="video" name="video" class="form-control" value="{{$data->video}}"/>-->
                <!--        <br>https://youtu.be/<b>iwhpS4ow7Zc</b>-->
                <!--    </label>-->
                <!--</div>-->

                <div class="sid_bvijay mb10">
                    <h4> Thumbnail </h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <input type="file" name="thumbnail" />
                        </div>
                        @if ($data->thumbnail)
                        <span class="thumbnailid{{$data->id}}">
                      <a href="#{{$data->id}}" class="delete_thumbnail">X</a>
                                <br>
                                <img src="{{ asset('uploads/original/' . $data->thumbnail) }}" width="100%" />
                               
                            </span>
                        @endif
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

        $('.delete_banner').on('click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            var url = "{{ route('delete-destination-banner', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: 'delete',
                url: url,
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

        $('.delete_thumbnail').on('click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var str = $(this).attr('href');
            var id = str.slice(1);
            var url = "{{ route('delete-destination-thumb', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                type: 'delete',
                url: url,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('span.thumbnailid' + id).remove();
                },
                error: function(data) {
                    alert(data + 'Error!');
                }
            });
        });
        $('.related-activity').select2();
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const toggleBtn = document.getElementById('statusToggle');
            const hiddenInput = document.getElementById('statusInput');
    
            toggleBtn.addEventListener('click', function () {
                const isActive = toggleBtn.textContent.trim() === 'Active';
    
                const newText = isActive ? 'Inactive' : 'Active';
                const newValue = isActive ? '0' : '1';
    
                toggleBtn.textContent = newText;
                hiddenInput.value = newValue;
            });
        });
    </script>
@endsection
@section('additional-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

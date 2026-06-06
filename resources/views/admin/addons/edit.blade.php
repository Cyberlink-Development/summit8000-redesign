@extends('admin.master')

@section('title', 'Edit Addon')

@section('breadcrumb')

    <button type="button" class="btn btn-default btn-sm backlink">
        <i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Back
    </button>

    <a href="{{ route('addon.index') }}" class="btn btn-default btn-sm backlink">
        <i class="fa fa-list" aria-hidden="true"></i>
        Show List
    </a>

@endsection

@section('content')

<form class="form-horizontal"
      role="form"
      action="{{ route('addon.update', $data->id) }}"
      method="post"
      enctype="multipart/form-data">

    {{ csrf_field() }}

    @method('PUT')

    <div class="col-md-9">

        <div class="panel">

            <div class="panel-heading">
                <span class="panel-title">Edit Addon</span>
            </div>

            <div class="panel-body">

                {{-- Title --}}
                <div class="form-group">

                    <label class="col-lg-2 control-label">
                        Title
                    </label>

                    <div class="col-lg-9">

                        <div class="bs-component">

                            <input type="text"
                                   name="title"
                                   class="form-control"
                                   value="{{ $data->title }}"
                                   placeholder="Addon Title" />

                        </div>

                    </div>

                </div>

                {{-- Description --}}
                <div class="form-group">

                    <label class="col-lg-2 control-label">
                        Description
                    </label>

                    <div class="col-lg-9">

                        <div class="bs-component">

                            <textarea name="description"
                                      rows="6"
                                      class="form-control">{{ $data->description }}</textarea>

                        </div>

                    </div>

                </div>

                {{-- Price --}}
                <div class="form-group">

                    <label class="col-lg-2 control-label">
                        Price
                    </label>

                    <div class="col-lg-9">

                        <div class="bs-component">

                            <input type="text"
                                   name="price"
                                   class="form-control"
                                   value="{{ $data->price }}"
                                   placeholder="+$450 per person" />

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="col-md-3">

        <div class="admin-form">

            {{-- Publish --}}
            <div class="sid_bvijay mb10">

                <div class="hd_show_con">

                    <div class="publice_edi">
                        Status:
                        <a href="javascript:void(0);"
                           data-toggle="collapse"
                           data-target="#publish_1">

                            {{ $data->status == 1 ? 'Active' : 'Inactive' }}

                        </a>
                    </div>

                </div>

                <footer>

                    <div id="publishing-action">

                        <input type="submit"
                               class="btn btn-primary btn-sm"
                               value="Update" />

                    </div>

                    <div class="clearfix"></div>

                </footer>

                <div class="clearfix"></div>

            </div>

            {{-- Ordering --}}
            <div class="sid_bvijay mb10">

                <label class="field text">

                    <input type="number"
                        name="ordering"
                        class="form-control"
                        placeholder="Ordering"
                        min="1"
                        value="{{ $data->ordering }}" />

                </label>

            </div>

            {{-- Status --}}
            <div class="sid_bvijay mb10">

                <label class="field select">

                    <select name="status">

                        <option value="1"
                            {{ $data->status == 1 ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="0"
                            {{ $data->status == 0 ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                    <i class="arrow"></i>

                </label>

            </div>

            {{-- Thumbnail --}}
            <div class="sid_bvijay mb10">

                <h4>Thumbnail</h4>

                <div class="hd_show_con">

                    @if($data->thumbnail)

                        <div id="thumbnail-image">

                            <img src="{{ asset('uploads/thumbnails/' . $data->thumbnail) }}"
                                 class="img-responsive mb10"
                                 style="width:100%;">

                            <a href="#{{ $data->id }}"
                               class="btn btn-danger btn-xs imagedelete">

                                Delete

                            </a>

                        </div>

                    @endif

                    <div id="xedit-demo">

                        <input type="file" name="thumbnail" />

                    </div>

                    <small>
                        Recommended size: 1200x800
                    </small>

                </div>

            </div>

            {{-- Thumbnail Alt --}}
            <div class="sid_bvijay mb10">

                <label class="field text">

                    <input type="text"
                           name="thumbnail_alt"
                           class="form-control"
                           placeholder="Thumbnail Alt Text"
                           value="{{ $data->thumbnail_alt }}" />

                </label>

            </div>

        </div>

    </div>

</form>

@endsection


@section('scripts')

<script type="text/javascript">

    // Back button
    $('.backlink').click(function () {

        var url = '<?= url()->previous() ?>';

        window.location = url;

    });


    // Delete Thumbnail
    $('.imagedelete').on('click', function (e) {

        e.preventDefault();

        if (!confirm('Are you sure to delete?')) {

            return false;
        }

        var csrf = $('meta[name="csrf-token"]').attr('content');

        var str = $(this).attr('href');

        var id = str.slice(1);

        $.ajax({

            type: 'delete',

            url: "{{ url('admin/addon/delete-thumbnail') }}/" + id,

            data: {
                _token: csrf
            },

            success: function (data) {

                $('#thumbnail-image').remove();

            },

            error: function (data) {

                alert('Error');

            }

        });

    });

</script>

@endsection

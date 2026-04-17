<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Banner</span>
            <a class="btn btn-primary pull-right add-banner" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add
                Row </a>
        </div>

        <div class="panel-body" id="row_banner_body">
            <div class="row">
                <div class="col-md-1"><label>Ordering</label></div>
                <div class="col-md-3"><label>Title</label></div>
                <!--<div class="col-md-4"><label>Video</label></div>-->
                <div class="col-md-3"><label>Thumbnail</label></div>
                <div class="col-md-1"></div>
            </div>
            @if ($banner->count() > 0)
                @foreach ($banner as $row)
                    <div class="row" id="banner-rec-{{ $loop->iteration }}">
                        <input type="hidden" name="banner_id[]" value="{{ $row->id }}" />
                        <div class="col-md-1">
                            <input type="number" min="1" max="2000" name="banner_ordering[]"
                                value="{{ $row->ordering }}" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="banner_title[]" value="{{ $row->title }}" class="form-control"
                                placeholder="" />
                        </div>
                        <!--<div class="col-md-4">-->
                        <!--    <input type="text" name="banner_video[]" value="{{ $row->video }}" class="form-control"-->
                        <!--        placeholder="" />-->
                        <!--</div>-->
                        <div class="col-md-3">
                            <input type="file" name="banner_banner[]" class="form-control gearthumb"
                                file-rowid="{{ $row->id }}" />
                            @if ($row->banner)
                                <span class="del-{{ $row->id }}">
                                    <img src="{{ asset('uploads/original/' . $row->banner) }}" width="200"/>
                                    <a href="{{ $row->id }}" class="delete_banner_thumb">X</a>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-banner"
                                banner-rowid="{{ $row->id }}" banner-data-id="{{ $loop->iteration }}"><i
                                    class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                @endforeach
            @endif
        </div>

        <div style="display:none;">
            <div id="row_banner_additional">
                <div class="row">
                    <input type="hidden" name="banner_id[]" value="" />
                    <div class="col-md-1"><input type="number" min="1" max="2000" name="banner_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-3"><input type="text" name="banner_title[]" class="form-control" placeholder="" />
                    </div>
                    {{-- <div class="col-md-2"><input type="text" name="banner_content[]" class="form-control"
                            placeholder="" /></div> --}}
                    <!--<div class="col-md-4"><input type="text" name="banner_video[]" class="form-control" placeholder="" />-->
                    <!--</div>-->
                    <div class="col-md-3"><input type="file" name="banner_banner[]" class="form-control gearthumb" />
                     <small> (Width: 1600px Height: 1200px) </small>
                    </div>
                    <div class="col-md-1"><button class="btn btn-danger delete-banner" banner-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>


    </div>


</div>

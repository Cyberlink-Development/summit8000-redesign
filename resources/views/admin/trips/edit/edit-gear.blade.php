<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Photos </span>
            <a class="btn btn-primary pull-right add-gear" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
        </div>

        <div class="panel-body" id="row_gear_body">
            <div class="row">
                <div class="col-md-2"><label>Ordering</label></div>
                <div class="col-md-4"><label>Title/Alt text</label></div>
                <!-- <div class="col-md-4"><label>Video</label></div> -->
                <div class="col-md-4"><label>Thumbnail</label></div>
                <div class="col-md-1"></div>
            </div>
            @if ($gears->count() > 0)
                @foreach ($gears as $row)
                    <div class="row" id="gear-rec-{{ $loop->iteration }}">
                        <input type="hidden" name="gear_id[]" value="{{ $row->id }}" />
                        <div class="col-md-2">
                            <input type="number" min="1" max="2000" name="gear_ordering[]"
                                value="{{ $row->ordering }}" class="form-control" placeholder="" />
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="gear_title[]" value="{{ $row->title }}" class="form-control"
                                placeholder="" />
                        </div>
                        <!-- <div class="col-md-4">
                            <input type="text" name="gear_video[]" value="{{ $row->video }}" class="form-control"
                                placeholder="" />
                        </div> -->
                        <div class="col-md-4">
                            <input type="file" name="gear_thumbnail[]" class="form-control gearthumb"
                                file-rowid="{{ $row->id }}" />
                            @if ($row->thumbnail)
                                <span class="del-{{ $row->id }}">
                                    <img src="{{ asset('uploads/original/' . $row->thumbnail) }}" width="200"/>
                                    <a href="{{ $row->id }}" class="delete_gear_thumb">X</a>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-1"><button class="btn btn-danger delete-gear"
                                gear-rowid="{{ $row->id }}" gear-data-id="{{ $loop->iteration }}"><i
                                    class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                @endforeach
            @endif
        </div>

        <div style="display:none;">
            <div id="row_gear_additional">
                <div class="row">
                    <input type="hidden" name="gear_id[]" value="" />
                    <div class="col-md-2"><input type="number" min="1" max="2000" name="gear_ordering[]"
                            class="form-control" placeholder="" /></div>
                    <div class="col-md-4"><input type="text" name="gear_title[]" class="form-control" placeholder="" />
                    </div>
                    {{-- <div class="col-md-2"><input type="text" name="gear_content[]" class="form-control"
                            placeholder="" /></div> --}}

                    <!-- <div class="col-md-4"><input type="text" name="gear_video[]" class="form-control" placeholder="" />
                    </div> -->
                    <div class="col-md-4"><input type="file" name="gear_thumbnail[]" class="form-control gearthumb" />
                     <small> (Width: 1600px Height: 1200px) </small>
                    </div>
                    <div class="col-md-1"><button class="btn btn-danger delete-gear" gear-data-id="0"><i
                                class="glyphicon glyphicon-trash"></i></button></div>
                </div>
            </div>
        </div>


    </div>


</div>

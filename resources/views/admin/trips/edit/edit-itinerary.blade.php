<div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title"> Trip Itinerary </span>
            <a class="btn btn-primary pull-right add-itinerary" data-added="0"><i
                    class="glyphicon glyphicon-plus"></i> Add Row </a>
        </div>

        <div class="panel-body" id="row_body">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <div class="col-md-1"> <label>Ordering </label></div>
                    <div class="col-md-1"> <label>Days</label></div>
                    <div class="col-md-5"> <label>Title</label></div>
                    <div class="col-md-2"> <label>Accomodation</label></div>
                    <div class="col-md-2"> <label>Distance</label></div>
                    <div class="col-md-2"> <label>Meals</label></div>
                    <div class="col-md-1"> </div> -->
                </div>
            </div>
            @if ($itineraries->count() > 0)
                @foreach ($itineraries as $row)
                    <div class="row" id="rec-{{ $loop->iteration }}">
                        <input type="hidden" name="itinerary_id[]" value="{{ $row->id }}" />
                        <div class="col-lg-12">
                            <div class="col-md-1"> <label>Ordering </label> <input type="number" min="1" max="2000" name="itinerary_ordering[]" value="{{ $row->ordering }}" class="form-control" placeholder="" /></div>

                            <div class="col-md-2"> <label>Days </label><input type="text" name="itinerary_days[]" value="{{ $row->days }}" class="form-control" placeholder="Day" /></div>

                            <div class="col-md-7"> <label>Title </label><input type="text" name="itinerary_title[]" value="{{ $row->title }}" class="form-control" placeholder="Title" /></div>

                            <div class="col-md-1"><button class="btn btn-danger delete-itinerary" itinerary-rowid="{{ $row->id }}" itinerary-data-id="{{ $loop->iteration }}"><i class="glyphicon glyphicon-trash"></i></button></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-md-3"> <label>Max Altitude </label><input type="text" name="itinerary_max_altitude[]" value="{{ $row->max_altitude }}" class="form-control" placeholder="" /></div>

                            <div class="col-md-4"> <label>Accomodation </label><input type="text" name="itinerary_distance[]" value="{{ $row->distance }}" class="form-control" placeholder="" /></div>

                            <div class="col-md-3"> <label>Meals </label><input type="text" name="itinerary_duration[]" value="{{ $row->duration }}" class="form-control" placeholder="" /></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-md-12"><textarea name="itinerary_content[]" class=" form-control my-editor" placeholder="Content Goes Here"> {{ $row->content }} </textarea></div>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                    </div>
                @endforeach
            @endif
        </div>

        <div style="display:none;">
            <div id="row_additional">
                <div class="row">
                    <input type="hidden" name="itinerary_id[]" value="" />
                    <div class="col-lg-12">
                        <div class="col-md-1"> <label>Ordering </label> <input type="number" min="1" max="2000" name="itinerary_ordering[]" class="form-control" placeholder="SN" /></div>

                        <div class="col-md-2"> <label>Days </label><input type="text" name="itinerary_days[]" class="form-control" placeholder="Day" /></div>

                        <div class="col-md-7"> <label>Title </label><input type="text" name="itinerary_title[]" class="form-control" placeholder="Title" /></div>

                        <div class="col-md-1"><button class="btn btn-danger delete-itinerary" itinerary-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-md-3"> <label>Max altitude </label><input type="text" name="itinerary_max_altitude[]" class="form-control" placeholder="" /></div>

                        <div class="col-md-4"> <label>Accomodation </label><input type="text" name="itinerary_distance[]" class="form-control" placeholder="" /></div>

                        <div class="col-md-3"> <label>Meals </label><input type="text" name="itinerary_duration[]" class="form-control" placeholder="" /></div>
                    </div>
                    <div class="col-lg-12">
                        <div class="col-md-12"><textarea name="itinerary_content[]" class="form-control"
                                placeholder="Content Goes Here"></textarea></div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                </div>
            </div>
        </div>

    </div>
</div>

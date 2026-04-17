<div class="row">
    <div class="col-md-8">
        <!-- Input Fields -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">New Trip</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" id="trip_title" name="trip_title" class="form-control"
                                value="{{ $data->trip_title }}" placeholder="Trip Title" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" id="" name="uri" class="form-control"
                                value="{{ $data->uri }}" placeholder="Trip Uri" required/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Sub Title" >{{ $data->sub_title }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> Trip Details </span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="bs-component ">
                            <label>Trip Difficulty</label>
                            @if ($trek->count() > 0)
                                <select class="form-control" name="trip_grade">
                                    <option value="0"> Select Grade </option>
                                    @foreach ($trek as $row)
                                        <option value="{{ $row->id }}"
                                            {{ $row->id == $data->trip_grade ? 'selected' : '' }}>{{ $row->trip_grade }}
                                        </option>
                                    @endforeach
                                </select>
                            @endif

                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                    <div class="bs-component">
                         <label>Grade Message</label>
                         <input type="text" name="status_text" class="form-control" value="{{$data->status_text}}" />
                        </div>
                    </div>                  --}}
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Max Elevation</label>
                            <input type="text" name="max_altitude" class="form-control"
                                value="{{ $data->max_altitude }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">


                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Group Size</label>
                            <input type="text" name="group_size" class="form-control"
                                value="{{ $data->group_size }}" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Season</label>
                            <input type="text" name="best_season" class="form-control"
                                value="{{ $data->best_season }}" />

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="{{ $data->price }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Duration</label>
                            <input type="text" min="1" name="duration" class="form-control"
                                value="{{ $data->duration }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Accommodation</label>
                            <input type="text" name="accommodation" class="form-control"
                                value="{{ $data->accommodation }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Daily Activity</label>
                            <input type="text" name="walking_per_day" class="form-control"
                                value="{{ $data->walking_per_day }}" />
                        </div>
                    </div>
                </div>
                <!--       <div class="col-lg-6">-->
                <!--        <div class="bs-component">-->
                <!--            <label>Staffs</label>-->
                <!--            <input type="text" name="peak_name" class="form-control" value="{{ $data->peak_name }}"-->
                <!--                placeholder="Staff" />-->
                <!--        </div>-->
                <!--    </div>-->

                <!--</div>-->

                <!--<div class="form-group">                -->
                <!--    <div class="col-lg-6">-->
                <!--        <div class="bs-component">-->
                <!--            <label>Transportation</label>-->
                <!--            <input type="text" name="route" class="form-control" value="{{ $data->route }}"-->
                <!--                placeholder="Transportation" />-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-lg-6">-->
                <!--        <div class="bs-component">-->
                <!--            <label>Start / End</label>-->
                <!--            <input type="text" name="start_date" class="form-control" value="{{ $data->start_date }}"/>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="form-group">

                </div>
                <!--    <div class="col-lg-6">-->
                <!--        <div class="bs-component">-->
                <!--            <label>Discount</label>-->
                <!--            <input type="text" name="discount" class="form-control"-->
                <!--                value="{{ $data->discount }}" />-->
                <!--        </div>-->
                <!--    </div>-->

                <!--</div>-->
                <div class="form-group">
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="bs-component">-->
                    <!--        <label>Video ID</label>-->
                    <!--       <input type="text" class="form-control" name="trip_video" value="{{ $data->trip_video }}"-->
                    <!--            placeholder="Trip Video" />-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Meals</label>
                            <input type="text" name="meals" class="form-control"
                                value="{{ $data->meals }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Transportation</label>
                            <input type="text" name="peak_name" class="form-control"
                                value="{{ $data->peak_name }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Start/End</label>
                            <input type="text" name="route" class="form-control"
                                value="{{ $data->route }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Is Luxury Trip?</label>
                            <select class="form-control" name="video_status">
                                <option @if ($data->video_status == 1) selected @endif value="1">Yes</option>
                                <option @if ($data->video_status == 0) selected @endif value="0">No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Trip Content</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="my-editor form-control" name="trip_content" id="trip_content" placeholder="Trip Content" rows="9">{{ $data->trip_content }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Trip Gears List</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="my-editor form-control" id="trip_highlight" name="trip_highlight"
                                placeholder="Trip Gears List">{{ $data->trip_highlight }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Extra Information</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="my-editor form-control" name="trip_excerpt" rows="3" placeholder="Trip Excerpt">{{ $data->trip_excerpt }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Related Trips</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <select class="form-control realted-trips" name="related_trips[]" multiple="multiple">
                                @if ($all_trips->count() > 0)
                                    @foreach ($all_trips as $row)
                                        @foreach ($data->relatedtrips as $_row)
                                            @if ($row->id == $_row->pivot->related_trip_id)
                                                <option value="{{ $row->id }}" selected> {{ $row->trip_title }}
                                                </option>
                                                @continue
                                            @endif
                                        @endforeach
                                        <option value="{{ $row->id }}">{{ $row->trip_title }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> Meta data </span>
            </div>
            <div class="panel-body">

                {{-- <div class="form-group">
                <div class="col-lg-12">
                    <div class="bs-component">
                        <input type="text" name="meta_title" class="form-control" value="{{ $data->meta_title }}"
                            placeholder="Meta Title" />
                    </div>
                </div>
            </div> --}}

                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" name="meta_key" class="form-control"
                                value="{{ $data->meta_key }}" placeholder="Meta Key" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="form-control" name="meta_description" rows="3" placeholder="Meta Description">{{ $data->meta_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="admin-form">

            <?php /*
     <div class="sid_bvijay mb10 ">
        <h4> Regions </h4>
        <div class="hd_show_con">
         <div class=" has-feedback has-search">
              <input class="category-search form-control" type="text" placeholder="Search..">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>
            <div class="tab-content mb15">
                <div id="tab1" class="tab-pane active">
                    @if ($regions->count() > 0)
                        <ul class="ctgor category-list" style="height:200px">
                            @foreach ($regions as $row)
                                <li>
                                    <label class="option">
                                        <input type="checkbox" name="region[]" value="{{ $row->id }}"
                                            {{ in_array($row->id, $checked_regions) ? 'checked' : '' }}>
                                        <span class="checkbox"></span> {{ $row->title }}
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
     <div class="sid_bvijay mb10">
            <h4> Trip Groups </h4>
            <div class="hd_show_con">
                <div class="tab-content mb15">
                    <div id="tab1" class="tab-pane active">
                        @if ($trip_groups->count() > 0)
                            <ul class="ctgor">
                                @foreach ($trip_groups as $row)
                                    <li>
                                        <label class="option">
                                            <input type="checkbox" name="tripgroup[]" value="{{ $row->id }}"
                                                {{ in_array($row->id, $checked_tripgroups) ? 'checked' : '' }}>
                                            <span class="checkbox"></span> {{ $row->title }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        */
            ?>

            <div class="sid_bvijay mb10">
                <h4> Destinations </h4>
                <div class="hd_show_con">
                    <div class="tab-content mb15">
                        <div id="tab1" class="tab-pane active">
                            @if ($destinations->count() > 0)
                                <ul class="ctgor">
                                    @foreach ($destinations as $row)
                                        <li>
                                            <label class="option">
                                                <input type="radio" name="destination[]"
                                                    value="{{ $row->id }}"
                                                    {{ in_array($row->id, $checked_destinations) ? 'checked' : '' }} required>
                                                <span class="checkbox"></span> {{ $row->title }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="sid_bvijay mb10">
                <h4> Trip Type </h4>
                <div class="hd_show_con">
                    <select class="form-control onchange-select" name="trip_type" required>
                        <option value="" disabled> Select Trip Type </option>
                        @if ($trip_type->count(0 > 0))
                            @foreach ($trip_type as $row)
                                @if($row->id != 3)
                                    <option value="{{ $row->id }}" @if ($data->trip_type == $row->id) selected @endif>
                                        {{ $row->trip_type }}
                                    </option>
                                @else
                                    <option value="{{ $row->id }}" @if ($data->trip_type == $row->id) selected @endif>
                                        Tours
                                    </option>
                                @endif
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="sid_bvijay mb10 onchange 1">
                <h4> Trekking </h4>
                <div class="hd_show_con">
                    <div class=" has-feedback has-search">
                        <input class="category-search1 form-control" type="text" placeholder="Search..">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                    <div class="tab-content mb15">
                        <div id="tab1" class="tab-pane active">
                            @if ($trekking->count() > 0)
                                <ul class="ctgor category-list1">
                                    @foreach ($trekking as $row)
                                        <li>
                                            <label class="option">
                                                <input type="radio" name="activity[]" value="{{ $row->id }}"
                                                    {{ in_array($row->id, $checked_activities) ? 'checked' : '' }} required>
                                                <span class="checkbox"></span> {{ $row->title }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="sid_bvijay mb10 onchange 2">
                <h4> Expedition </h4>
                <div class="hd_show_con">
                    <!--<div class=" has-feedback has-search">-->
                    <!--     <input class="category-search1 form-control" type="text" placeholder="Search.."> -->
                    <!--     <span class="glyphicon glyphicon-search form-control-feedback"></span>-->
                    <!--   </div>-->
                    <div class="tab-content mb15">
                        <div id="tab1" class="tab-pane active">
                            @if ($expeditions->count() > 0)
                                <ul class="">
                                    @foreach ($expeditions as $row)
                                        <li>
                                            <label class="option">
                                                <input type="radio" name="activity[]" value="{{ $row->id }}"
                                                    {{ in_array($row->id, $checked_activities) ? 'checked' : '' }}>
                                                <span class="checkbox"></span> {{ $row->title }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="sid_bvijay mb10 onchange 3">
                <h4> Tours </h4>
                <div class="hd_show_con">
                    <!--<div class=" has-feedback has-search">-->
                    <!--     <input class="category-search1 form-control" type="text" placeholder="Search.."> -->
                    <!--     <span class="glyphicon glyphicon-search form-control-feedback"></span>-->
                    <!--   </div>-->
                    <div class="tab-content mb15">
                        <div id="tab1" class="tab-pane active">
                            @if ($activity->count() > 0)
                                <ul class="">
                                    @foreach ($activity as $row)
                                        <li>
                                            <label class="option">
                                                <input type="radio" name="activity[]" value="{{ $row->id }}"
                                                    {{ in_array($row->id, $checked_activities) ? 'checked' : '' }}>
                                                <span class="checkbox"></span> {{ $row->title }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="sid_bvijay mb10 onchange 4">
                <h4> Packages </h4>
                <div class="hd_show_con">
                    <!--<div class=" has-feedback has-search">-->
                    <!--     <input class="category-search1 form-control" type="text" placeholder="Search.."> -->
                    <!--     <span class="glyphicon glyphicon-search form-control-feedback"></span>-->
                    <!--   </div>-->
                    <div class="tab-content mb15">
                        <div id="tab1" class="tab-pane active">
                            @if ($packages->count() > 0)
                                <ul class="">
                                    @foreach ($packages as $row)
                                        <li>
                                            <label class="option">
                                                <input type="radio" name="activity[]" value="{{ $row->id }}"
                                                    {{ in_array($row->id, $checked_activities) ? 'checked' : '' }}>
                                                <span class="checkbox"></span> {{ $row->title }}
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="sid_bvijay mb10">
                <h4> Trip Ordering </h4>
                <div class="hd_show_con">
                    <label class="field text">
                        <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                            value="{{ $data->ordering }}" />
                    </label>
                </div>
            </div>
            <div class="sid_bvijay mb10">
                <h4> Trip Video </h4>
                <div class="hd_show_con">
                    <label class="field text">
                        <input type="text" name="trip_video" class="form-control" placeholder="YouTube Video ID"
                            value="{{ $data->trip_video }}" />
                    </label>
                    <label for="">www.youtube.com/watch?v=<strong>bFy6jTEHlzQ</strong></label>
                </div>
            </div>

            <!-- trip Thumbnail -->
            <div class="sid_bvijay mb10">
                <h4> Thumbnail </h4>
                <div class="hd_show_con">
                    <div id="xedit" class="bs-component">
                        <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">{{ $data->thumbnail ? 'Change' : 'Choose File' }}</span>
                            <input type="file" class="gui-file" name="thumbnail" id="file1"
                                onChange="document.getElementById('Thumbnail').value = this.value;">
                            <input type="text" class="gui-input" id="Thumbnail"
                                placeholder="Please select a photo">
                            <label class="field-icon">
                                <i class="fa fa-upload"></i>
                            </label>
                        </label>
                    </div>
                    @if ($data->thumbnail)
                        <div class="delete-fe-image thumb_id{{ $data->id }}">
                            <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail) }}"
                                width="200px" />
                            <a href="#{{ $data->id }}" class="thumbdelete">X</a>
                        </div>
                    @endif
                    <small> (Width: 1500px Height: 1500px) </small>
                    <h4>Thumbnail Alt Text</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <label class="field text">
                                <input type="text" name="thumbnail_alt" class="form-control" placeholder="" value="{{ $data->thumbnail_alt }}" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- trip map -->
            <div class="sid_bvijay mb10">
                <h4> Trip Map </h4>
                <div class="hd_show_con">
                    <div class="bs-component">
                        <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">{{ $data->trip_map ? 'Change' : 'Choose File' }}</span>
                            <input type="file" class="gui-file" name="trip_map" id="file2"
                                onChange="document.getElementById('trip_map').value = this.value;">
                            <input type="text" class="gui-input" id="trip_map"
                                placeholder="Please select a photo">
                            <label class="field-icon">
                                <i class="fa fa-upload"></i>
                            </label>
                        </label>
                    </div>
                    @if ($data->trip_map)
                        <div class="delete-fe-image map_id{{ $data->id }}">
                            <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_map) }}"
                                width="200px" />
                            <a href="#{{ $data->id }}" class="mapdelete">X</a>
                        </div>
                    @endif
                    <small> (Width: 1500px Height: 1500px) </small>
                    <h4>Trip Map Alt Text</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <label class="field text">
                                <input type="text" name="tripmap_alt" class="form-control" placeholder="" value="{{ $data->tripmap_alt }}" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- trip chart -->
            <!--<div class="sid_bvijay mb10">-->
            <!--    <h4> Altitude Chart </h4>-->
            <!--    <div class="hd_show_con">-->
            <!--        <div class="bs-component">-->
            <!--            <label class="field prepend-icon append-button file mb20">-->
            <!--                <span class="button btn btn-primary">{{ $data->trip_chart ? 'Change' : 'Choose File' }}</span>-->
            <!--                <input type="file" class="gui-file" name="trip_chart" id="file2"-->
            <!--                    onChange="document.getElementById('trip_chart').value = this.value;">-->
            <!--                <input type="text" class="gui-input" id="trip_chart"-->
            <!--                    placeholder="Please select a photo">-->
            <!--                <label class="field-icon">-->
            <!--                    <i class="fa fa-upload"></i>-->
            <!--                </label>-->
            <!--            </label>-->
            <!--        </div>-->
            <!--        @if ($data->trip_chart)-->
            <!--            <div class="delete-fe-image chart_id{{ $data->id }}">-->
            <!--                <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $data->trip_chart) }}"-->
            <!--                    width="200px" />-->
            <!--                <a href="#{{ $data->id }}" class="chartdelete">X</a>-->
            <!--            </div>-->
            <!--        @endif-->
            <!--        <small> (Width: 1500px Height: 1500px) </small>-->
            <!--    </div>-->
            <!--</div>-->
            <!-- trip banner -->
            <div class="sid_bvijay mb10">
                <h4> Trip Banner </h4>
                <div class="hd_show_con">
                    <div class="bs-component">
                        <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">{{ $data->banner ? 'Change' : 'Choose File' }}</span>
                            <input type="file" class="gui-file" name="banner" id="file3"
                                onChange="document.getElementById('banner').value = this.value;">
                            <input type="text" class="gui-input" id="banner"
                                placeholder="Please select a photo">
                            <label class="field-icon">
                                <i class="fa fa-upload"></i>
                            </label>
                        </label>
                    </div>
                    @if ($data->banner)
                        <div class="delete-fe-image banner_id{{ $data->id }}">
                            <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner) }}"
                                width="200px" />
                            <a href="#{{ $data->id }}" class="bannerdelete">X</a>
                        </div>
                    @endif
                    <small> (Width: 1600px Height: 550px) </small>
                    <h4>Banner Alt Text</h4>
                    <div class="hd_show_con">
                        <div id="xedit" class="bs-component">
                            <label class="field text">
                                <input type="text" name="banner_alt" class="form-control" placeholder="" value="{{ $data->banner_alt }}" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- trip PDF -->
            <!--<div class="sid_bvijay mb10">-->
            <!--    <h4> Upload PDF </h4>-->
            <!--    <div class="hd_show_con">-->
            <!--        <div id="xedit" class="bs-component">-->
            <!--             <label class="field prepend-icon append-button file mb20">-->
            <!--            <span class="button btn btn-primary">{{ $data->trip_pdf ? 'Change' : 'Choose File' }}</span>-->
            <!--            <input type="file" class="gui-file" name="upload_pdf" id="file1" onChange="document.getElementById('upload_pdf').value = this.value;">-->
            <!--            <input type="text" class="gui-input" id="upload_pdf" placeholder="Please select a photo">-->
            <!--            <label class="field-icon">-->
            <!--              <i class="fa fa-upload"></i>-->
            <!--            </label>-->
            <!--          </label>-->
            <!--        </div>-->
            <!--        @if ($data->trip_pdf)
-->
            <!--            <div class="delete-fe-image pdf_id{{ $data->id }}">-->
            <!--                <embed src="{{ asset(env('PUBLIC_PATH') . 'uploads/pdf/' . $data->trip_pdf) }}"-->
            <!--                    width="200px" />-->
            <!--                <a href="#{{ $data->id }}" class="pdfdelete">X</a>-->
            <!--            </div>-->
            <!--
@endif-->
            <!--        <small> (Less Than 2MB) </small>-->
            <!--    </div>-->

            <!--</div>-->
        </div>
    </div>
</div>

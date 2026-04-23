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
                                placeholder="Trip Title" value="{{ old('trip_title') }}" required/>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" id="uri" name="uri" class="form-control" placeholder="Slug"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea type="text" id="sub_title" name="sub_title" class="form-control"
                                placeholder="Sub Title" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Trip Details</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Trip Difficulty</label>
                            @if ($trek->count() > 0)
                                <select class="form-control" name="trip_grade">
                                    <option value=""> Select Grade </option>
                                    @foreach ($trek as $row)
                                        <option value="{{ $row->id }}">{{ $row->trip_grade }} </option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Grade Message</label>
                            <input type="text" name="status_text" class="form-control" value="{{ old('status_text') }}" />
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Max Elevation</label>
                            <input type="text" name="max_altitude" class="form-control"
                                value="{{ old('max_altitude') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Group Size</label>
                            <input type="text" name="group_size" class="form-control"
                                value="{{ old('group_size') }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Season</label>
                            <input type="text" name="best_season" class="form-control"
                                value="{{ old('best_season') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="{{ old('price') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Duration</label>
                            <input type="text" min="1" name="duration" class="form-control"
                                value="{{ old('duration') }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Accommodation</label>
                            <input type="text" name="accommodation" class="form-control"
                                value="{{ old('accommodation') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Daily Activity</label>
                            <input type="text" name="walking_per_day" class="form-control"
                                value="{{ old('walking_per_day') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Meals</label>
                            <input type="text" name="meals" class="form-control"
                                value="{{ old('meals') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Transportation</label>
                            <input type="text" name="peak_name" class="form-control"
                                value="{{ old('peak_name') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Start/End</label>
                            <input type="text" name="route" class="form-control" value="{{ old('route') }}" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Is Luxury Trip?</label>
                            <select class="form-control" name="video_status">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!--<div class="form-group">-->
                <!--    <div class="col-lg-6">-->
                <!--        <div class="bs-component">-->
                <!--        <label>Transportation</label>-->
                <!--            <input type="text" name="route" class="form-control" value="{{ old('route') }}" />-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <div class="col-lg-6">-->
                <!--        <div class="bs-component">-->
                <!--            <label>Start / End</label>-->
                <!--            <input type="text" name="start_date" class="form-control"-->
                <!--                value="{{ old('start-date') }}" />-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="form-group">-->

                <!--<div class="col-lg-6">-->
                <!--    <div class="bs-component">-->
                <!--        <label>Discount</label>-->
                <!--        <input type="text" name="discount" class="form-control"-->
                <!--            value="{{ old('discount') }}" />-->
                <!--    </div>-->
                <!--</div>-->
                <!--</div>-->
                <div class="form-group">
                    <!-- <div class="col-lg-6">-->
                    <!--    <div class="bs-component">-->
                    <!--        <label>Video ID</label>-->
                    <!--       <input type="text" class="form-control" name="trip_video" value="{{ old('trip_video') }}" placeholder="Video ID" />-->
                    <!--    </div>-->
                    <!--</div>  -->
                    {{-- <div class="col-lg-6">
                        <div class="bs-component">
                            <label>Is Famous ?</label>
                            <select class="form-control" name="video_status">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>                                --}}
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> Trip Content</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="form-control my-editor" name="trip_content" rows="9">{{ old('trip_content') }}</textarea>
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
                            <textarea class="my-editor form-control" name="trip_highlight" placeholder="Trip  Gears List">{{ old('trip_highlight') }}</textarea>
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
                            <textarea class="my-editor form-control" name="trip_excerpt" rows="3">{{ old('trip_excerpt') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">

            @include('admin.seo.seo-form', [
                'seo' => $data->seo ?? null
            ])
        </div>
    </div>
    <div class="col-md-4">
        <div class="admin-form">
            <!-- // -->
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
                                                    @if (is_array(old('destination')) && in_array($row->id, old('destination'))) checked @endif required />
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
                        <option value="" selected disabled> Select Trip Type </option>
                        @foreach ($trip_type as $row)
                            @if($row->id != 3)
                                <option value="{{ $row->id }}">{{ $row->trip_type }}</option>
                            @else
                                <option value="{{ $row->id }}">Tours</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <?php /*
            <div class="sid_bvijay mb10 onchange 1">
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
                                                <input type="checkbox" name="region[]" value="{{ $row->id }}" @if (is_array(old('region')) && in_array($row->id, old('region'))) checked @endif />
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
                                            <input type="checkbox" name="tripgroup[]" value="{{ $row->id }}" @if (is_array(old('tripgroup')) && in_array($row->id, old('tripgroup'))) checked @endif />
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


            <div class="onchange 1">
                <div class="sid_bvijay mb10">
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
                                                    <input type="radio" name="activity[]"
                                                        value="{{ $row->id }}" required>
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
            </div>
            <div class="onchange 2">
                <div class="sid_bvijay mb10">
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
                                                    <input type="radio" name="activity[]"
                                                        value="{{ $row->id }}">
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
            </div>
            <div class="onchange 3">
                <div class="sid_bvijay mb10">
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
                                                    <input type="radio" name="activity[]"
                                                        value="{{ $row->id }}">
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
            </div>
            <div class="onchange 4">
                <div class="sid_bvijay mb10">
                    <h4>Packages </h4>
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
                                                    <input type="radio" name="activity[]"
                                                        value="{{ $row->id }}">
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
            </div>
            <div class="sid_bvijay mb10">
                <h4> Ordering </h4>
                <label class="field text">
                    <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                        value="{{ $ordering }}" />
                </label>
            </div>
            <div class="sid_bvijay mb10">
                <h4> Trip Video </h4>
                <div class="hd_show_con">
                    <label class="field text">
                        <input type="text" name="trip_video" class="form-control" placeholder="YouTube Video ID" />
                    </label>
                    <label for="">www.youtube.com/watch?v=<strong>bFy6jTEHlzQ</strong></label>
                </div>
            </div>

            <div class="sid_bvijay mb10">
                <h4> Thumbnail </h4>
                <div class="hd_show_con">
                    <div id="xedit" class="bs-component">
                        <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="thumbnail" id="file1"
                                onChange="document.getElementById('Thumbnail').value = this.value;">
                            <input type="text" class="gui-input" id="Thumbnail"
                                placeholder="Please select a photo">
                            <label class="field-icon">
                                <i class="fa fa-upload"></i>
                            </label>
                        </label>
                    </div>
                    <small> (Width: 1500px Height: 1500px) </small>
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
                <h4> Trip map </h4>
                <div class="hd_show_con">
                    <div id="xedit" class="bs-component">
                        <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="trip_map" id="file2"
                                onChange="document.getElementById('trip_map').value = this.value;">
                            <input type="text" class="gui-input" id="trip_map"
                                placeholder="Please select a photo">
                            <label class="field-icon">
                                <i class="fa fa-upload"></i>
                            </label>
                        </label>
                    </div>
                    <small> (Width: 1500px Height: 1500px) </small>
                </div>
                <h4>Trip Map Alt Text</h4>
                <div class="hd_show_con">
                    <div id="xedit" class="bs-component">
                        <label class="field text">
                            <input type="text" name="tripmap_alt" class="form-control" placeholder="" />
                        </label>
                    </div>
                </div>
            </div>

            <!--<div class="sid_bvijay mb10">-->
            <!--    <h4> Altitude Chart </h4>-->
            <!--    <div class="hd_show_con">-->
            <!--        <div id="xedit" class="bs-component">-->
            <!--            <label class="field prepend-icon append-button file mb20">-->
            <!--                <span class="button btn btn-primary">Choose File</span>-->
            <!--                <input type="file" class="gui-file" name="trip_chart" id="file2"-->
            <!--                    onChange="document.getElementById('trip_chart').value = this.value;">-->
            <!--                <input type="text" class="gui-input" id="trip_chart"-->
            <!--                    placeholder="Please select a photo">-->
            <!--                <label class="field-icon">-->
            <!--                    <i class="fa fa-upload"></i>-->
            <!--                </label>-->
            <!--            </label>-->

            <!--        </div>-->
            <!--        <small> (Width: 1500px Height: 1500px) </small>-->
            <!--    </div>-->
            <!--</div>-->

            <div class="sid_bvijay mb10">
                <h4> Trip Banner </h4>
                <div class="hd_show_con">
                    <div id="xedit" class="bs-component">
                        <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">Choose File</span>
                            <input type="file" class="gui-file" name="banner" id="file2"
                                onChange="document.getElementById('banner').value = this.value;">
                            <input type="text" class="gui-input" id="banner"
                                placeholder="Please select a photo">
                            <label class="field-icon">
                                <i class="fa fa-upload"></i>
                            </label>
                        </label>
                    </div>
                    <small> (Width: 1600px Height: 550px) </small>
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

            <!-- <div class="sid_bvijay mb10">-->
            <!--    <h4> Upload PDF </h4>-->
            <!--    <div class="hd_show_con">-->
            <!--        <div id="xedit" class="bs-component">-->
            <!--         <label class="field prepend-icon append-button file mb20">-->
            <!--            <span class="button btn btn-primary">Choose File</span>-->
            <!--            <input type="file" class="gui-file" name="upload_pdf" id="file2" onChange="document.getElementById('upload_pdf').value = this.value;">-->
            <!--            <input type="text" class="gui-input" id="upload_pdf" placeholder="Please select a File">-->
            <!--            <label class="field-icon">-->
            <!--              <i class="fa fa-upload"></i>-->
            <!--            </label>-->
            <!--          </label>-->
            <!--        </div>-->
            <!--       <small> (Less Than 2MB) </small>-->
            <!--    </div>-->
            <!--</div>-->

        </div>
    </div>
</div>

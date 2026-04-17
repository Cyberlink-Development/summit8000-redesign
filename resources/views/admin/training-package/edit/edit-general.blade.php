<div class="row">
    <div class="col-md-8">
        <!-- Input Fields -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Edit Training</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" id="trip_title" name="trip_title" class="form-control"
                                value="{{ $data->trip_title }}" placeholder="Training Title" />
                            <input type="hidden" id="uri" name="uri" value="{{ $data->uri }}" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" id="sub_title" name="sub_title" class="form-control"
                                value="{{ $data->sub_title }}" placeholder="Sub Title" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> Training Details </span>
            </div>
            <div class="panel-body">
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
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Trainig Excerpt</span>
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
                <span class="panel-title">Trainig Content Title</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="form-control" id="trip_highlight" name="trip_highlight"
                                placeholder="Trip Content Title">{{ $data->trip_highlight }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Things to be considered</span>
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

            <div class="sid_bvijay mb10">
                <h4> Trip Type </h4>
                <div class="hd_show_con">
                    <select class="form-control onchange-select" name="trip_type">
                        <option value="0"> Select Trip Type </option>
                        @if ($trip_type->count(0 > 0))
                            @foreach ($trip_type as $row)
                                <option value="{{ $row->id }}" @if ($data->trip_type == $row->id) selected @endif>
                                    {{ $row->trip_type }} </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            
            <div class="sid_bvijay mb10">
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
                <h4> Trainig Ordering </h4>
                <div class="hd_show_con">
                    <label class="field text">
                        <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                            value="{{ $data->ordering }}" />
                    </label>
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
                            <img src="{{ asset(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail) }}"
                                width="200px" />
                            <a href="#{{ $data->id }}" class="thumbdelete">X</a>
                        </div>
                    @endif
                    <small> (Width: 1500px Height: 1500px) </small>
                </div>
            </div>
            <!-- trip banner -->
            <div class="sid_bvijay mb10">
                <h4> Training Banner </h4>
                <div class="hd_show_con">
                    <div class="bs-component">
                        <label class="field prepend-icon append-button file mb20">
                            <span class="button btn btn-primary">{{ $data->thumbnail ? 'banner' : 'Choose File' }}</span>
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
                </div>
            </div>
            
        </div>
    </div>
</div>

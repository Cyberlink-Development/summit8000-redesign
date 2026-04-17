<div class="row">
    <div class="col-md-8">
        <!-- Input Fields -->
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">New Traning</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" id="trip_title" name="trip_title" class="form-control"
                                placeholder="Training Title" value="{{ old('trip_title') }}" />
                            <input type="hidden" id="uri" name="uri" value="" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" id="sub_title" name="sub_title" class="form-control"
                                placeholder="Sub Title" value="{{ old('sub_title') }}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Trainig Details</span>
            </div>
            <div class="panel-body">
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
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title">Training Excerpt</span>
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
            <div class="panel-heading">
                <span class="panel-title">Training Content Title</span>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="form-control" name="trip_highlight" placeholder="Trip Content Title">{{ old('trip_highlight') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <span class="panel-title"> Things to be considered</span>
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
                <span class="panel-title"> Meta data </span>
            </div>
            <div class="panel-body">
                {{-- <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" name="meta_title" class="form-control" placeholder="Meta Title"
                                value="{{ old('meta_title') }}" />
                        </div>
                    </div>
                </div> --}}

                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <input type="text" name="meta_key" class="form-control" placeholder="Meta Key"
                                value="{{ old('meta_key') }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="bs-component">
                            <textarea class="form-control" id="textArea3" name="meta_description" rows="3"
                                placeholder="Meta Description">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="admin-form">
            <!-- // -->

            <div class="sid_bvijay mb10">
                <h4> Trip Type </h4>
                <div class="hd_show_con">
                    <select class="form-control onchange-select" name="trip_type">
                        <option value="0"> Select Trip Type </option>
                        @foreach ($trip_type as $row)
                            @if($row->trip_type == 'Package')
                                <option value="{{ $row->id }}" selected>{{ $row->trip_type }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            
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
            <div class="sid_bvijay mb10">
                <label class="field text">
                    <input type="number" name="ordering" class="form-control" placeholder="Ordering"
                        value="{{ $ordering }}" />
                </label>
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
            </div>

            <div class="sid_bvijay mb10">
                <h4> Training Banner </h4>
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
            </div>
        </div>
    </div>
</div>

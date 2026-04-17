{{-- <input type="hidden" name="_method" value="PUT"/> --}}
<div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Home Extra Text</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Text for date and prices</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" class="form-control" id="contentEditor4" name="text1_title" placeholder="title" value="{{$data->text1_title}}"/>
                                <input type="text" class="form-control" id="contentEditor4" name="text1_sub_title" placeholder="sub_title" value="{{$data->text1_sub_title}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Text for About Us</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" class="form-control" id="contentEditor4" name="fp_about" placeholder="title" value="{{ $data->fp_about }}"/>
                                <input type="text" class="form-control" id="contentEditor4" name="fp_about_content" placeholder="sub_title" value="{{$data->fp_about_content}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Text for Contact</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" class="form-control" id="contentEditor4" name="text2_title" placeholder="title" value="{{$data->text2_title}}"/>
                                <input type="text" class="form-control" id="contentEditor4" name="text2_sub_title" placeholder="sub_title" value="{{$data->text2_sub_title}}"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Text for Review </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" class="form-control" id="contentEditor4" name="text3_title" placeholder="title" value="{{$data->text3_title}}"/>
                                <input type="text" class="form-control" id="contentEditor4" name="text3_sub_title" placeholder="sub_title" value="{{$data->text3_sub_title}}"/>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Text for Activity in Homepage </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <textarea type="text" class="form-control my-editor" name="fp_activity" placeholder="">{{ $data->fp_activity }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Text for Training packages in Homepage </label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <textarea type="text" class="form-control " rows="5" name="fp_training" placeholder="">{{ $data->fp_training }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
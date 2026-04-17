{{-- <input type="hidden" name="_method" value="PUT"/> --}}
<div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Header Images</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Image 1</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="file" class="form-control" id="contentEditor4" name="usa_address" value="{{$data->usa_address}}"/>
                                @if(!empty($data->usa_address))
                                    <img src="{{ asset('uploads/'.$data->usa_address) }}" alt="Image 1" width="150" class="mb-2">
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Image 2</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="file" id="inputStandard" name="usa_phone" class="form-control" placeholder="" value="{{$data->usa_phone}}"/>
                                @if(!empty($data->usa_phone))
                                    <img src="{{ asset('uploads/'.$data->usa_phone) }}" alt="Image 1" width="150" class="mb-2">
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email Primary</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="usa_email_primary" class="form-control"
                                       placeholder="" value="{{$data->usa_email_primary}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email Secondary</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="usa_email_secondary" class="form-control"
                                       placeholder="" value="{{$data->usa_email_secondary}}"/>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        
        
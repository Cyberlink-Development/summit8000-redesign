@extends('admin.master')
@section('title','Home Brief')
@section('breadcrumb')
@endsection
@section('content')
<form action="{{ url('admin/home/brief/store') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
    <div class="col-md-12">
        <!-- Input Fields -->
        @csrf
        <div class="panel">
            @include('admin.common.message')
            <div class="panel-heading">
                <span class="panel-title">Home Brief Section</span>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="text" id="" name="title" class="form-control" placeholder=""
                                   >
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Brief</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                             <textarea class="form-control" id="contentEditor5" name="brief"
                                      rows="3"></textarea>
                                      </div>
                    </div>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Picture 1</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="file" name="picture1" class="form-control"/>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Picture 2 </label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="file" name="picture2" id="" class="form-control">
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="inputStandard" class="col-lg-2 control-label">Picture 3</label>
                    <div class="col-lg-8">
                        <div class="bs-component">
                            <input type="file" name="picture3" id="" class="form-control">
                        </div>
                    </div>
                </div> --}}
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="banner">Video</label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                        <input type="file" class="form-control" name="video"/>
                        <br> ( Video Size: Less than 20MB )
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for=""></label>
                    <div class="col-lg-6">
                        <div class="bs-component">
                            <input type="submit" class="form-control btn btn-primary" name="submit" value="Submit"/>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>    
</form>
@endsection
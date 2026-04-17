@extends('admin.master')
@section('breadcrumb')

@endsection
@section('content')
<div class="alert" id="message" style="display: none"></div>
<form class="form-horizontal" id="upload_image1" role="form" action="{{ route('multiplephoto.update',$data->id) }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}   
	<input type="hidden" name="_method" value="PUT" />       
	<div class="col-md-8">
		<!-- Input Fields -->
		<div class="panel">
			<div class="panel-heading">
				<span class="panel-title">Add Image</span>
			</div>
			<div class="panel-body">  
				<input type="hidden" name="post_id" value="{{ $id }}">
				<div class="form-group">
                  <label for="inputStandard" class="col-lg-2 control-label">Title</label>
                  <div class="col-lg-8">
                    <div class="bs-component">
                      <input type="text" id="title" name="title" class="form-control" placeholder="" value="{{$data->title}}"/>
                    </div>
                  </div>
              </div>
				<div class="form-group">
					<label for="inputStandard" class="col-lg-2 control-label"> Image </label>
					<div class="col-lg-8">
						<div class="bs-component">
						     @if($data->file_name)
                              <span>
                              <img src="{{ asset('/uploads/medium/' . $data->file_name) }}" width="150" />
                              <hr>
                              </span>
                              @endif
							<input type="file" name="file_name" id="file_name" class="form-control" /> 	
						</div>
						( Width: 1000px, Height: 500px) <br/>
						Please upload same size all time. Image size must be less than 2048 KB.
					</div>
				</div>  

				<div class="form-group">
					<label for="inputStandard" class="col-lg-2 control-label">  </label>
					<div class="col-lg-8">
						<div class="bs-component">
							<input type="submit" name="submit" value="Submit" class="btn btn-primary">      
						</div>
					</div>
				</div>  
			</div>
		</div> 

		
   
	</div>

	<div class="col-md-4">
		<div class="admin-form">
			<div class="sid_bvijay mb10">  
			</div>
		</div>
	</div>



</form>
@endsection

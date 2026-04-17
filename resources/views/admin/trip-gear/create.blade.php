@extends('admin.master')
@section('title', '')
@section('breadcrumb')
<a href="{{ route('admin.trip-gear.index',$trip_id) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

@section('content')
<form class="form-horizontal" action="{{route('admin.trip-gear.store',$trip_id)}}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}            
 <div class="col-md-9">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add Gear </span>
    </div>
    <div class="panel-body"> 
      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Title </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="title" name="title" value="{{old('title')}}" class="form-control" />
            <input type="hidden" name="trip_id" value="{{$trip_id}}" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> content</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <textarea type="text" id="content" name="content" class="form-control" >{{old('content')}}</textarea>
          </div>
        </div>
      </div> 

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Video </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <textarea type="text" id="video" name="video" class="form-control" >{{old('video')}}</textarea>
          </div>
        </div>
      </div> 



</div>
</div>          
</div>

<div class="col-md-3">
   <div class="admin-form">

<div class="sid_bvijay mb10">                   
            <div class="hd_show_con">
              <div class="publice_edi">
                Status: 
                <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">
                Active
              </a>
              </div>                    
            </div>
            <footer>                        
              <div id="publishing-action">
                <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
              </div>
              <div class="clearfix"></div>
            </footer>
            <div class="clearfix"></div>
          </div>



          <div class="sid_bvijay mb10">
            <label class="field">
            <input type="number" id="ordering" name="ordering" class="form-control" value="{{ $ordering }}" />            
            </label>
          </div>

          
    <div class="sid_bvijay mb10">
      <h4> Thumbnail </h4>
      <div class="hd_show_con">
        <div id="xedit-demo">
         <input type="file" name="thumbnail" />
       </div>
     </div>
   </div>


        </div>          
</div>

</form>
@endsection
@section('scripts')
@endsection
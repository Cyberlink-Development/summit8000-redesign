@extends('admin.master')
@section('title', '')
@section('breadcrumb')
<a href="{{ route('admin.trip-gear.index',$trip_id) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<form class="form-horizontal" action="{{route('admin.trip-gear.update',['admin'=>$trip_id,'trip_gear'=>$data->id])}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')     
 <div class="col-md-9">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Edit Gear </span>
    </div>
    <div class="panel-body"> 
      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Title </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="title" name="title" value="{{ $data->title }}" class="form-control" />
            </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> content</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <textarea type="text" id="content" name="content" class="form-control" >{{ $data->content }}</textarea>
          </div>
        </div>
      </div> 

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Video </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <textarea type="text" id="video" name="video" class="form-control" >{{ $data->video }}</textarea>
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
    
          @if($data->thumbnail)       
          <span class="id{{$data->id}}">
            <a href="#{{$data->id}}" class="imagedelete">X</a>
            <img src="{{ asset('/uploads/original/' . $data->thumbnail) }}" width="50%" />
            <hr> 
          </span>          
          @endif 
          <input type="file" name="thumbnail" />
        </div>
      </div>
    </div>


        </div>          
</div>

</form>
@endsection
@section('scripts')
<script type="text/javascript">
   // Delete Thumb
    $('.imagedelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('delete_gear_thumb') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });
  </script>
@endsection
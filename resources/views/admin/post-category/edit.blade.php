@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
<a href="{{ url('admin/postcategory') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')

<form class="form-horizontal" role="form" action="{{ url('admin/postcategory', $data->id) }}" method="post" enctype="multipart/form-data">
 {{ csrf_field() }}            
 <input type="hidden" name="_method" value="PUT" />       
 <div class="col-md-8">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Create Post Category</span>
    </div>
    <div class="panel-body">

     <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label">Post Type</label>
      <div class="col-lg-8">                  
       <div class="bs-component">
        <select class="form-control" name="post_type">
          @foreach($posttype as $row)
          <option value="{{$row->id}}" {{($data->post_type == $row->id)?'selected':''}}>{{$row->post_type}}</option>
          @endforeach
        </select>
        <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
      </div>
    </div>  

    <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label">Category</label>
      <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="category" name="category" class="form-control" placeholder="" value="{{$data->category}}" />
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
      <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="cat_uri" name="uri" class="form-control" value="{{$data->uri}}"  placeholder="" />
        </div>
      </div>
    </div>     

    <div class="form-group">
     <label for="inputStandard" class="col-lg-3 control-label">Caption</label>
     <div class="col-lg-8">
      <div class="bs-component">
        <input type="text" id="inputStandard" name="category_caption" class="form-control" value="{{$data->category_caption}}" placeholder="" />
      </div>
    </div>
  </div> 

  <div class="form-group">
   <label for="inputStandard" class="col-lg-3 control-label">Content</label>
   <div class="col-lg-8">
    <div class="bs-component">                        
      <div class="bs-component">                       
        <div class="bs-component">
          <textarea class="form-control" id="textArea3" name="category_content" rows="3" autocomplete="off">{{$data->category_content}}</textarea>
        </div>
      </div>
    </div>
  </div>
</div>                    

</div>
</div>          
</div>

<div class="col-md-4">
  <div class="admin-form">
    <div class="sid_bvijay mb10">                   
      <div class="hd_show_con">
        <div class="publice_edi">
          Status: <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">Active</a>
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
      <label class="field text">
        <input type="number" id="inputStandard" name="ordering" class="form-control" value="{{$data->ordering}}" placeholder="Order" />   
      </label>
    </div>

    <div class="sid_bvijay mb10">
      <h4> Thumbnail </h4>
      <div class="hd_show_con">
        <div id="xedit-demo">
          @if($data->thumbnail)
          <span class="id{{$data->id}}">
            <a href="#{{$data->id}}" class="imagedelete">X</a>
            <img src="{{ asset(env('PUBLIC_PATH').'/uploads/original/' . $data->thumbnail) }}" width="50%" />
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

  @section('libraries')
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
      url:"{{url('delete_category_thumb') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

  $(document).ready(function(){
      $('#category').on('keyup',function(){
        var category;
        category = $('#category').val();
        category=category.replace(/[^a-zA-Z0-9 ]+/g,"");
        category=category.replace(/\s+/g, "-");
        $('#cat_uri').val(category);
      });
    });
  </script>
  @endsection
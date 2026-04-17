@extends('admin.master')
@section('title','Post Category')
@section('breadcrumb')
<a href="{{ url('admin/postcategory') }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
<form class="form-horizontal" role="form" action="{{ url('admin/postcategory') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}            
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
            @foreach($data as $row)
            <option value="{{$row->id}}">{{$row->post_type}}</option>
            @endforeach
          </select>
          <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div></div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Category</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="category" name="category" class="form-control" placeholder="" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label">Uri</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="cat_uri" name="uri" class="form-control" placeholder="" />
          </div>
        </div>
      </div>   

      <div class="form-group">
       <label for="inputStandard" class="col-lg-3 control-label">Caption</label>
       <div class="col-lg-8">
        <div class="bs-component">
          <input type="text" id="caption" name="category_caption" class="form-control" placeholder="" />
        </div>
      </div>
    </div> 

    <div class="form-group">
     <label for="inputStandard" class="col-lg-3 control-label">Content</label>
     <div class="col-lg-8">
      <div class="bs-component">                       
        <div class="bs-component">
          <textarea class="form-control" id="textArea3" name="category_content" rows="3" autocomplete="off"></textarea>
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
        <input type="number" id="inputStandard" name="ordering" class="form-control" value="{{$ordering}}" placeholder="Order" />   
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
   <script type="text/javascript">
    $(document).ready(function(){
      $('#category').on('keyup',function(){
        var category;
        category = $('#category').val();
        category=category.replace(/[^a-zA-Z0-9 ]+/g,"");
        category=category.replace(/\s+/g, "-");
        $('#cat_uri').val(category);
      });
    });

// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});

  </script>
  @endsection
@extends('admin.master')
@section('title', '')

@section('breadcrumb')
<a href="{{ route('admin.faq.index',$tirp_id) }}" class="btn btn-primary btn-sm">list</a>
@endsection

@section('content')

<form class="form-horizontal" role="form" action="{{route('admin.faq.update',['admin'=>$tirp_id,'faq'=>$data->id])}}" method="post">
 {{ csrf_field() }}  
 @method('PUT')          
 <div class="col-md-9">
  <!-- Input Fields -->
  <div class="panel">
    <div class="panel-heading">
      <span class="panel-title">Add Faq </span>
    </div>
    <div class="panel-body"> 
      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> Title </label>
        <div class="col-lg-8">
          <div class="bs-component">
            <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}" />
            <input type="hidden" name="trip_id" value="{{$tirp_id}}" />
          </div>
        </div>
      </div>  

      <div class="form-group">
        <label for="inputStandard" class="col-lg-3 control-label"> content</label>
        <div class="col-lg-8">
          <div class="bs-component">
            <textarea type="text" id="content" name="content" class="form-control" >{{$data->content}}</textarea>
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
            <input type="number" id="ordering" name="ordering" class="form-control" value="{{$data->ordering}}" />            
            </label>
          </div>


        </div>          
</div>

</form>
@endsection
@section('scripts')

@endsection
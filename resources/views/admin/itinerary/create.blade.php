@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
<button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
<a href="{{ url('admin/itinerary/'.Request::segment(3).'/index') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
@endsection

@section('content')
<form class="form-horizontal" role="form" action="{{ url('admin/itinerary/'.Request::segment(3).'/store') }}" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}    

  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title"> New Itinerary </span>
      </div>

      <div class="panel-body">   

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Title</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="title" name="title" class="form-control" placeholder="" />
              <input type="hidden" id="" name="trip_detail_id" value="{{Request::segment(3)}}" />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="inputStandard" class="col-lg-2 control-label">Days</label>
          <div class="col-lg-9">
            <div class="bs-component">
              <input type="text" id="days" name="days" class="form-control" placeholder="" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title"> Content</span>
      </div>
      <div class="panel-body">    
        <div class="form-group">
          <div class="col-lg-12">
            <div class="bs-component">
              <textarea class="form-control my-editor" id="" name="content" rows="3"></textarea>
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
            Action
          </div>                    
        </div>
        <footer>                        
          <div id="publishing-action">
            <input type="submit" class="btn btn-primary btn-sm" value="Publish" />
          </div>
          <div class="clearfix"></div>
        </footer>
        <div class="clearfix"></div>
      </div>

      <div class="sid_bvijay mb10">
        <label class="field text">
          <input type="number" id="" name="ordering" class="form-control" placeholder="Ordering" value="{{$ordering}}" />   
        </label>
      </div>

   </div>         

 </div>
</form>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $('#title').on('keyup',function(){
      var title;
      title = $('#title').val();
      title=title.replace(/[^a-zA-Z0-9 ]+/g,"");
      title=title.replace(/\s+/g, "-");
      $('#uri').val(title);
    });
  });

// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});

</script>
@endsection
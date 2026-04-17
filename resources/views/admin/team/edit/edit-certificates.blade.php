<div class="col-md-12">
<div class="panel">
  <div class="panel-heading">
    <span class="panel-title"> Certificates </span>
    <a class="btn btn-primary pull-right add-certificates" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row </a>
  </div>
 <div class="panel-body" id="row_certificates_body">     
        <div class="row">             
            <div class="col-md-1">  <label>Ordering</label> </div>
            <div class="col-md-7">  <label>Title</label> </div>  
            <div class="col-md-3">  <label>Image</label> </div>           
            <div class="col-md-1">  <label>Action</label> </div>
        </div>       

 
   @if($certificates->count() > 0) 
      @foreach($certificates as $row)       
        <div class="row" id="certificates-rec-{{$loop->iteration}}"> 
           <input type="hidden" name="certificates_id[]" value="{{$row->id}}" />  
            <div class="col-md-1"><input type="number" name="certificates_ordering[]" class="form-control" placeholder="SN" value="{{$row->ordering}}"/></div>
            <div class="col-md-7"><input type="text" name="certificates_title[]" class="form-control" placeholder="Title " value="{{$row->title}}" /></div>
            <div class="col-md-3"><input type="file" name="image[]" class="form-control" value="{{$row->image}}" />
            @if($row->image)              
              <img src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $row->image) }}" width="100" />             
              @endif  </div>            
            <div class="col-md-1"><button class="btn btn-danger delete-certificates" certificates-rowid="{{$row->id}}" certificates-data-id="{{$loop->iteration}}"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div> 
        @endforeach
        @endif      
  </div>

  <div style="display:none;">
      <div id="row_certificates_additional">
        <div class="row">
          <input type="hidden" name="certificates_id[]" value="" />
            <div class="col-md-1"><input type="number" name="certificates_ordering[]" class="form-control" placeholder="SN" /></div>
            <div class="col-md-7"><input type="text" name="certificates_title[]" class="form-control" placeholder="Title " /></div>
            <div class="col-md-3"><input type="file" name="image[]" class="form-control" /></div>    
            <div class="col-md-1"><button class="btn btn-danger delete-certificates" schedule-data-id="0"><i class="glyphicon glyphicon-trash"></i></button></div>  
        </div>
    </div>
  </div>

  
</div>


</div>   


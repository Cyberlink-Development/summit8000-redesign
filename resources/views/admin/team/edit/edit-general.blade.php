
  <div class="col-md-9">
    <!-- Input Fields -->
    <div class="panel">
      <div class="panel-heading">
        <span class="panel-title">New Member</span>
      </div>
      <div class="panel-body">                    
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-2 control-label">Name</label>         
          <div class="col-lg-8">
            <div class="bs-component">
             
              <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{$data->name}}" required /> 
              <input type="hidden" id="uri" name="uri" value="{{$data->uri}}" />
            </div>
          </div>
        </div>

        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-2 control-label">Position</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="position" class="form-control" placeholder="Position" value="{{$data->position}}" />
            </div>
          </div>
        </div>  


                                   
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-2 control-label">Category</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <select name="category" class="form-control team-select">
                <option value="0"> Select Category </option>
              @if($category)
                @foreach($category as $row)
                <option value="{{$row->id}}" {{ ($row->id == $data->category )?'selected':'' }}> {{$row->category}}</option>
                @endforeach  
                @endif 
              </select>
              <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
            </div>
          </div>
        </div>
                           
        

        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-2 control-label">Phone</label>        
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$data->phone}}" />
            </div>
          </div>
        </div>  
                           
        <div class="form-group"> 
         <label for="inputStandard" class="col-lg-2 control-label">Email</label>         
          <div class="col-lg-8">
            <div class="bs-component">
              <input type="text" id="email" name="email" class="form-control" placeholder="Email Address" value="{{$data->email}}" />
           
            </div>
          </div>
        </div>

          <div class="form-group"> 
       <label for="inputStandard" class="col-lg-2 control-label">Highlights</label>               
        <div class="col-lg-9">
          <div class="bs-component">
            <textarea class="form-control textarea"   name="highlights" rows="6">{{$data->highlights}}</textarea>
          </div>
        </div>
      </div>  
    
      <div class="form-group"> 
       <label for="inputStandard" class="col-lg-2 control-label">Brief</label>               
        <div class="col-lg-9">
          <div class="bs-component">
            <textarea class="form-control textarea"   name="brief" rows="6">{{$data->brief}}</textarea>
          </div>
        </div>
      </div>  
     
      <div class="form-group">
         <label for="inputStandard" class="col-lg-2 control-label">Content</label>       
        <div class="col-lg-9">
          <div class="bs-component">
            <textarea class="form-control textarea"   name="content" rows="12">{{$data->content}}</textarea>
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
          Active Status: <input type="checkbox" name="status" value="{{ $data->status }}" {{ ($data->status == 1)?'checked':'' }} />
        </div>              
    </div>
  </div>

  <div class="sid_bvijay mb10">
    <label class="field text">
     Ordering: <input type="number"   name="ordering" class="form-control" placeholder="Ordering" value="{{$data->ordering}}" />   
    </label>
  </div>
  <div class="sid_bvijay mb10">
    <div class="hd_show_con">
    Show in Home
      <input type="checkbox" name="show_in_home" value="{{ $data->show_in_home }}"  {{ ($data->show_in_home == 1)?'checked':'' }}/>
    </div>
  </div>
  <!-- <div class="sid_bvijay mb10">
   <label class="field text">
     <input type="text" id="" name="fb_url" class="form-control" placeholder="Facebook Link" value="{{$data->fb_url}}" />   
    </label>
  </div>
  <div class="sid_bvijay mb10">
   <label class="field text">
     <input type="text" id="" name="instagram_url" class="form-control" placeholder="Instagram Link" value="{{$data->instagram_url}}" />   
    </label>
  </div>
  <div class="sid_bvijay mb10">
   <label class="field text">
     <input type="text" id="" name="twitter_url" class="form-control" placeholder="Twitter Link" value="{{$data->twitter_url}}" />   
    </label>
  </div>
  <div class="sid_bvijay mb10">
   <label class="field text">
     <input type="text" id="" name="linkedin_url" class="form-control" placeholder="Linkedin Link" value="{{$data->linkedin_url}}" />   
    </label>
  </div> -->

  <div class="sid_bvijay mb10">
    <h4> Profile Picture </h4>
    <div class="hd_show_con">
      <div id="xedit-demo">
          @if($data->thumbnail)
                <span class="thumb_id{{$data->id}}">
                <a href="#{{$data->id}}" class="thumbdelete">X</a>
                <img src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $data->thumbnail) }}" width="150" />
                </span>
                <hr> 
                @endif     
       <input type="file" name="thumbnail" />
     </div>
   </div>
  </div>

  {{-- <div class="sid_bvijay mb10">
    <h4> Banner </h4>
      <h4>  <input type="checkbox" name="published" value="{{ $data->published }}" {{ ($data->published == 1)?'checked':'' }} />   Blur </h4> 
    <div class="hd_show_con">
      <div id="xedit-demo">
          @if($data->banner)
                <span class="bannerid{{$data->id}}">
                <a href="#{{$data->id}}" class="bannerdelete">X</a>
                <img src="{{ asset(env('PUBLIC_PATH').'uploads/team/' . $data->banner) }}" width="150" />
                </span>
                <hr> 
                @endif     
      <input type="file" name="banner" /> 
     </div>
   </div>
  </div> --}}

</div>       
</div>
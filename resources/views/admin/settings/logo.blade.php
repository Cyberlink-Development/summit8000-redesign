<div class="col-md-12">
    <!-- Input Fields -->
    <div class="panel">
        <div class="panel-heading">
            <span class="panel-title">Logo and TTA</span>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="admin-form">
                    
                <div class="sid_ mb10">
                  <h4> Logo </h4>
                    <div class="hd_show_con">
                    <div id="xedit-demo">
                      
                      @if($data->logo)
                      <span class="logo{{$data->id}}">
                    <a href="{{$data->id}}" id="remove_logo"><span>X</span></a>
                       <a href="{{asset('uploads/original/'.$data->logo)}}" target="_blank"><img src="{{asset('uploads/original/'.$data->logo)}}" name="logo" width="150"/></a>
                      <hr>
                      </span>
                      @endif
                      <input type="file" name="logo" class="form-control"/>
                    </div>
                  </div>
                </div>
        
                 <div class="sid_ mb10">
                  <h4>Affiliated Logo 1 </h4>
                    <div class="hd_show_con">
                    <div id="xedit-demo">
                               
                    @if($data->TTA1 != null)
                      <span class="TTA1{{$data->id}}">
                    <a href="{{$data->id}}" id="remove_worked_with"><span>X</span></a>
                        <a href="{{asset('uploads/original/'.$data->TTA1)}}" target="_blank"><img src="{{asset('uploads/original/'.$data->TTA1)}}" name="TTA1" width="150"/></a>
                      <hr>
                      </span>
                      @endif
                    <input type="file" name="TTA1" class="form-control"/>
                    </div>
                  </div>
                </div> 
                
                 <div class="sid_ mb10">
                  <h4> Affiliated Logo 2 </h4>
                    <div class="hd_show_con">
                    <div id="xedit-demo">
                      @if($data->TTA2)
                      <span class="TTA2{{$data->id}}">
                    <a href="{{$data->id}}" id="remove_affililiated_with"><span>X</span></a>
                         <a href="{{asset('uploads/original/'.$data->TTA2)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->TTA2)}}" name="TTA2"  width="150"/></a>
                      <hr>
                      </span>
                      @endif
                    <input type="file" name="TTA2" class="form-control"/>
                    </div>
                  </div>
                  
                </div> 
                <div class="sid_ mb10">
                  <h4> Affiliated Logo 3 </h4>
                    <div class="hd_show_con">
                    <div id="xedit-demo">
                      @if($data->Affiliated1)
                      <span class="Affiliated1{{$data->id}}">
                    <a href="{{$data->id}}" id="Affiliated1"><span>X</span></a>
                         <a href="{{asset('uploads/original/'.$data->Affiliated1)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->Affiliated1)}}" name="Affiliated1"  width="150"/></a>
                      <hr>
                      </span>
                      @endif
                    <input type="file" name="Affiliated1" class="form-control"/>
                    </div>
                  </div>
                  
                </div> 
                <div class="sid_ mb10">
                  <h4> Affiliated Logo 4 </h4>
                    <div class="hd_show_con">
                    <div id="xedit-demo">
                      @if($data->Affiliated2)
                      <span class="Affiliated2{{$data->id}}">
                    <a href="{{$data->id}}" id="Affiliated2"><span>X</span></a>
                         <a href="{{asset('uploads/original/'.$data->Affiliated2)}}" target="_blank"> <img src="{{asset('/uploads/original/'.$data->Affiliated2)}}" name="Affiliated2"  width="150"/></a>
                      <hr>
                      </span>
                      @endif
                    <input type="file" name="Affiliated2" class="form-control"/>
                    </div>
                  </div>
                  
                </div> 
        
                </div>
            </div>

        
        
                </div>
    </div>
</div>
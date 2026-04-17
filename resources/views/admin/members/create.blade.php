@extends('admin.master')
@section('title', 'User')
@section('breadcrumb')
     <a href="{{ Request::segment(1) }}" class="btn btn-primary btn-sm">List</a>
@endsection
@section('content')
      
<form action="{{url('member')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }} 
<input type="hidden" name="role" id="role" value="2" class="gui-input" />
<section id="content" class="table-layout">
        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="height: 647px;">
          <div class="mw1000 center-block">
            <!-- Store Owner Details -->
            <div class="panel panel-warning panel-border top mt20 mb35">
              <div class="panel-heading">
                <span class="panel-title">User Details</span>
              </div>
              <div class="panel-body bg-light dark">
                  <div class="admin-form">
                  <div class="section row mb10">
                    <label for="first-name" class="field-label col-md-3 text-center">First Name:</label>
                    <div class="col-md-9">
                      <label for="first-name" class="field prepend-icon">
                        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}" class="gui-input" />
                      </label>
                    </div>
                  </div>

                  <div class="section row mb10">
                    <label for="last-name" class="field-label col-md-3 text-center">Last Name:
                    </label>
                    <div class="col-md-9">
                      <label for="last-name" class="field prepend-icon">
                        <input type="text" name="last_name" id="last_name" class="gui-input" />   
                      </label>
                    </div>
                  </div>

                  <div class="section row mb10">
                    <label for="account-email" class="field-label col-md-3 text-center"> Email:</label>
                    <div class="col-md-9">
                      <label for="account-email" class="field prepend-icon">
                        <input type="email" name="email" id="email" class="gui-input" />          
                      </label>
                    </div>
                  </div>
                   <div class="section row mb10">
                    <label for="account-phone" class="field-label col-md-3 text-center"> Phone:</label>
                    <div class="col-md-9">
                      <label for="account-phone" class="field prepend-icon">
                        <input type="text" name="phone" id="phone" class="gui-input" />          
                      </label>
                    </div>
                  </div>
                   <div class="section row mb10">
                    <label for="account-designation" class="field-label col-md-3 text-center"> Designation:</label>
                    <div class="col-md-9">
                      <label for="account-designation" class="field prepend-icon">
                        <input type="text" name="designation" id="designation" class="gui-input" />          
                      </label>
                    </div>
                  </div>
                  
                  <div class="section row mb10">
                    <label for="account-password" class="field-label col-md-3 text-center">Password:</label>
                    <div class="col-md-9">
                      <label for="account-password" class="field prepend-icon">
                        <input type="password" name="password" id="password" class="gui-input" />
                      </label>
                    </div>
                  </div>
                  <div class="section row mb10">
                    <label for="store-timezone" class="field-label col-md-3 text-center">
                    Confirm Password:</label>
                    <div class="col-md-9">
                      <label for="confirm-password" class="field prepend-icon">
                        <input type="password" name="cpassword" id="cpassword" class="gui-input" />
                      </label>
                    </div>
                  </div>
                  <div class="section row mb10">
                    <label for="store-timezone" class="field-label col-md-3 text-center">
                    </label>
                    <div class="col-md-9">
                      <label for="confirm-password" class="field prepend-icon">
                        <input type="submit" name="submit" id="" class="btn btn-primary" value="Submit"/>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end: .tray-center -->

        <!-- begin: .tray-right -->
        <aside class="tray tray-right tray290" style="height: 572px;">
          <!-- menu quick links -->
          <div class="admin-form">     
           <hr class="short">
            <h5><small>Department </small></h5>
            <div class="section mb15">
               <label class="field select">
                        <select name="department" class="empty">
                            <option disabled selected> Choose Department </option>
                          @foreach($department as $row)
                          <?php if($row->id == 1){
                            continue;
                          }
                          ?>
                          <option value="{{$row->id}}">
                                {{ ucfirst($row->department) }}
                          </option>
                          @endforeach
                        </select>
                        <i class="arrow"></i>
                      </label>
            </div>      
            <hr class="short alt br-light">
           
            <!--<h5><small>Store Image</small></h5>-->
            <!--<div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden">-->
            <!--  <div class="fileupload-preview thumbnail mb20" style="line-height: 130px;">-->
            <!--    <img data-src="holder.js/100%x120" alt="100%x120" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMjgwIiBoZWlnaHQ9IjEyMCIgdmlld0JveD0iMCAwIDI4MCAxMjAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMjgwIiBoZWlnaHQ9IjEyMCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjEwNi4yNzM0Mzc1IiB5PSI2MCIgc3R5bGU9ImZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxM3B0O2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjI4MHgxMjA8L3RleHQ+PC9nPjwvc3ZnPg==" data-holder-rendered="true" style="height: 120px; width: 100%; display: block;">-->
            <!--  </div>-->
            <!--  <span class="btn btn-default light btn-file btn-block ph5">-->
            <!--    <span class="fileupload-new">Change</span>-->
            <!--    <span class="fileupload-exists">Change</span>-->
            <!--    <input type="file">-->
            <!--  </span>-->
            <!--</div>-->
            
          </div>
        </aside>
        <!-- end: .tray-right -->
      </section>
      </form>
    @endsection                          
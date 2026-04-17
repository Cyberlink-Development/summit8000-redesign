@extends('admin.master')
@section('title', 'Change Password')
@section('breadcrumb')
@endsection
@section('content')

   <form action="{{ route('admin.update_password') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }} 
        <input type="hidden" name="_method" value="PUT" />
        <section id="content" class="table-layout">
        <!-- begin: .tray-center -->
        <div class="tray tray-center" style="height: 647px;">
          <div class="mw1000 center-block">
            <!-- Store Owner Details -->
            <div class="panel panel-warning panel-border top mt20 mb35">
              <div class="panel-heading">
                <span class="panel-title">Change Password</span>
              </div>
              <div class="panel-body bg-light dark">
                  <div class="admin-form">
                  <div class="section row mb10">
                    <label for="first-name" class="field-label col-md-3 text-center">Old Password :</label>
                    <div class="col-md-9">
                      <label for="first-name" class="field prepend-icon">
                        <input type="text" name="old_password" value="{{ old('password') }}" class="gui-input" />
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
        
        </aside>
        <!-- end: .tray-right -->
      </section>
      </form>
    @endsection                          
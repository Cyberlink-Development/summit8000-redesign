@extends('admin.master')
@section('title','Dashboard')
@section('content')
<div class="row mb10">
  <div class="col-sm-6 col-md-3">
    <div class="panel bg-alert light of-h mb10">
      <div class="pn pl20 p5">
        <div class="icon-bg">
          <i class="fa fa-file-o"></i>
        </div>
        <h2 class="mt15 lh15">
          <b>{{$total_posts}}</b>
        </h2>
        <h5 class="text-muted">Total Posts</h5>
      </div>
    </div>
  </div>

    <div class="col-sm-6 col-md-3">
      <div class="panel bg-warning light of-h mb10">
        <div class="pn pl20 p5">
          <div class="icon-bg">
             <i class="fa fa-file-o"></i>
          </div>
          <h2 class="mt15 lh15">
            <b>{{$total_trips}}</b>
          </h2>
          <h5 class="text-muted">Total Trips</h5>
        </div>
      </div>
    </div>

        <div class="col-sm-6 col-md-3">
          <div class="panel bg-primary light of-h mb10">
            <div class="pn pl20 p5">
              <div class="icon-bg">
                <i class="fa fa-file-o"></i>
              </div>
              <h2 class="mt15 lh15">
                <b>{{$total_inquires}}</b>
              </h2>
              <h5 class="text-muted">Total Inquires</h5>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
           <div class="panel bg-info light of-h mb10">
              <div class="pn pl20 p5">
                <div class="icon-bg">
                  <i class="fa fa-file-o"></i>
                </div>
                <h2 class="mt15 lh15">
                  <b>{{$total_booking}}</b>
                </h2>
                <h5 class="text-muted">Total Booking</h5>
              </div>
            </div>
          </div>
</div>
@endsection
<!-- END: PAGE SCRIPTS -->

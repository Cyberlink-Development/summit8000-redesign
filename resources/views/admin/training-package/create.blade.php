@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
    {{-- <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i>
        Back </button> --}}
    <a href="{{ route('training.list.index','training') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
@endsection

@section('content')
<form class="form-horizontal" role="form" id="tripData" method="post" enctype="multipart/form-data">
@csrf
<section class="content">
<div class="container-fluid">

    <footer>
        <div id="publishing-action">
            <button type="submit" name="submit" class="btn btn-success" value="publish"> Publish</button>
        </div>
        <div class="clearfix"></div>
    </footer>

    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header d-flex p-0">
                    <!-- <h3 class="card-title p-3">Manage Trips</h3> -->
                    <ul class="nav nav-pills ml-auto p4 mb10 mt10 nav-custom">
                        <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">GENERAL</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">ITINERARY</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">                           
                            @include('admin.training-package.create.create-general')                           
                        </div>                      
                        <div class="tab-pane" id="tab_2">
                            @include('admin.training-package.create.create-itinerary')
                        </div>
                       
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
        </div>
        <!-- /.col -->
    </div>
</div>
</section>

</form>


@endsection
@section('scripts')
    <script type="text/javascript">
   
        /******** For Itinerary *******/
        jQuery(document).delegate('a.add-itinerary', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_additional .row'),
                size = jQuery('#row_body >.row').length + 1,
                element = null,
                element = content.clone();
            var newel = $('.input-form:last').clone();
            element.attr('id', 'rec-' + size);
            element.find('.delete-itinerary').attr('itinerary-data-id', size);
            element.appendTo('#row_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-itinerary', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('itinerary-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Itinerary *******/
          /******** For Schedule *******/
        jQuery(document).delegate('a.add-schedule', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_schedule_additional .row'),
                size = jQuery('#row_schedule_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'schedule-rec-' + size);
            element.find('.delete-schedule').attr('schedule-data-id', size);
            element.appendTo('#row_schedule_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-schedule', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('schedule-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#schedule-rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Schedule *******/
       
        /******** For Gear *******/
        jQuery(document).delegate('a.add-gear', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_gear_additional .row'),
                size = jQuery('#row_gear_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'gear-rec-' + size);
            element.find('.delete-gear').attr('gear-data-id', size);
            element.appendTo('#row_gear_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-gear', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('gear-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#gear-rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Gear *******/
                /******** For FAQs *******/
        jQuery(document).delegate('a.add-faq', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_faq_additional .row'),
                size = jQuery('#row_faq_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'faq-rec-' + size);
            element.find('.delete-faq').attr('faq-data-id', size);
            element.appendTo('#row_faq_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-faq', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('faq-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#faq-rec-' + id).remove();
                //regnerate index number on table
                $('#row_body .row').each(function(index) {
                    $(this).find('span.sn').html(index + 1);
                });
                return true;
            } else {
                return false;
            }
        });
        /******** End For FAQs *******/
        
        /******** For Testimonial ***********/
        jQuery(document).delegate('a.add-testimonial', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_testimonial_additional .row'),
                size = jQuery('#row_testimonial_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'testimonial-rec-' + size);
            element.find('.delete-testimonial').attr('testimonial-data-id', size);
            element.appendTo('#row_testimonial_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-testimonial', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('testimonial-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#testimonial-rec-' + id).remove();
                //regnerate index number on table
                $('#row_testimonial_body .row').each(function(index) {
                    $(this).find('span.sn').html(index + 1);
                });
                return true;
            } else {
                return false;
            }
        });
        /******** End For Testimonial *********/
        /******** For Info ***********/
        jQuery(document).delegate('a.add-info', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_info_additional .row'),
                size = jQuery('#row_info_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'info-rec-' + size);
            element.find('.delete-info').attr('info-data-id', size);
            element.appendTo('#row_info_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-info', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('info-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#info-rec-' + id).remove();
                //regnerate index number on table
                $('#row_info_body .row').each(function(index) {
                    $(this).find('span.sn').html(index + 1);
                });
                return true;
            } else {
                return false;
            }
        });
        /******** End For Info *********/

        /* start of banner*/
        jQuery(document).delegate('a.add-banner', 'click', function(e) {
            e.preventDefault();
            var content = jQuery('#row_banner_additional .row'),
                size = jQuery('#row_banner_body >.row').length + 1,
                element = null,
                element = content.clone();
            element.attr('id', 'banner-rec-' + size);
            element.find('.delete-banner').attr('banner-data-id', size);
            element.appendTo('#row_banner_body');
            element.find('.sn').html(size);
        });

        jQuery(document).delegate('button.delete-banner', 'click', function(e) {
            e.preventDefault();
            var makeConfirm = confirm("Are you sure You want to delete");
            if (makeConfirm == true) {
                var id = jQuery(this).attr('banner-data-id');
                var targetDiv = jQuery(this).attr('targetDiv');
                jQuery('#banner-rec-' + id).remove();
                //regnerate index number on table
                $('#row_banner_body .row').each(function(index) {
                    $(this).find('span.sn').html(index + 1);
                });
                return true;
            } else {
                return false;
            }
        });

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#tripData").on('submit', function(e) {
                tinymce.triggerSave();
                e.preventDefault();
                let url = "{{ route('trip.store') }}";
                let tripData = document.getElementById('tripData');
                let data = new FormData(tripData);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {},
                     success: function(data) {
                        if (data.status == 'success') {
                            document.getElementById("tripData"). reset();
                            toastr.success(data.message);
                            setTimeout(function(){
                        location.reload(); 
                    }, 1000); 
                  // alert("here");
               }
                  
               jQuery.each(data.errors, function (key, value) {
                   toastr.error(value);
               });
             
           },
           error: function (xhr, status, error) {
           var err = JSON.parse(xhr.responseText);
  alert(err.Message);
              
           }
                });
            });


        });

        // ## //
        $(document).ready(function() {
            $('#trip_title').on('change', function() {
                var trip_title;
                trip_title = $('#trip_title').val();
                trip_title = trip_title.replace(/[^a-zA-Z0-9 ]+/g, "");
                trip_title = trip_title.replace(/\s+/g, "-");
                $('#uri').val(trip_title);
            });
        });

        // Go back link
        $('.backlink').click(function() {
            var url = '<?= url()->previous() ?>';
            window.location = url;
        });

    </script>
@endsection

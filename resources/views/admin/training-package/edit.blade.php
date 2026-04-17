@extends('admin.master')
@section('title', Request::segment(2))
@section('breadcrumb')
{{-- <button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Back </button> --}}
<a href="{{ route('training.list.index','training') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
@endsection

@section('content')
<form class="form-horizontal" role="form" id="tripData" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="_method" value="PUT" />
<section class="content">
<div class="container-fluid">

    <footer>
        <div id="publishing-action">
            <button type="submit" name="submit" class="btn btn-success" value="publish"> Publish </button>
        </div>
        <div class="clearfix"></div>
    </footer>

    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
                <div class="card-header d-flex p-0">
                <ul class="nav nav-pills ml-auto p4 mb10 mt10 nav-custom">
                <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab">GENERAL</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab"> ITINERARY </a></li>
                
                </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            @include('admin.training-package.edit.edit-general')
                        </div>
                         <div class="tab-pane" id="tab_2">
                            @include('admin.training-package.edit.edit-itinerary')
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
     $(document).ready(function() {
            $('#trip_title').on('change', function() {
                var trip_title;
                trip_title = $('#trip_title').val();
                trip_title = trip_title.replace(/[^a-zA-Z0-9 ]+/g, "");
                trip_title = trip_title.replace(/\s+/g, "-");
                $('#uri').val(trip_title);
            });
        });
   
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
                // For delete itinerary individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var rowid = jQuery(this).attr('itinerary-rowid');
                var trip_id = '{{ $data->id }}';
                var url = '{{ route('itinerary.destroy', ['id' => ':id', 'info_id' => ':info_id']) }}';
                url = url.replace(':id', trip_id);
                url = url.replace(':info_id', rowid);
                if (rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#rec-' + id).remove();
                        },
                        // error: function(data) {
                        //     alert('Error occurred!');
                        // }
                    });
                }
                //End for delete
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
                // For delete sehedule individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var rowid = jQuery(this).attr('schedule-rowid');
                var trip_id = '{{ $data->id }}';
                var url = '{{ route('schedule.destroy', ['id' => ':id', 'info_id' => ':info_id']) }}';
                url = url.replace(':id', trip_id);
                url = url.replace(':info_id', rowid);
                if (rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#schedule-rec-' + rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#schedule-rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        /******** End For Schedule *******/
        
        /******** For Phot/Video *******/
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
                // For delete sehedule individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var gear_rowid = jQuery(this).attr('gear-rowid');
                var trip_id = '{{ $data->id }}';
                var url =
                    '{{ route('admin.trip-gear.destroy', ['admin' => ':admin', 'trip_gear' => ':trip_gear']) }}';
                url = url.replace(':admin', trip_id);
                url = url.replace(':trip_gear', gear_rowid);
                if (gear_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#gear-rec-' + gear_rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
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
                // For delete FAQs individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var faq_rowid = jQuery(this).attr('faq-rowid');
                var trip_id = '{{ $data->id }}';
                var url = '{{ route('admin.faq.destroy', ['admin' => ':admin', 'faq' => ':faq']) }}';
                url = url.replace(':admin', trip_id);
                url = url.replace(':faq', faq_rowid);
                if (faq_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#faq-rec-' + faq_rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#faq-rec-' + id).remove();
                //regnerate index number on table
                // $('#row_body .row').each(function(index) {
                //   $(this).find('span.sn').html(index+1);
                // });
                return true;
            } else {
                return false;
            }
        });
        /******** End For FAQs *******/
       /*For Banner*/
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
                // For delete sehedule individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var banner_rowid = jQuery(this).attr('banner-rowid');
                // alert(banner_rowid);
                var trip_id = '{{ $data->id }}';
                var url =
                    '{{ route('trip_banner_destory', ['id' => ':id', 'banner_id' => ':banner_id']) }}';
                url = url.replace(':id', trip_id);
                url = url.replace(':banner_id', banner_rowid);
                if (banner_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            $('#banner-rec-' + banner_rowid).remove();
                        },
                        error: function(data) {

                            alert('Deleted Successfully');
                        }
                    });
                }
                //End for delete
                jQuery('#banner-rec-' + id).remove();
                return true;
            } else {
                return false;
            }
        });
        jQuery(document).delegate('.delete_banner_thumb', 'click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href');
            var url = '{{ route('delete_banner_thumb', ['id' => ':id']) }}';
            url = url.replace(':id', id);
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('.del-' + id).remove();
                    console.log('success');
                },
                error: function(data) {
                    alert('Error occurred!');
                }
            });
        });
       /*End of Banner*/
        /******** For Cost Includes ***********/
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
                // For delete FAQs individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var testimonial_rowid = jQuery(this).attr('testimonial-rowid');
                var trip_id = '{{ $data->id }}';
                var url =
                    '{{ route('admin.testimonials.destroy', ['admin' => ':admin', 'testimonial' => ':testimonial']) }}';
                url = url.replace(':admin', trip_id);
                url = url.replace(':testimonial', testimonial_rowid);
                if (testimonial_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            console.log('success');
                            $('#testimonial-rec-' + testimonial_rowid).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#testimonial-rec-' + id).remove();
                //regnerate index number on table admin.faq.update
                // $('#row_testimonial_body .row').each(function(index) {
                //   $(this).find('span.sn').html(index+1);
                // });
                return true;
            } else {
                return false;
            }
        });
        /******** End For Cost Includes *********/
        /******** For Cost Excludes ***********/
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
                // For delete FAQs individually.
                var csrf = $('meta[name="csrf-token"]').attr('content');
                var info_rowid = jQuery(this).attr('info-rowid');
                var trip_id = '{{ $data->id }}';
                var url = '{{ route('supporting-info.destroy', ['id' => ':id', 'info_id' => ':info_id']) }}';
                url = url.replace(':id', trip_id);
                url = url.replace(':info_id', info_rowid);
                if (info_rowid) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: {
                            _token: csrf
                        },
                        success: function(data) {
                            console.log('success');
                            // $('#info-rec-' + info_rowid ).remove();
                        },
                        error: function(data) {
                            alert('Error occurred!');
                        }
                    });
                }
                //End for delete
                jQuery('#info-rec-' + id).remove();
                //regnerate index number on table
                // $('#row_info_body .row').each(function(index) {
                //   $(this).find('span.sn').html(index+1);
                // });
                return true;
            } else {
                return false;
            }
        });
        /******** End For Cost Excludes *********/

        // Delete Photo thumb
        jQuery(document).delegate('.delete_gear_thumb', 'click', function(e) {
            e.preventDefault();
            if (!confirm('Are you sure to delete?')) return false;
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('href');
            var url = '{{ route('delete_gear_thumb', ['id' => ':id']) }}';
            url = url.replace(':id', id);
            $.ajax({
                type: 'DELETE',
                url: url,
                data: {
                    _token: csrf
                },
                success: function(data) {
                    $('.del-' + id).remove();
                    console.log('success');
                },
                error: function(data) {
                    alert('Error occurred!');
                }
            });
        });


        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#tripData").on('submit', function(e) {
                e.preventDefault();
                tinymce.triggerSave();

                let trip = '{{ $data->id }}';
                let url = '{{ route('trip.update', ['trip' => ':trip']) }}';
                url = url.replace(':trip', trip);
                let tripData = document.getElementById('tripData');
                let data = new FormData(tripData);

                // let trip_content = $('#trip_content').val();
                // console.log(trip_content);
                // data.append("trip_content", trip_content);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {},
                    success: function(data) {
                           if (data.status == 'success') {
                            toastr.success(data.message);
                            location.reload();
                        }
                         jQuery.each(data.errors, function (key, value) {
                            toastr.error(value);
                            // hideLoading();

                        });
                    
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
             

                    }
                });
            });

     /**/
    $('.thumbdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('delete_trip_thumb') . '/'}}" + id,
      data:{_token:csrf},
      success:function(data){
        $('span.thumb_id' + id ).remove();
        location.reload();
      },
      error:function(data){
        alert(data + 'Error!');
      }
    });
  });
  /******/
   $('.bannerdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('delete_trip_banner') . '/'}}" + id,
      data:{_token:csrf},
      success:function(data){
        $('span.banner_id' + id ).remove();
        location.reload();
      },
      error:function(data){
        alert(data + 'Error!');
      }
    });
  });

  //mapdelete
    $('.mapdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('delete_map') . '/'}}" + id,
      data:{_token:csrf},
      success:function(data){
        $('span.map_id' + id ).remove();
        location.reload();
      },
      error:function(data){
        alert(data + 'Error!');
      }
    });
  });

  $('.chartdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('delete_chart') . '/'}}" + id,
      data:{_token:csrf},
      success:function(data){
        $('span.chart_id' + id ).remove();
        location.reload();
      },
      error:function(data){
        alert(data + 'Error!');
      }
    });
  });

  $('.pdfdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'delete',
      url:"{{url('delete_pdf') . '/'}}" + id,
      data:{_token:csrf},
      success:function(data){
        $('span.pdf_id' + id ).remove();
        location.reload();
      },
      error:function(data){
        alert(data + 'Error!');
      }
    });
  });


    // Select Related Trips
    $('.realted-trips').select2();
});

</script>
@endsection
@section('additional-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

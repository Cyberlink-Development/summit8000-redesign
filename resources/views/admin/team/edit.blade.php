@extends('admin.master')
@section('title', Request::segment(2))

@section('breadcrumb')
<button type="button" class="btn btn-default btn-sm backlink"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back </button>
<a href="{{ url('admin/teams') }}" class="btn btn-default btn-sm backlink"><i class="fa fa-list" aria-hidden="true"></i> Show List </a>
@endsection

@section('content')
<form class="form-horizontal" role="form" id="teamData" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" name="_method" value="PUT" />  
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
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item active"><a class="nav-link active" href="#tab_1" data-toggle="tab"> GENERAL</a></li>
            
                  <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab"> Certificates </a></li>
                                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                     <div class="tab-pane active" id="tab_1">
                  <!--General tab starts -->                   
                  @include('admin.team.edit.edit-general')
                   <!--//-->
                  </div>
            
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                  @include('admin.team.edit.edit-certificates')
                  </div>                 
                 
                  </div>
                  <!-- /.tab-pane -->
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


  /******** For certificates *******/
  jQuery(document).delegate('a.add-certificates', 'click', function(e) {
     e.preventDefault();    
     var content = jQuery('#row_certificates_additional .row'),
     size = jQuery('#row_certificates_body >.row').length + 1,
     element = null,    
     element = content.clone();
     element.attr('id', 'certificates-rec-'+size);
     element.find('.delete-certificates').attr('certificates-data-id', size);
     element.appendTo('#row_certificates_body');
     element.find('.sn').html(size);
   });

    jQuery(document).delegate('button.delete-certificates', 'click', function(e) {
     e.preventDefault();    
     var makeConfirm = confirm("Are you sure You want to delete");
     if (makeConfirm == true) {
      var id = jQuery(this).attr('certificates-data-id');
      var targetDiv = jQuery(this).attr('targetDiv');
      // For delete certificates individually.              
        var csrf = $('meta[name="csrf-token"]').attr('content');
        var certificates_rowid = jQuery(this).attr('certificates-rowid');         
        var team_id = '{{$data->id}}';
        var url = '{{ route("certificates.destroy",["id"=>':id',"info_id"=>':info_id']) }}';
          url = url.replace(':id',team_id);
          url = url.replace(':info_id',certificates_rowid);   
          if(certificates_rowid) {
            $.ajax({
              type:'DELETE',
              url:url,
              data:{_token:csrf},  

              success:function(data){ 
                $('#certificates-rec-' + certificates_rowid ).remove();                
              },
              error:function(data){       
              alert('Error occurred!');
            }
          });  
          }   
      //End for delete
      jQuery('#certificates-rec-' + id).remove();
      return true;
    } else {
      return false;
    }
  });
/******** End For certificates *******/



 $(function () {
          $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });

          $("#teamData").on('submit',function(e){
          e.preventDefault();    
          let team = '{{$data->id}}';
          let url = '{{ route("teams.update",["team"=>':team']) }}';
          url = url.replace(':team',team);         
          let teamData = document.getElementById('teamData');
          let data = new FormData(teamData);    
                   
          $.ajax({
              url: url,
              type: 'POST',
              data: data,
              cache: false,
              processData: false,
              contentType : false,
              beforeSend:function() {},
              success: function (data) {     
                console.log('success');   
                console.log(data);
                location.reload();
                  const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,                
                    })
                    Toast.fire({
                      icon: 'success',
                      title: data.message
                    })
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  // console.log(jqXHR, textStatus, errorThrown);
                  console.log('Error');
                  console.log(textStatus);
                  const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,                
                    })
                    Toast.fire({
                      icon: 'warning',
                      title: textStatus
                    })
                    
              }
          });
      }); 
});

  
   // Delete Thumb
    $('.thumbdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('thumbdelete') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.thumb_id' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

     
   // Delete Banner
    $('.bannerdelete').on('click',function(e){
    e.preventDefault();
    if(!confirm('Are you sure to delete?')) return false;
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var str = $(this).attr('href');
    var id = str.slice(1);
    $.ajax({
      type:'DELETE',
      url:"{{url('bannerdelete') . '/'}}" + id,
      data:{_token:csrf},    
      success:function(data){ 
        $('span.bannerid' + id ).remove();
      },
      error:function(data){  
      alert(data + 'Error!');     
     }
   });
  });

$(document).ready(function(){
    $('#name').on('keyup',function(){
      var trip_title;
      trip_title = $('#name').val();
      trip_title=trip_title.replace(/[^a-zA-Z0-9 ]+/g,"");
      trip_title=trip_title.replace(/\s+/g, "-");
      $('#uri').val(trip_title);
    });
});

// ## //
// Go back link
$('.backlink').click(function(){
  var url = '<?=url()->previous(); ?>';
  window.location=url;
});
 $(function() {
        $('.team-select').change(function(){
            $('.team-category').hide();
            $('.' + $(this).val()).show();
        });
    });

</script>
@endsection